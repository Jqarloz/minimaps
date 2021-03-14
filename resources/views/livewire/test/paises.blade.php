<div>
    <h1 class="pb-3">Ejemplo Input Paises</h1>
    <form action="" wire:submit.prevent="agregar">
        <input wire:model="pais" type="text" placeholder="Escribir nuevo Pais" class="pl-3">
        <button type="submit" class="border-3 px-4 bg-blue-400 rounded-2xl">Enviar</button>
    </form>
    
    <ul class="pt-3">
        @foreach ($paises as $x)
            <li>{{$x}}</li>
        @endforeach
    </ul>
</div>
