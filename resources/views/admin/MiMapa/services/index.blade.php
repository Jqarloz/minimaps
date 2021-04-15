@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <a class="btn btn-success float-right" href="{{route('admin.services.create')}}">Nuevo Servicio</a>
    <h1>Servicios Inicio</h1>
@stop

@section('content')
    @livewire('admin.services-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop  