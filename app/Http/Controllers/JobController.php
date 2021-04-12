<?php

namespace App\Http\Controllers;

use App\Models\Menus\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class JobController extends Controller
{
    public function index()
    {
         if (request()->page) {
            $key = 'jobs' . request()->page;
        } else {
            $key = 'jobs';
        }

        if (Cache::has($key)) {
            $jobs = Cache::get($key);
        } else {
            $jobs = Job::where('status', 2)->latest('id')->paginate(15);
            Cache::put($key, $jobs, $minutes = 3);
        }
        
        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        //$this->authorize('published', $job); //JobPolicy para mostrar solo con estatus 2 en view jobs.show ?User para indicar que puede o no login activo

        $similares = Job::where('category_id', $job->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $job->id)
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('jobs.show', compact('job','similares'));
    }
}
