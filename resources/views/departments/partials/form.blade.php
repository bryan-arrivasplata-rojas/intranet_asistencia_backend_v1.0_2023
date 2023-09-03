<div class="form-floating mb-3">
    <input type="text" id="name_department" class="form-control" name="name_department" value="{{(isset($response))?$response->name_department: old('name_department')}}" placeholder="Escribir el nombre del área" maxlength="255" required autofocus>
    <label for="name_department">Nombre del Departamento</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="description_department" class="form-control" name="description_department" value="{{(isset($response))?$response->description_department: old('description_department')}}" placeholder="Escribir el description_department" maxlength="255" required>
    <label for="description_department">Descripción del Departamento</label>
</div>
<div class="form-floating mb-3">
    <select id="idArea" class="selected form-select" name="idArea" required>
        <option value="">Seleccionar el Área</option>
        @foreach ($areas as $value)
            <option value="{{ $value->idArea }}"{{ (isset($response) && $response->idArea == $value->idArea) || old('idArea') == $value->idArea ? 'selected' : '' }}>
                {{ $value->idArea }}: {{$value->name_area}}
            </option>
        @endforeach
    </select>
    <label for="idArea" class="form-label">Seleccionar</label>
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
<div class="form-floating mb-3">
    <select id="idTime" class="selected form-select" name="idTime" required>
        <option value="">Seleccionar el Tiempo laboral</option>
        @foreach ($times as $value)
            <option value="{{ $value->idTime }}"{{ (isset($response) && $response->idTime == $value->idTime) || old('idTime') == $value->idTime ? 'selected' : '' }}>
                {{ $value->idTime }}: {{$value->start_time}} - {{$value->end_time}}
            </option>
        @endforeach
    </select>
    <label for="idTime" class="form-label">Seleccionar</label>
</div>