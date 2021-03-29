<div class="card">

    <div class="card-header">
        <label for="buscador">Buscar:</label>
        <input wire:model="search" name="buscador" class="form-control" placeholder="Ingrese un negocio..." type="text">
    </div>

    @if ($shops->count())
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
                    @foreach ($shops as $shop)
                        <tr>
                            <td>{{$shop->id}}</td>
                            <td>{{$shop->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.shops.edit', $shop)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.shops.destroy',$shop)}}" method="POST">
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
            {{$shops->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningún registro.</strong>
        </div>
    @endif

    

</div>
