
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ej. admin.permiso.index']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'ej. Permisos - Ver Listado']) !!}
    @error('description')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>