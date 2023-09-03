<div class="form-floating mb-3">
    <input type="text" id="name_area" class="form-control" name="name_area" value="{{(isset($response))?$response->name_area: old('name_area')}}" placeholder="Escribir el nombre del área" maxlength="255" required autofocus>
    <label for="name_area">Nombre del Área</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="description_area" class="form-control" name="description_area" value="{{(isset($response))?$response->description_area: old('description_area')}}" placeholder="Escribir el description_area" maxlength="255" required>
    <label for="description_area">Descripción del Área</label>
</div>
<div class="form-floating mb-3">
    <select id="idState" class="selected form-select" name="idState" required>
        <option value="">Seleccionar el Estado</option>
        @foreach ($states as $value)
            <option value="{{ $value->idState }}"{{ (isset($response) && $response->idState == $value->idState) || old('idState') == $value->idState ? 'selected' : '' }}>
                {{ $value->idState }}: {{$value->name_state}}
            </option>
        @endforeach
    </select>
    <label for="idState" class="form-label">Seleccionar</label>
</div>