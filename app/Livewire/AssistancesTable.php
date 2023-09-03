<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;
use Carbon\Carbon; // Importar Carbon

class AssistancesTable extends Component
{
    public $loading = true;
    public $response = [];
    public $table_class = null;

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        //$this->response = $http->get('assistance'); //No se recomienda porque seria mucha carga innecesaria
        $response = $http->get('assistance/today');
        
        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($response)) {
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
        $users = $http -> get('user');
        $areas = $http -> get('area');
        $departments = $http -> get('department');
        $types = $http -> get('type');
        $services = $http -> get('service');
        return view('livewire.assistances-table', [
            'users' => $users,
            'areas' => $areas,
            'departments' => $departments,
            'types' => $types,
            'services' => $services
        ]);
    }
}
