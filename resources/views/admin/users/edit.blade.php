@extends('adminlte::page')

@section('title', 'MiniMaps')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <h1>Usuarios Editar</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <p class="h5">ID</p>
                    <p class="form-control">{{$user->id}}</p>
                </div>
                <div class="col-10">
                    <p class="h5">Nombre</p>
                    <p class="form-control">{{$user->name}}</p>
                </div> 
            </div>
            <div class="row">
                <p class="h5">Email</p>
                <p class="form-control">{{$user->email}}</p>
            </div>

            <h2 class="h5">Lista de Roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach($roles as $role)
                    <div>
                        <label for="">
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Asignar Roles', ['class' => 'btn btn-primary mt-2']) !!}
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