<table class="table-livewire table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Password</th>
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
                    <td class="identificador">{{ $resp->idUser }}</td>
                    <td>{{ $resp->profile->name_profile ?? 'Nombre no disponible' }}</td>
                    <td>{{ $resp->profile->lastname ?? 'Apellido no disponible' }}</td>
                    <td>{{ $resp->usuario }}</td>
                    <td>{{ $resp->password }}</td>
                    <td>
                        <a href="{{route('users.edit',$resp->idUser)}}" class="btn btn-primary"><i class="bi bi-brush-fill"></i></a>
                        <button class='btn btn-danger' type='submit' form="delete_{{$resp->idUser}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="bi bi-trash3-fill"></i></button>
                        <form action="{{route('users.destroy',$resp->idUser)}}" method="POST" id="delete_{{$resp->idUser}}" enctype="multipart/form-data" hidden>
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
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>