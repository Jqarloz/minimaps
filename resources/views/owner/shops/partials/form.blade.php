<div class="grid grid-cols-2 gap-4 mb-3">
    <div class="">
        @isset ($shop->image)
            <figure>
                <img class="w-full h-64 object-cover object-center" id="picture" src="{{Storage::url($shop->image->url)}}" alt="">
            </figure>
        @else
            <figure>
                <img class="w-full h-64 object-cover object-center" id="picture" src="{{Storage::url('default/shop.jpg')}}" alt="">
            </figure>                                
        @endisset
    </div>
    <div class="">
        <p class="mb-2">Caracteristicas: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae voluptatum expedita esse quasi tempora sequi eaque possimus sit! Ipsum impedit quos quas a minima qui vero eaque aliquam doloribus cupiditate?</p>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('name' ? ' border-red-600' : '')), 'id'=>'file', 'accept' => 'image/x-png,image/gif,image/jpeg']) !!}
    </div>

    @error('file')
        <br>
        <small class="text-sm text-danger text-red-500">{{$message}}</small>
    @enderror
</div>

<div class="mb-4 mt-4">
    <p class="font-weight-bold">Estatus:</p>
    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Crear como Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Enviar a Revisión
    </label>


    @error('status')
        <br>
        <small class="text-sm text-danger text-red-500">{{$message}}</small>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('name' ? ' border-red-600' : ''))]) !!}
    
    @error('name')
        <small class="text-sm text-danger text-red-500">{{$message}}</small>
    @enderror
</div>

<div class="mb-4 hidden">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly','class' => 'form-input block w-full mt-1' . ($errors->has('name' ? ' border-red-600' : ''))]) !!}
    {{-- 
    @error('slug')
        <small class="text-sm text-danger text-red-500">{{$message}}</small>
    @enderror 
    --}}
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


<h1 class="text-lg font-bold mb-2 ">Datos de servicio a domicilio</h1>
<hr class="w-full border-1 border-black bg-black">
<div class="flex items-center gap-4 mt-2">
    <div class="flex items-center gap-2 text-lg">
        {!! Form::checkbox('home_service', 'Y', isset($shop) ? $shop->home_service == 'Y' ? true : false : false) !!}
        {!! Form::label('home_service', 'Servicio a domicilio') !!}
    </div>
    <div class="flex items-center gap-2 text-lg">
        {!! Form::checkbox('hs_isfree', 'Y', isset($shop) ? $shop->hs_isfree == 'Y' ? true : false : false) !!}
        {!! Form::label('hs_isfree', 'Gratuito') !!}
    </div>
</div>

<div class="flex items-center gap-4 mb-2">
    <div class="flex items-center gap-2 text-lg">
        {!! Form::label('hs_mincost', 'Costo Mínimo:') !!}
        {!! Form::number('hs_mincost', isset($shop) ? $shop->hs_mincost : 0, ['class'=>'form-control flex-1', 'step'=>0.1]) !!}
    </div>
    <div class="flex items-center gap-2 text-lg">
        {!! Form::label('hs_maxcost', 'Costo Máximo:') !!}
        {!! Form::number('hs_maxcost', isset($shop) ? $shop->hs_maxcost : 0, ['class'=>'form-control flex-1', 'step'=>0.1]) !!}
    </div>
</div>
<hr class="w-full border-1 border-black bg-black">


<h1 class="text-lg font-bold mb-2 mt-4">Horarios</h1>
<div><hr class="w-full border-1 border-black bg-black"></div>
<div class="flex items-center gap-4 mt-2">
    <div class="flex items-center gap-2 text-lg">
        {!! Form::checkbox('hour_always', 'Y', isset($shop) ? $shop->hour_always == 'Y' ? true : false : false) !!}
        {!! Form::label('hour_always', 'Siempre abierto') !!}
    </div>
</div>
<div class="flex items-center gap-4 mb-2">
    <div class="flex items-center gap-2 text-lg">
        {!! Form::label('hour_open', 'Apertura:') !!}
        {!! Form::time('hour_open', \Carbon\Carbon::createFromFormat('H:i', isset($shop) ? $shop->hour_open : '06:00')->format('H:i'), ['class'=>'form-control']) !!}
    </div>
    <div class="flex items-center gap-2 text-lg">
        {!! Form::label('hour_close', 'Cierre:') !!}
        {!! Form::time('hour_close', \Carbon\Carbon::createFromFormat('H:i', isset($shop) ? $shop->hour_close : '23:00')->format('H:i'), ['class'=>'form-control']) !!}
    </div>
</div>
<hr class="w-full border-1 border-black bg-black">