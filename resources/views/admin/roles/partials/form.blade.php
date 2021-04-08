
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Rol']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<h2 class="h3">Lista de permisos</h2>
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
            {{$permission->description}}
        </label>
    </div>
@endforeach