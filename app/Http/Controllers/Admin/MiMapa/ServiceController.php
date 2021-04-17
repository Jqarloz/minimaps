<?php

namespace App\Http\Controllers\Admin\MiMapa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MiMapa\ServiceRequest;
use App\Models\Category;
use App\Models\Menus\Service;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:admin.services.index')->only('index');
        $this->middleware('can:admin.services.create')->only('create', 'store');
        $this->middleware('can:admin.services.edit')->only('edit', 'update');
        $this->middleware('can:admin.services.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.MiMapa.services.index');
    }

    public function create()
    {
        $categories = Category::where('type', 'services')->pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.MiMapa.services.create', compact('categories', 'tags'));
    }

    public function store(ServiceRequest $request)
    {
        $service = Service::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('services', $request->file('file'));

            $service->image()->create([
                'url' => $url
            ]);
        }
        
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                $service->tags()->attach(
                    $tag,
                    [
                    'taggable_id' => $service->id,
                    'taggable_type' => Service::class
                    ]
                );
            };
        };
        
        return redirect()->route('admin.services.index', $service)->with('info', 'El servicio '. $request->name . ' se creo con éxito.');
    }

    public function edit(Service $service)
    {
        $this->authorize('author', $service);

        $categories = Category::where('type', 'services')->pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.MiMapa.services.edit', compact('service', 'categories', 'tags'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $this->authorize('author', $service);

        $service->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('services', $request->file('file'));

            if ($service->image) {
                Storage::delete($service->image->url);

                $service->image()->update([
                    'url' => $url
                ]);
            }else{
                $service->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $service->tags()->sync($request->tags);
        };

        return redirect()->route('admin.services.index',$service)->with('info', 'El servicio '. $request->name .' se actualizo con éxito');
    }

    public function destroy(Service $service) /* ServiceObserver se acciona al eliminar, para eliminar imagen. */
    {
        $this->authorize('author', $service);
        $nombre = $service->name;
        $service->delete();
        
        return redirect()->route('admin.services.index')->with('info', 'El servicio '. $nombre .' se elimino con éxito');
    }
}
