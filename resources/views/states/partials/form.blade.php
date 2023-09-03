
<div class="form-floating mb-3">
    <input type="text" id="name_state" class="form-control" name="name_state" value="{{(isset($response))?$response->name_state: old('name_state')}}" placeholder="Escribir el nombre del estado" maxlength="255" required autofocus>
    <label for="name_state">Nombre de Estado</label>
</div>