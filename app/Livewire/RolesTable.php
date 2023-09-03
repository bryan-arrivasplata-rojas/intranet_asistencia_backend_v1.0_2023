<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;
use Carbon\Carbon; // Importar Carbon

class RolesTable extends Component
{
    public $loading = true;
    public $response = [];

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $response = $http->get('rol');
        // Formatear la fecha en cada elemento del array response
        if(!empty($response)){
            foreach ($response as $item) {
                $item->created_at = Carbon::parse($item->created_at)->format('d-m-Y H:i:s');
            }
            $this->response = $response;
            $this->loading = false;
        }
    }
    public function render()
    {
        return view('livewire.roles-table');
    }
}