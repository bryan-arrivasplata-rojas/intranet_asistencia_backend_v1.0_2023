<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;

class TypesTable extends Component
{
    public $loading = true;
    public $response = [];

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $this->response = $http->get('type');

        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($this->response)) {
            $this->loading = false;
        }
    }
    public function render()
    {
        return view('livewire.types-table');
    }
}
