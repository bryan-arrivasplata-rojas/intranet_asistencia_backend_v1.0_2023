<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;

class ReportsAsistenciaDateTable extends Component
{
    public $loading = true;
    public $response = [];
    public $idUser = null;
    public $start_time = null;
    public $end_time = null;
    public $table_class = null;
    public $time_total = null;
    public $text_alert = 'La fecha final debe ser mayor o igual a la fecha inicial.';

    public function mount(){
        $this->fetchData();
    }
    public function fetchData(){
        $http = new Http();
        $filters = [
            'idUser' => $this->idUser ?? -1,
            'start_time' => $this->start_time ?? -1,
            'end_time' => $this->end_time ?? -1,
        ];
        $this->response = $http->get('assistance/detailsbyuser/'.$filters['idUser'].'/'.$filters['start_time'].'/'.$filters['end_time']);
        
        // Calcular la suma total de time_difference
        
        if (!empty($this->response)) {
            $totalSeconds = 0;
            foreach ($this->response as $resp) {
                $totalSeconds += $resp->time_difference;
            }
            // Convertir la suma total a días, horas, minutos y segundos
            $days = floor($totalSeconds / 86400);
            $totalSeconds -= $days * 86400;
            $hours = floor($totalSeconds / 3600);
            $totalSeconds -= $hours * 3600;
            $minutes = floor($totalSeconds / 60);
            $seconds = $totalSeconds % 60;

            // Formatear y asignar el valor al campo time_total
            $this->time_total = sprintf('%d días %02d:%02d:%02d', $days, $hours, $minutes, $seconds);
            $this->loading = false;
        }else{
            $this->table_class = null;
        }
    }
    public function filterByReportDate()
    {
        $this->table_class = 'table-livewire';
        $this->fetchData();
        $this->dispatch('tableUpdated');
    }
    
    public function render()
    {
        $http = new Http();
        $users = $http -> get('user');
        return view('livewire.reports-asistencia-date-table', [
            'users' => $users
        ]);
    }
    public function updateStartOrEndTime()
    {
        $this->start_time = $this->start_time; // Forzar actualización de la propiedad
        $this->end_time = $this->end_time;     // Forzar actualización de la propiedad
    }
}
