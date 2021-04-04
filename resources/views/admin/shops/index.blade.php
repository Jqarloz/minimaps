@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <a class="btn btn-success float-right" href="{{route('admin.shops.create')}}">Nuevo Negocio</a>
    <h1>Negocios Inicio</h1>
@stop

@section('content')
    @livewire('admin.shop-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop  