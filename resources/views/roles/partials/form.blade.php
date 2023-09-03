
<div class="form-floating mb-3">
    <input type="text" id="name_rol" class="form-control" name="name_rol" value="{{(isset($response))?$response->name_rol: old('name_rol')}}" placeholder="Escribir el nombre del rol" maxlength="255" required autofocus {{(isset($response))?'hidden':''}}>
    <label for="name_rol">Nombre de Rol</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="name_rol_view" class="form-control" name="name_rol_view" value="{{(isset($response))?$response->name_rol_view: old('name_rol_view')}}" placeholder="Escribir el nombre de vista del rol" maxlength="255" required autofocus>
    <label for="name_rol_view">Nombre para Mostrar del Rol</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="description_rol" class="form-control" name="description_rol" value="{{(isset($response))?$response->description_rol: old('description_rol')}}" placeholder="Escribir la descripción del rol" maxlength="255" required>
    <label for="description_rol">Descripción del Rol</label>
</div>