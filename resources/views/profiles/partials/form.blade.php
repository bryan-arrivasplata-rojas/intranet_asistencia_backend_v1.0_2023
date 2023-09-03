
<div class="form-floating mb-3">
    <input type="text" id="name_profile" class="form-control" name="name_profile" value="{{(isset($response))?$response->name_profile: old('name_profile')}}" placeholder="Escribir el nombre del perfil" maxlength="255" required autofocus>
    <label for="name_profile">Nombres</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="lastname" class="form-control" name="lastname" value="{{(isset($response))?$response->lastname: old('lastname')}}" placeholder="Escribir el apellidos" maxlength="255" required>
    <label for="lastname">Apellidos</label>
</div>
<div class="form-floating mb-3">
    <input type="email" id="email" class="form-control" name="email" value="{{(isset($response))?$response->email: old('email')}}" placeholder="Escribir el email" maxlength="255" required>
    <label for="email">Email</label>
</div>
<div class="form-floating mb-3" @if (session('name_rol') != 'admin'){{'hidden'}} @endif>
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
<div class="form-floating mb-3" @if (session('name_rol') != 'admin'){{'hidden'}} @endif>
    <select id="idRol" class="selected form-select" name="idRol" required>
        <option value="">Seleccionar el Rol</option>
        @foreach ($roles as $value)
            <option value="{{ $value->idRol }}"{{ (isset($response) && $response->idRol == $value->idRol) || old('idRol') == $value->idRol ? 'selected' : '' }}>
                {{ $value->idRol }}: {{$value->name_rol}}
            </option>
        @endforeach
    </select>
    <label for="idRol" class="form-label">Seleccionar</label>
</div>
<div class="form-floating mb-3" @if (session('name_rol') != 'admin'){{'hidden'}} @endif>
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
    <input type="file" class="form-control image-input" id="image" name="image" multiple>
    <label for="image">Subir imagen de perfil</label>
</div>