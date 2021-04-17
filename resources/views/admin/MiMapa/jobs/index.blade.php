@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <a class="btn btn-success float-right" href="{{route('admin.jobs.create')}}">Nuevo Empleo</a>
    <h1>Contrataciones Inicio</h1>
@stop

@section('content')
    @livewire('admin.jobs-index')
@stop
