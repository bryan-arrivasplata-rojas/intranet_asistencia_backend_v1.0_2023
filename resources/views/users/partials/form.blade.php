
<div class="form-floating mb-3">
    <input type="text" id="usuario" class="form-control" name="usuario" value="{{(isset($response))?$response->usuario: old('usuario')}}" placeholder="Escribir el usuario" maxlength="255" required autofocus>
    <label for="usuario">Usuario</label>
</div>
<div class="form-floating">
    <input type="password" id="password" class="form-control" name="password" value="{{(isset($response))?$response->password: old('password')}}" placeholder="Escribir el password" maxlength="255" required autocomplete="off">
    <label for="password">Contraseña</label>
</div>