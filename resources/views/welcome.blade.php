@extends('home')
@section('content')
<div class="container text-center welcome-options">
    <div class="row">
        @if(session('name_rol')==='admin' || session('name_rol')==='executive')
        <div class="col-lg-6 colum">
            <div class="container-fluid text-center">
                <a href="{{route('reports_asistencia_date.index')}}">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Trabajadores</h5>
                        </div>
                        
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8" style="text-align: left;">Reporte de trabajadores</div>
                                    <div class="col-lg-4 col-md-4 col-sm-4"><i class="bi bi-people"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Ingresar <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 colum">
            <div class="container-fluid text-center">
                <a href="{{route('assistances.index')}}">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Asistencia</h5>
                        </div>
                        
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8" style="text-align: left;">Reporte de asistencias</div>
                                    <div class="col-lg-4 col-md-4 col-sm-4"><i class="bi bi-check-circle-fill"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Ingresar <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif
        <h1 class="mt-3">Marcar Asistencia</h1>
        <div class="col-lg-12 col-md-12 colum">
            @if(session('idUser'))
                <p id="text-end-service"
                    class="
                        @foreach ($response as $resp)
                            @if($resp['name_service'] ==='Gestión' && $resp['count_service'] % 2 != 0 && $resp['count_service']!==0)
                                {{'text-hide'}}
                            @endif
                            @if($resp['name_service'] ==='Gestión' && $resp['count_service']==0)
                                {{'text-hide'}}
                            @endif
                        @endforeach">
                    Muchas gracias por su día laborado
                </p>
                @foreach ($response as $resp)
                    <button 
                        type="button"
                        class="btn btn-service                            
                            @if($resp['count_service'] % 2 == 0)
                                {{'btn-primary'}}
                            @else
                                {{'btn-warning'}}
                            @endif"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="{{ $resp['description_service'] }}"
                        data-name="{{$resp['name_service']}}"
                        data-id="{{ $resp['idService']}}"
                        data-toggle="tooltip"
                        data-placement="bottom"
                    >
                        {{$resp['name_service']}}
                    </button>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection