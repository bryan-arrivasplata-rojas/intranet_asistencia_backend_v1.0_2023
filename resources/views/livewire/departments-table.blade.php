<div class="container-fluid container-tabla">
    <div class="form-floating mb-3">
        <select id="idArea" class="selected form-select" data-filter="departments" name="idArea" required>
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
        <select id="idState" class="selected form-select" data-filter="departments" name="idState" required>
            <option value="">Seleccionar el Estado</option>
            @foreach ($states as $value)
                <option value="{{ $value->name_state }}">
                    {{$value->name_state}}
                </option>
            @endforeach
        </select>
        <label for="idState" class="form-label">Seleccionar</label>
    </div>
    <div class="form-floating mb-3">
        <select id="idTime" class="selected form-select" data-filter="departments" name="idTime" required>
            <option value="">Seleccionar el Tiempo laboral</option>
            @foreach ($times as $value)
                <option value="{{$value->start_time}} - {{$value->end_time}}">
                    {{$value->start_time}} - {{$value->end_time}}
                </option>
            @endforeach
        </select>
        <label for="idTime" class="form-label">Seleccionar</label>
    </div>
    <table class="table-livewire table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Área</th>
                <th>Estado</th>
                <th>Tiempo Laboral</th>
                <th>Fecha Creación</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($loading)
                <!-- Mostrar mensaje de carga mientras se cargan los datos -->
                <tr>
                    <td colspan="9" class="text-center message">Cargando...</td>
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
                        <td class="identificador">{{ $resp->idDepartment }}</td>
                        <td>{{ $resp->name_department }}</td>
                        <td>{{ $resp->description_department }}</td>
                        <td>{{ $resp->area->name_area ?? 'Área no disponible' }}</td>
                        <td>{{ $resp->state->name_state ?? 'Estado no disponible' }}</td>
                        <td>{{ $resp->time->start_time ?? 'Tiempo inicial no disponible' }} - {{ $resp->time->end_time ?? 'Tiempo final no disponible' }}</td>
                        <td>{{ $resp->created_at }}</td>
                        <td>
                            <a href="{{route('departments.edit',$resp->idDepartment)}}" class="btn btn-primary"><i class="bi bi-brush-fill"></i></a>
                            <button class='btn btn-danger' type='submit' form="delete_{{$resp->idDepartment}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="bi bi-trash3-fill"></i></button>
                            <form action="{{route('departments.destroy',$resp->idDepartment)}}" method="POST" id="delete_{{$resp->idDepartment}}" enctype="multipart/form-data" hidden>
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
                <th>Descripción</th>
                <th>Área</th>
                <th>Estado</th>
                <th>Tiempo Laboral</th>
                <th>Fecha Creación</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>