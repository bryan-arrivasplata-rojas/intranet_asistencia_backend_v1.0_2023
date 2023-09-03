<table class="table-livewire table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nombre de Vista</th>
            <th>Descripción</th>
            <th>Fecha de creación</th>
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
                    <td class="identificador">{{ $resp->idRol }}</td>
                    <td>{{ $resp->name_rol }}</td>
                    <td>{{ $resp->name_rol_view }}</td>
                    <td>{{ $resp->description_rol }}</td>
                    <td>{{ $resp->created_at }}</td>
                    <td>
                        <a href="{{route('roles.edit',$resp->idRol)}}" class="btn btn-primary"><i class="bi bi-brush-fill"></i></a>
                        <button class='btn btn-danger' type='submit' form="delete_{{$resp->idRol}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="bi bi-trash3-fill"></i></button>
                        <form action="{{route('roles.destroy',$resp->idRol)}}" method="POST" id="delete_{{$resp->idRol}}" enctype="multipart/form-data" hidden>
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
            <th>Nombre de Vista</th>
            <th>Descripción</th>
            <th>Fecha de creación</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>