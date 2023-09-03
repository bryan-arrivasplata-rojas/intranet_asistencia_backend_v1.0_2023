<table class="table-livewire table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($loading)
            <!-- Mostrar mensaje de carga mientras se cargan los datos -->
            <tr>
                <td colspan="5" class="text-center">Cargando...</td>
            </tr>
        @elseif (empty($response))
            <!-- Mostrar mensaje de "no hay datos" si la respuesta está vacía -->
            <tr>
                <td colspan="5" class="text-center">No hay datos disponibles.</td>
            </tr>
        @else
            <!-- Mostrar los datos de la tabla -->
            @foreach ($response as $resp)
                <tr>
                    <td class="identificador">{{ $resp->idState }}</td>
                    <td>{{ $resp->name_state }}</td>
                    <td>
                        <a href="{{route('states.edit',$resp->idState)}}" class="btn btn-primary"><i class="bi bi-brush-fill"></i></a>
                        <button class='btn btn-danger' type='submit' form="delete_{{$resp->idState}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="bi bi-trash3-fill"></i></button>
                        <form action="{{route('states.destroy',$resp->idState)}}" method="POST" id="delete_{{$resp->idState}}" enctype="multipart/form-data" hidden>
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>