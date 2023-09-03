<div class="container-fluid container-tabla">
    <div class="form-floating mb-3">
        <select id="idArea" class="selected form-select" data-filter="assistances" name="idArea" required>
            <option value="">Seleccionar el Área</option>
            @foreach ($areas as $value)
                <option value="{{ $value->name_area }}">
                    {{$value->name_area}}
                </option>
            @endforeach
        </select>
        <label for="idArea" class="form-label">Seleccionar</label>
    </div>
    <div class="form-floating mb-3">
        <select id="idDepartment" class="selected form-select" data-filter="assistances" name="idDepartment" required>
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
        <select id="idUser" class="selected form-select" data-filter="assistances" name="idUser" required>
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
        <select id="idType" class="selected form-select" data-filter="assistances" name="idType" required>
            <option value="">Seleccionar el Tipo de Asistencia</option>
            @foreach ($types as $value)
                <option value="{{ $value->name_type }}">
                    {{$value->name_type}}
                </option>
            @endforeach
        </select>
        <label for="idType" class="form-label">Seleccionar</label>
    </div>
    <div class="form-floating mb-3">
        <select id="idService" class="selected form-select" data-filter="assistances" name="idService" required>
            <option value="">Seleccionar el Servicio de Asistencia</option>
            @foreach ($services as $value)
                <option value="{{ $value->name_service }}">
                    {{$value->name_service}}
                </option>
            @endforeach
        </select>
        <label for="idService" class="form-label">Seleccionar</label>
    </div>
    <table class="table table-striped {{$table_class}}" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Area</th>
                <th>Departamento</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Servicio</th>
                <th>Observación</th>
                <th>Fecha Creación</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($loading)
                <!-- Mostrar mensaje de carga mientras se cargan los datos -->
                <!--<tr>
                    <td colspan="8" class="text-center message">Cargando...</td>
                </tr>-->
                <tr>
                    <td colspan="9" class="text-center">No hay datos disponibles el dia de hoy.</td>
                </tr>
            @elseif (empty($response))
                <!-- Mostrar mensaje de "no hay datos" si la respuesta está vacía -->
                <tr>
                    <td colspan="9" class="text-center message" id="loadingMessage">No hay datos disponibles.</td>
                </tr>
            @else
                <!-- Mostrar los datos de la tabla -->
                @foreach ($response as $resp)
                    <tr>
                        <td class="identificador">{{ $resp->idAssistance }}</td>
                        <td>{{ $resp->department_user->department->area->name_area ?? 'Área no disponible' }}</td>
                        <td>{{ $resp->department_user->department->name_department ?? 'Departamento no disponible' }}</td>
                        <td>{{ $resp->department_user->user->usuario ?? 'Usuario no disponible' }}</td>
                        <td>{{ $resp->type->name_type ?? 'Tipo no disponible' }}</td>
                        <td>{{ $resp->service->name_service ?? 'Servicio no disponible' }}</td>
                        <td>{{ $resp->observation ?? 'Sin observación' }}</td>
                        <td>{{ $resp->created_at}}</td>
                        <td>
                            <a href="{{route('assistances.edit',$resp->idAssistance)}}" class="btn btn-primary"><i class="bi bi-brush-fill"></i></a>
                            <button class='btn btn-danger' type='submit' form="delete_{{$resp->idAssistance}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="bi bi-trash3-fill"></i></button>
                            <form action="{{route('assistances.destroy',$resp->idAssistance)}}" method="POST" id="delete_{{$resp->idAssistance}}" enctype="multipart/form-data" hidden>
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
                <th>Area</th>
                <th>Departamento</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Servicio</th>
                <th>Observación</th>
                <th>Fecha Creación</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>