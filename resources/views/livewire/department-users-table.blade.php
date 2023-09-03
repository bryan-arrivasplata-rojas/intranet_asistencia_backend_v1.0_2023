<div class="container-fluid container-tabla">
    <div class="form-floating mb-3">
        <select id="idDepartment" class="selected form-select" data-filter="department_users" name="idDepartment" required>
            <option value="">Seleccionar el Departamento</option>
            @foreach ($departments as $value)
                <option value="{{ $value->name_department }}">
                    {{$value->name_department}}
                </option>
            @endforeach
        </select>
        <label for="idDepartment" class="form-label">Seleccionar</label>
    </div>
    <div class="form-floating mb-3">
        <select id="idUser" class="selected form-select" data-filter="department_users" name="idUser" required>
            <option value="">Seleccionar el Usuario</option>
            @foreach ($users as $value)
                <option value="{{$value->usuario}}">
                    {{$value->usuario}}
                </option>
            @endforeach
        </select>
        <label for="idUser" class="form-label">Seleccionar</label>
    </div>
    <div class="form-floating mb-3">
        <select id="idState" class="selected form-select" data-filter="department_users" name="idState" required>
            <option value="">Seleccionar el Estado</option>
            @foreach ($states as $value)
                <option value="{{ $value->name_state }}">
                    {{$value->name_state}}
                </option>
            @endforeach
        </select>
        <label for="idState" class="form-label">Seleccionar</label>
    </div>
    <table class="table-livewire table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Departamento</th>
                <th>Nombre Completo</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($loading)
                <!-- Mostrar mensaje de carga mientras se cargan los datos -->
                <tr>
                    <td colspan="5" class="text-center message">Cargando...</td>
                </tr>
            @elseif (empty($response))
                <!-- Mostrar mensaje de "no hay datos" si la respuesta está vacía -->
                <tr>
                    <td colspan="5" class="text-center message" id="loadingMessage">No hay datos disponibles.</td>
                </tr>
            @else
                <!-- Mostrar los datos de la tabla -->
                @foreach ($response as $resp)
                    <tr>
                        <td class="identificador">{{ $resp->idDepartmentUser }}</td>
                        <td>{{ $resp->department->name_department ?? 'Departamento no disponible' }}</td>
                        <td>{{ $resp->user->profile->name_profile ?? 'Perfil no disponible' }}</td>
                        <td>{{ $resp->user->usuario ?? 'Usuario no disponible' }}</td>
                        <td>{{ $resp->state->name_state ?? 'Estado no disponible' }}</td>
                        <td>
                            <a href="{{route('department_users.edit',$resp->idDepartmentUser)}}" class="btn btn-primary"><i class="bi bi-brush-fill"></i></a>
                            <button class='btn btn-danger' type='submit' form="delete_{{$resp->idDepartmentUser}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="bi bi-trash3-fill"></i></button>
                            <form action="{{route('department_users.destroy',$resp->idDepartmentUser)}}" method="POST" id="delete_{{$resp->idDepartmentUser}}" enctype="multipart/form-data" hidden>
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
                <th>Departamento</th>
                <th>Nombre Completo</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>