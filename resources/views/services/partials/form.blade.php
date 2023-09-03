
<div class="form-floating mb-3">
    <input type="text" id="name_service" class="form-control" name="name_service" value="{{(isset($response))?$response->name_service: old('name_service')}}" placeholder="Escribir el nombre del servicio" maxlength="255" required autofocus>
    <label for="name_service">Nombre del Servicio</label>
</div>
<div class="form-floating mb-3">
    <input type="text" id="description_service" class="form-control" name="description_service" value="{{(isset($response))?$response->description_service: old('description_service')}}" placeholder="Escribir la descripción del servicio" maxlength="255" required>
    <label for="description_service">Nombre del Servicio</label>
</div>
<div class="form-floating mb-3">
    <input type="number" id="time_seconds" class="form-control" name="time_seconds" value="{{(isset($response))?$response->time_seconds: old('time_seconds')}}" placeholder="Escribir el tiempo en segundos" maxlength="255">
    <label for="time_seconds">Tiempo en Segundos</label>
</div>
<div class="form-floating mb-3">
    <input type="number" id="position" class="form-control" name="position" value="{{(isset($response))?$response->position: old('position')}}" placeholder="Escribir la posición" maxlength="255">
    <label for="position">Posición del Servicio</label>
</div>