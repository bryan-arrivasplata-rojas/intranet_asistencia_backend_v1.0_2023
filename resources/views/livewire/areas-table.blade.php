<div class="container-fluid container-tabla">
    <div class="form-floating mb-3">
        <select id="idState" class="selected form-select" data-filter="areas" name="idState" required>
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
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
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
                        <td class="identificador">{{ $resp->idArea }}</td>
                        <td>{{ $resp->name_area }}</td>
                        <td>{{ $resp->description_area }}</td>
                        <td>{{ $resp->state->name_state ?? 'Estado no disponible' }}</td>
                        <td>{{ $resp->created_at }}</td>
                        <td>
                            <a href="{{route('areas.edit',$resp->idArea)}}" class="btn btn-primary"><i class="bi bi-brush-fill"></i></a>
                            <button class='btn btn-danger' type='submit' form="delete_{{$resp->idArea}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')"><i class="bi bi-trash3-fill"></i></button>
                            <form action="{{route('areas.destroy',$resp->idArea)}}" method="POST" id="delete_{{$resp->idArea}}" enctype="multipart/form-data" hidden>
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
                <th>Estado</th>
                <th>Fecha Creación</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>