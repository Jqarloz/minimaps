<x-app-layout>
    <div class="container py-8">
        <aside>
            <h1 class="font-bold text-lg text-gray-700 mb-4">Editar el Negocio</h1>
            
            <div>

            </div>
            <ul class="flex gap-4 text-sm">
                <li class="leading-7 border-l-4 border-indigo-400 pl-1 bg-gradient-to-r from-indigo-200 to-indigo-50 font-bold">
                    <a href="">Información del negocio</a>
                </li>

                <li class="leading-7 border-l-4 border-transparent pl-1">
                    <a href="">Ubicación</a>
                </li>

                <li class="leading-7 border-l-4 border-transparent pl-1">
                    <a href="">Redes sociales</a>
                </li>

                <li class="leading-7 border-l-4 border-transparent pl-1">
                    <a href="">Productos Principales</a>
                </li>
            </ul>
        </aside>
        <div class="card mt-4">
            <div class="card-body text-gray-600">
                <h1 class=" text-2xl font-bold">Información del Negocio</h1>
                <hr class="mt-2 mb-6">

                {!! Form::model($shop, ['route' => ['owner.shops.edit',$shop], 'method' => 'put', 'files'=> true]) !!}

                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div class="">
                            @isset ($shop->image)
                                <figure>
                                    <img class="w-full h-64 bg-cover bg-center" id="picture" src="{{Storage::url($shop->image->url)}}" alt="">
                                </figure>
                            @else
                                <figure>
                                    <img class="w-full h-64 bg-cover bg-center" id="picture" src="{{Storage::url('default/shop.jpg')}}" alt="">
                                </figure>                                
                            @endisset
                        </div>
                        <div class="">
                            <p class="mb-2">Caracteristicas: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae voluptatum expedita esse quasi tempora sequi eaque possimus sit! Ipsum impedit quos quas a minima qui vero eaque aliquam doloribus cupiditate?</p>
                            {!! Form::file('file', ['class' => 'form-input w-full', 'id'=>'file', 'accept' => 'image/x-png,image/gif,image/jpeg']) !!}
                        </div>
                    </div>

                    <div class="mb-4">
                        {!! Form::label('name', 'Nombre:') !!}
                        {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
                    </div>

                    <div class="mb-4">
                        {!! Form::label('slug', 'Slug:') !!}
                        {!! Form::text('slug', null, ['class' => 'form-input block w-full mt-1']) !!}
                    </div>

                    <div class="mb-4">
                        {!! Form::label('description', 'Descripción:') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1']) !!}
                    </div>

                    <div class="mb-4">
                        {!! Form::label('category_id', 'Categoría:') !!}
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="mb-4">
                        {!! Form::label('website', 'Página Web:') !!}
                        {!! Form::text('website', null, ['class' => 'form-input block w-full mt-1']) !!}
                    </div>

                    <h1 class="text-lg font-bold mb-2 ">Datos de servicio a domicilió</h1>
                    <div><hr class="w-full border-1 border-black bg-black"></div>
                    
                    <div class="flex items-center gap-4 mt-2">
                        <div class="flex items-center gap-2 text-lg">
                            {!! Form::checkbox('home_service', 'Y', $shop->home_service == 'Y' ? true : false) !!}
                            {!! Form::label('home_service', 'Servicio a domicilio') !!}
                        </div>
                        <div class="flex items-center gap-2 text-lg">
                            {!! Form::checkbox('hs_isfree', 'Y', $shop->hs_isfree == 'Y' ? true : false) !!}
                            {!! Form::label('hs_isfree', 'Gratuito') !!}
                        </div>
                    </div>

                    <div class="flex items-center gap-4 mb-2">
                        <div class="flex items-center gap-2 text-lg">
                            {!! Form::label('hs_mincost', 'Costo Mínimo:') !!}
                            {!! Form::number('hs_mincost', $shop->hs_mincost, ['class'=>'form-control', 'step'=>0.1]) !!}
                        </div>
                        <div class="flex items-center gap-2 text-lg">
                            {!! Form::label('hs_maxcost', 'Costo Máximo:') !!}
                            {!! Form::number('hs_maxcost', $shop->hs_maxcost, ['class'=>'form-control', 'step'=>0.1]) !!}
                        </div>
                    </div>
                    <hr class="w-full border-1 border-black bg-black">


                    <h1 class="text-lg font-bold mb-2 mt-4">Horarios</h1>
                    <div><hr class="w-full border-1 border-black bg-black"></div>
                    <div class="flex items-center gap-4 mt-2">
                        <div class="flex items-center gap-2 text-lg">
                            {!! Form::checkbox('hour_always', 'Y', $shop->hour_always == 'Y' ? true : false) !!}
                            {!! Form::label('hour_always', 'Siempre abierto') !!}
                        </div>
                    </div>

                    <div class="flex items-center gap-4 mb-2">
                        <div class="flex items-center gap-2 text-lg">
                            {!! Form::label('hour_open', 'Apertura:') !!}
                            {!! Form::time('hour_open', \Carbon\Carbon::createFromFormat('H:i:s',$shop->hour_open)->format('H:i'), ['class'=>'form-control']) !!}
                        </div>
                        <div class="flex items-center gap-2 text-lg">
                            {!! Form::label('hour_close', 'Cierre:') !!}
                            {!! Form::time('hour_close', \Carbon\Carbon::createFromFormat('H:i:s',$shop->hour_close)->format('H:i'), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <hr class="w-full border-1 border-black bg-black">
                    
                    <div class="flex justify-end mt-8">
                        {!! Form::submit('Actualizar Información', ['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script>
            //Slug automático
            document.getElementById("name").addEventListener('keyup', slugChange);

            function slugChange(){
                
                name = document.getElementById("name").value;
                document.getElementById("slug").value = slug(name);

            }

            function slug (str) {
                var $slug = '';
                var trimmed = str.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }


            //CKEDITOR

            ClassicEditor
                .create( document.querySelector( '#description' ), {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                        ]
                    }
                } )
                .catch( error => {
                    console.log( error );
                } );

                //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);

            function cambiarImagen(event){
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result); 
                };

                reader.readAsDataURL(file);
            }
        </script>
    </x-slot>
</x-app-layout>