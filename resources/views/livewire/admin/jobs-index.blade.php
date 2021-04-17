<div class="card">

    <div class="card-header">
        <label for="buscador">Buscar:</label>
        <input wire:model="search" name="buscador" class="form-control" placeholder="Ingrese un empleo..." type="text">
    </div>

    @if ($jobs->count())
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
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>{{$job->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.jobs.edit', $job)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.jobs.destroy',$job)}}" method="POST">
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
            {{$jobs->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe has ofrecido ningún empleo aun.</strong>
        </div>
    @endif

    

</div>
