<div class="card">

    <div class="card-header">
        <label for="buscador">Buscar:</label>
        <input wire:model="search" name="buscador" class="form-control" placeholder="Ingrese un articulo..." type="text"> {{-- Livewire Class --}}
    </div>

    @if ($items->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td colspan="2"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.items.edit', $item)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.items.destroy',$item)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="card-footer">
            {{$items->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningún registro.</strong>
        </div>
    @endif

    

</div>
