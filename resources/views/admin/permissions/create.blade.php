@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    <h1>Permisos Crear</h1>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.permissions.store']) !!}
                
                @include('admin.permissions.partials.form')

                {!! Form::submit('Crear Permiso', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
