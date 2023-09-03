
<div class="form-floating mb-3">
    <input type="date" id="start_time" class="form-control" name="start_time" value="{{(isset($response))?$response->start_time: old('start_time')}}" placeholder="Escribir el tiempo de inicio" maxlength="255" required autofocus>
    <label for="start_time">Tiempo Inicial</label>
</div>
<div class="form-floating mb-3">
    <input type="date" id="end_time" class="form-control" name="end_time" value="{{(isset($response))?$response->end_time: old('end_time')}}" placeholder="Escribir el tiempo final" maxlength="255" required>
    <label for="end_time">Tiempo Final</label>
</div>