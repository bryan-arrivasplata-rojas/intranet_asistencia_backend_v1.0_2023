<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;
use Carbon\Carbon;

class ReportsAsistenciaUserTable extends Component
{
    public $loading = true;
    public $response = [];
    public $table_class = null;

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $response = $http->get('assistance/byuser/'.session('idUser'));
        // Formatear la fecha en cada elemento del array response
        if(!empty($response)){
            foreach ($response as $item) {
                $item->created_at = Carbon::parse($item->created_at)->format('d-m-Y H:i:s');
            }
            $this->response = $response;
            $this->loading = false;
            $this->table_class = 'table-livewire';
        }else{
            $this->table_class = null;
        }
    }
    public function render()
    {
        $http = new Http();
        $types = $http -> get('type');
        $services = $http -> get('service');
        return view('livewire.reports-asistencia-user-table', [
            'types' => $types,
            'services' => $services
        ]);
    }
}
