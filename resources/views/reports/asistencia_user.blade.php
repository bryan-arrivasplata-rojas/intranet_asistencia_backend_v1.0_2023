@extends('layouts.app')
@section('content')
<div class="card mt-3" style="border:none;">
    <div class="card-header d-inline-flex">
        <h5>Reporte de Asistencia por Usuario</h5>
    </div>
    @livewire('reports-asistencia-user-table')
</div>
@endsection