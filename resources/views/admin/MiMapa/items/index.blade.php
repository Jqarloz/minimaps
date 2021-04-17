@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <a class="btn btn-success float-right" href="{{route('admin.items.create')}}">Nuevo Articulo</a>
    <h1>Tienda Inicio</h1>
@stop

@section('content')
    @livewire('admin.items-index')
@stop
