@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @can('admin.permissions.create')
        <a class="btn btn-success float-right" href="{{route('admin.permissions.create')}}">Nuevo Permiso</a>
    @endcan
    <h1>Permisos Inicio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->description}}</td>
                            <td width="10px">
                                @can('admin.permissions.edit')
                                    <a href="{{route('admin.permissions.edit', $permission)}}" class="btn btn-primary btn-sm">Editar</a>                                    
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.permissions.destroy')
                                    <form action="{{route('admin.permissions.destroy', $permission)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
