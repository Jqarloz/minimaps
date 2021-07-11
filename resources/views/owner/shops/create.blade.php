<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">Crear nuevo Negocio</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'owner.shops.store', 'files' => true]) !!}

                    @include('owner.shops.partials.form')

                    <div class="flex justify-end mt-8">
                        {!! Form::submit('Crear Negocio', ['class'=>'btn btn-primary']) !!}
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