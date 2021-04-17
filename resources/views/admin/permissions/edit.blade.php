@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    <h1>Permiso Editar</h1>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($permission, ['route'=>['admin.permissions.update',$permission], 'method' => 'put']) !!}
                
                @include('admin.permissions.partials.form')

                {!! Form::submit('Actualizar Permiso', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop  