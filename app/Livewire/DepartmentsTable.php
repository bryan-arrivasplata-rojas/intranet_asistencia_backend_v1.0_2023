<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;

class DepartmentsTable extends Component
{
    public $loading = true;
    public $response = [];

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $this->response = $http->get('department');

        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($this->response)) {
            $this->loading = false;
        }
    }
    public function render()
    {
        $http = new Http();
        $areas = $http -> get('area');
        $times = $http -> get('time');
        $states = $http -> get('state');
        return view('livewire.departments-table', [
            'states' => $states,
            'areas' => $areas,
            'times' => $times
        ]);
    }
}
