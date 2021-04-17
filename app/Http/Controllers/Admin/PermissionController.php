<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.permissions.index')->only('index');
        $this->middleware('can:admin.permissions.create')->only('create', 'store');
        $this->middleware('can:admin.permissions.edit')->only('edit', 'update');
        $this->middleware('can:admin.permissions.destroy')->only('destroy');
    }

    public function index()
    {
        $permissions = Permission::orderBy('name')->get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $nombrePermiso = $request->name;

        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index', $permission)->with('info', 'El Permiso '. $permission->name . ' se creo con éxito.');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $permission->update($request->all());

        return redirect()->route('admin.permissions.index', $permission)->with('info', 'El Permiso '. $permission->name . ' se actualizo con éxito.');
    }

    public function destroy(Permission $permission)
    {
        $nombrePermiso = $permission->name;
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('info', 'El Permiso '. $nombrePermiso . ' se elimino con éxito.');
    }

}
