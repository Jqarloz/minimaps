@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    <a class="btn btn-success float-right" href="{{route('admin.tags.create')}}">Nueva Etiqueta</a>
    <h1>Tags Inicio</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>        
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td colspan="2"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td width='10px'>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}">Editar</a>
                                </td>
                                <td width='10px'>
                                    <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"> eliminar</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
