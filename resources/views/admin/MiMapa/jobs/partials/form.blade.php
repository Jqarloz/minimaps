<div>
    <div class="form-group">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del empleo...']) !!}

        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Slug:') !!}
        {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
        
        @error('slug')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Categoría:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        
        @error('category_id')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <p class="font-weight-bold">Etiquetas:</p>
        @foreach ($tags as $tag)
            <label class="mr-2">
                {!! Form::checkbox('tags[]', $tag->id, null) !!}
                {{$tag->name}}
            </label>
        @endforeach

        @error('tags')
            <br>
            <small class="text-danger">{{$message}}</small>
        @enderror
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


        @error('status')
            <br>
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="image-wrapper">
                @isset ($job->image)
                    <img id="picture" src="{{Storage::url($job->image->url)}}" alt="">
                @else
                    <img id="picture" src="{{Storage::url('default/job.jpg')}}" alt="">
                @endisset
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('file', 'Imagen de Portada') !!}
                {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/x-png,image/gif,image/jpeg']) !!}
                
                @error('file')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                
                <p>Caracteristicas: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae voluptatum expedita esse quasi tempora sequi eaque possimus sit! Ipsum impedit quos quas a minima qui vero eaque aliquam doloribus cupiditate?</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Descripcion:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) !!}

        @error('description')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>