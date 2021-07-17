<x-owner-layout>
    
    <x-slot name="shop">
        {{$shop->slug}}
    </x-slot>

    <h1 class=" text-2xl font-bold">Información del Negocio</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($shop, ['route' => ['owner.shops.update',$shop], 'method' => 'put', 'files'=> true]) !!}
        {!! Form::hidden('user_id', auth()->user()->id) !!}

        @include('owner.shops.partials.form')
        
        <div class="flex justify-end mt-8">
            {!! Form::submit('Actualizar Información', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/owner/shops/form.js')}}">
        </script>
    </x-slot>
</x-owner-layout>