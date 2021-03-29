@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
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