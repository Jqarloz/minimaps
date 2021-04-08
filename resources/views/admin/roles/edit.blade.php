@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    <h1>Roles Editar</h1>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route'=>['admin.roles.update',$role], 'method' => 'put']) !!}
                
                @include('admin.roles.partials.form')

                {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
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