<div class="form-floating mb-3">
    <select id="idDepartment" class="selected form-select" name="idDepartment" required>
        <option value="">Seleccionar el Departamento</option>
        @foreach ($departments as $value)
            <option value="{{ $value->idDepartment }}"{{ (isset($response) && $response->idDepartment == $value->idDepartment) || old('idDepartment') == $value->idDepartment ? 'selected' : '' }}>
                {{ $value->idDepartment }}: {{$value->name_department}}
            </option>
        @endforeach
    </select>
    <label for="idDepartment" class="form-label">Seleccionar</label>
</div>
<div class="form-floating mb-3">
    <select id="idUser" class="selected form-select" name="idUser" required>
        <option value="">Seleccionar el Usuario</option>
        @foreach ($users as $value)
            <option value="{{ $value->idUser }}"{{ (isset($response) && $response->idUser == $value->idUser) || old('idUser') == $value->idUser ? 'selected' : '' }}>
                {{ $value->idUser }}: {{$value->usuario}}
            </option>
        @endforeach
    </select>
    <label for="idUser" class="form-label">Seleccionar</label>
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