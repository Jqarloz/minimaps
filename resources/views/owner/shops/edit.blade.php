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

                    @include('owner.shops.partials.form')
                    
                    <div class="flex justify-end mt-8">
                        {!! Form::submit('Actualizar Información', ['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/owner/shops/form.js')}}">
        </script>
    </x-slot>
</x-app-layout>