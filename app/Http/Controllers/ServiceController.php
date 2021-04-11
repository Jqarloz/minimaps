<?php

namespace App\Http\Controllers;

use App\Models\Menus\Service;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    public function index()
    {
         if (request()->page) {
            $key = 'services' . request()->page;
        } else {
            $key = 'services';
        }

        if (Cache::has($key)) {
            $services = Cache::get($key);
        } else {
            $services = Service::where('status', 2)->latest('id')->paginate(15);
            Cache::put($key, $services, $minutes = 3);
        }
        
        return view('services.index', compact('services'));
    }

    public function show(Service $service)
    {
        $this->authorize('published', $service); //ServicePolicy para mostrar solo con estatus 2 en view services.show ?User para indicar que puede o no login activo

        $similares = Service::where('category_id', $service->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $service->id)
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('services.show', compact('service','similares'));
    }

}
