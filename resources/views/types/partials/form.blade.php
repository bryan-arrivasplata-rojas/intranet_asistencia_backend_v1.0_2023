
<div class="form-floating mb-3">
    <input type="text" id="name_type" class="form-control" name="name_type" value="{{(isset($response))?$response->name_type: old('name_type')}}" placeholder="Escribir el nombre de tipo de asistencia" maxlength="255" required autofocus>
    <label for="name_type">Nombre de Tipo de Asistencia</label>
</div>