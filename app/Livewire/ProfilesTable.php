<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;

class ProfilesTable extends Component
{
    /*public $loading = true;
    public $response = [];
    public $selectedRol = null;
    public $selectedState = null;

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $filters = [
            'rol' => $this->selectedRol ?? -1,
            'state' => $this->selectedState ?? -1,
        ];
        //$this->response = $http->get('profile');
        $this->response = $http->get('profile/search/'.$filters['rol'].'&'.$filters['state']);
        
        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($this->response)) {
            $this->loading = false;
        }
    }
    public function filterByRol($idRol)
    {
        $this->selectedRol = $idRol;
        $this->fetchData(); // Llamar al método fetchData() para obtener los datos filtrados
        //$this->dispatch('tableUpdated'); // Emitir el evento 'tableUpdated'
    }

    public function filterByState($idState)
    {
        $this->selectedState = $idState;
        $this->fetchData(); // Llamar al método fetchData() para obtener los datos filtrados
        //$this->dispatch('tableUpdated'); // Emitir el evento 'tableUpdated'
    }
    public function render()
    {
        $http = new Http();
        $roles = $http -> get('rol');
        $states = $http -> get('state');
        return view('livewire.profiles-table', [
            'roles' => $roles,
            'states' => $states,
        ]);
    }*/
    public $loading = true;
    public $response = [];

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $this->response = $http->get('profile');

        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($this->response)) {
            $this->loading = false;
        }
    }
    public function render()
    {
        $http = new Http();
        $roles = $http -> get('rol');
        $states = $http -> get('state');
        return view('livewire.profiles-table', [
            'roles' => $roles,
            'states' => $states,
        ]);
    }
}
