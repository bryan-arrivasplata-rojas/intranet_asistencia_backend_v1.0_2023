<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;

class AreasTable extends Component
{
    public $loading = true;
    public $response = [];

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $this->response = $http->get('area');

        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($this->response)) {
            $this->loading = false;
        }
    }
    public function render()
    {
        $http = new Http();
        $states = $http -> get('state');
        return view('livewire.areas-table', [
            'states' => $states,
        ]);
    }
}
