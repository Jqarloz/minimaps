<div class="conteiner mx-auto">

    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6">
        <div class="mb-3">
            <label class="form-label" for="name">Nombre</label>
            <input wire:model="name" class="form-control" id="name" type="text" placeholder="Ingrese un nombre">
            @error('name') <p class="error-form-label">{{$message}}</p> @enderror
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="body">Body</label>
            <textarea wire:model="body" class="form-control" id="body" rows="4" placeholder="Ingrese la descripción del Post"></textarea>
            @error('body') <p class="error-form-label">{{$message}}</p> @enderror
        </div>
        
        @if ($accion == "store")
            <button wire:click="store" class="btn-primary">Crear Nuevo</button>
        @else
            <button wire:click="update" class="btn-primary">Actualizar</button>
            <button wire:click="default" class="btn-danger">Cancelar</button>
        @endif
        
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto mb-8">
        <table>
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr class="text-xs font-medium text-gray-500 uppercase text-left tracking-wider">
                    <td class="px-6 py-3">ID</td>
                    <td class="px-6 py-3">Nombre</td>
                    <td class="px-6 py-3">Body</td>
                    <td></td>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($posts as $x)
                    <tr class="text-sm text-gray-500">
                        <td class="px-6 py-4">{{$x->id}}</td>
                        <td class="px-6 py-4">{{$x->name}}</td>
                        <td class="px-6 py-4">{{$x->body}}</td>
                        <td>
                            <button wire:click="edit({{$x}})" class="btn-primary w-full">Editar</button>
                            <button wire:click="destroy({{$x}})" class="btn-danger w-full">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
            {{$posts->links()}}
        </div>
    </div>

    
</div>
