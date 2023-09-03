<div class="container-fluid container-tabla">
    <div class="row" style="text-align: -webkit-center;">
        <div class="col-lg-12 col-md-12">
            <div class="alert alerta alert-danger alert-dismissible fade show" id="alert_error" role="alert" style="display: none;">
                {{$text_alert}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alerta alert_hide alert-success" role="alert" style="display: none;">
                Seleccionar y completar todos los campos para el reporte.
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-floating mb-3">
                <select id="idUser" class="selected form-select" data-filter="assistances" name="idUser" wire:model="idUser" required>
                    <option value="">Seleccionar el Usuario</option>
                    @foreach ($users as $value)
                        <option value="{{$value->idUser}}">
                            {{$value->usuario}} - {{$value->profile->name_profile}} {{$value->profile->lastname}}
                        </option>
                    @endforeach
                </select>
                <label for="idUser" class="form-label">Seleccionar</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="start_time" id="start_time" placeholder="Seleccionar una fecha de inicio" wire:model="start_time" required>
                <label for="start_time">Fecha inicial</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="end_time" id="end_time" placeholder="Seleccionar una fecha final" wire:model="end_time" required>
                <label for="end_time">Fecha final</label>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-3">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary" id="btn-mostrar-reporte" wire:click="filterByReportDate"><i class="bi bi-eye-fill"></i> Mostrar Reporte</button>
            </div>
            
        </div>
        <div class="col-lg-6 col-md-6 mb-3">
            <div class="d-grid gap-2">
                <div class="alert alerta alert-primary" id="alert_time" role="alert" style="display: none;">
                    Tiempo total (Diferencia): {{$time_total}}
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped {{$table_class}} hide-table" id="table-report" style="width:100%">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Servicio</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Diferencia</th>
            </tr>
        </thead>
        <tbody>
            @if (empty($response))
                <!-- Mostrar mensaje de "no hay datos" si la respuesta está vacía -->
                <tr>
                    <td colspan="5" class="text-center message" id="loadingMessage">No hay datos disponibles.</td>
                </tr>
            @else
                <!-- Mostrar los datos de la tabla -->
                @foreach ($response as $resp)
                    <tr>
                        <td>{{ $resp->user->profile->name_profile}} {{$resp->user->profile->lastname}}</td>
                        <td>{{ $resp->service->name_service ?? 'Servicio no disponible' }}</td>
                        <td>{{ $resp->start_date}}</td>
                        <td>{{ $resp->end_date }}</td>
                        <td>
                            {{-- Convertir time_difference a días, horas, minutos y segundos --}}
                            <?php
                                $timeDifferenceInSeconds = $resp->time_difference;
                                $days = floor($timeDifferenceInSeconds / 86400);
                                $timeDifferenceInSeconds -= $days * 86400;
                                $hours = floor($timeDifferenceInSeconds / 3600);
                                $timeDifferenceInSeconds -= $hours * 3600;
                                $minutes = floor($timeDifferenceInSeconds / 60);
                                $seconds = $timeDifferenceInSeconds % 60;
                            ?>
                            {{ sprintf('%d días %02d:%02d:%02d', $days, $hours, $minutes, $seconds) }}
                        </td>
                        
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre Completo</th>
                <th>Servicio</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Diferencia</th>
            </tr>
        </tfoot>
    </table>
</div>