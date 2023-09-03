<div class="container-fluid container-tabla">
    <div class="form-floating mb-3">
        <select id="idType" class="selected form-select" data-filter="report_user" name="idType" required>
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
        <select id="idService" class="selected form-select" data-filter="report_user" name="idService" required>
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
                <th>ID Asistencia</th>
                <th>ID Depart.User</th>
                <th>ID User</th>
                <th>Tipo</th>
                <th>Servicio</th>
                <th>Fecha Creación</th>
            </tr>
        </thead>
        <tbody>
            @if ($loading)
                <!-- Mostrar mensaje de carga mientras se cargan los datos -->
                <!--<tr>
                    <td colspan="6" class="text-center">Cargando...</td>
                </tr>-->
                <tr>
                    <td colspan="6" class="text-center">No hay datos disponibles.</td>
                </tr>
            @elseif (empty($response))
                <!-- Mostrar mensaje de "no hay datos" si la respuesta está vacía -->
                <tr>
                    <td colspan="6" class="text-center">No hay datos disponibles.</td>
                </tr>
            @else
                <!-- Mostrar los datos de la tabla -->
                @foreach ($response as $resp)
                    <tr>
                        <td class="identificador">{{ $resp->idAssistance}}</td>
                        <td>{{ $resp->department_user->idDepartmentUser ?? 'DepartmentUser no disponible'}}</td>
                        <td>{{ $resp->department_user->user->idUser ?? 'Usuario no disponible'}}</td>
                        <td>{{ $resp->type->name_type ?? 'Usuario no disponible'}}</td>
                        <td>{{ $resp->service->name_service ?? 'Servicio no disponible'}}</td>
                        <td>{{ $resp->created_at}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>ID Asistencia</th>
                <th>ID Depart.User</th>
                <th>ID User</th>
                <th>Tipo</th>
                <th>Servicio</th>
                <th>Fecha Creación</th>
            </tr>
        </tfoot>
    </table>
</div>