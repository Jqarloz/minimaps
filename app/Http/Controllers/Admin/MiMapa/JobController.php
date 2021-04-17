<?php

namespace App\Http\Controllers\Admin\MiMapa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MiMapa\JobRequest;
use App\Models\Category;
use App\Models\Menus\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.jobs.index')->only('index');
        $this->middleware('can:admin.jobs.create')->only('create', 'store');
        $this->middleware('can:admin.jobs.edit')->only('edit', 'update');
        $this->middleware('can:admin.jobs.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.MiMapa.jobs.index');
    }

    public function create()
    {
        $categories = Category::where('type', 'jobs')->pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.MiMapa.jobs.create', compact('categories', 'tags'));
    }

    public function store(JobRequest $request)
    {
        $job = Job::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('jobs', $request->file('file'));

            $job->image()->create([
                'url' => $url
            ]);
        }
        
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                $job->tags()->attach(
                    $tag,
                    [
                    'taggable_id' => $job->id,
                    'taggable_type' => Job::class
                    ]
                );
            };
        };
        
        return redirect()->route('admin.jobs.index')->with('info', 'El empleo '. $request->name . ' se creo con éxito.');
    }

    public function edit(Job $job)
    {
        $this->authorize('author', $job);

        $categories = Category::where('type', 'jobs')->pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.MiMapa.jobs.edit', compact('job', 'categories', 'tags'));
    }

    public function update(JobRequest $request, Job $job)
    {
        $this->authorize('author', $job);

        $job->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('jobs', $request->file('file'));

            if ($job->image) {
                Storage::delete($job->image->url);

                $job->image()->update([
                    'url' => $url
                ]);
            }else{
                $job->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $job->tags()->sync($request->tags);
        };

        return redirect()->route('admin.jobs.index')->with('info', 'El empleao '. $request->name .' se actualizo con éxito');
    }

    public function destroy(Job $job)
    {
        $this->authorize('author', $job);
        $nombre = $job->name;
        $job->delete();
        
        return redirect()->route('admin.jobs.index')->with('info', 'El servicio '. $nombre .' se elimino con éxito');
    }
    
}
