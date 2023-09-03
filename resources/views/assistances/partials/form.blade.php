
<div class="form-floating mb-3">
    <input type="text" id="observation" class="form-control" name="observation" value="{{(isset($response))?$response->observation: old('observation')}}" placeholder="Escribir la observación" maxlength="200" autofocus>
    <label for="observation">Observación</label>
</div>
<div class="form-floating mb-3" hidden>
    <select id="idDepartmentUser" class="selected form-select" name="idDepartmentUser" required>
        <option value="">Seleccionar el Departamento x Usuario</option>
        @foreach ($department_users as $value)
            <option value="{{ $value->idDepartmentUser }}"{{ (isset($response) && $response->idDepartmentUser == $value->idDepartmentUser) || old('idDepartmentUser') == $value->idDepartmentUser ? 'selected' : '' }}>
                {{ $value->department->name_department }}: {{$value->user->usuario}}
            </option>
        @endforeach
    </select>
    <label for="idDepartmentUser" class="form-label">Seleccionar</label>
</div>
<div class="form-floating mb-3" hidden>
    <select id="idType" class="selected form-select" name="idType" required>
        <option value="">Seleccionar el Tipo de Asistencia</option>
        @foreach ($types as $value)
            <option value="{{ $value->idType }}"{{ (isset($response) && $response->idType == $value->idType) || old('idType') == $value->idType ? 'selected' : '' }}>
                {{ $value->idType }}: {{$value->name_type}}
            </option>
        @endforeach
    </select>
    <label for="idType" class="form-label">Seleccionar</label>
</div>
<div class="form-floating mb-3" hidden>
    <select id="idService" class="selected form-select" name="idService" required>
        <option value="">Seleccionar el Servicio de Asistencia</option>
        @foreach ($services as $value)
            <option value="{{ $value->idService }}"{{ (isset($response) && $response->idService == $value->idService) || old('idService') == $value->idService ? 'selected' : '' }}>
                {{ $value->idService }}: {{$value->name_service}}
            </option>
        @endforeach
    </select>
    <label for="idService" class="form-label">Seleccionar</label>
</div>