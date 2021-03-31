<div>
    
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de su negocio...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('slug', 'Slug:') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Categoría:') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <p class="font-weight-bold">Etiquetas:</p>
            @foreach ($tags as $tag)
                <label class="mr-2">
                    {!! Form::checkbox('tags[]', $tag->id, null) !!}
                    {{$tag->name}}
                </label>
            @endforeach
        </div>

        <div class="form-group">
            <p class="font-weight-bold">Estatus:</p>
            <label class="mr-2">
                {!! Form::radio('status', 1, true) !!}
                Borrador
            </label>
            <label>
                {!! Form::radio('status', 2) !!}
                Publicado
            </label>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descripcion:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) !!}
        </div>
</div>