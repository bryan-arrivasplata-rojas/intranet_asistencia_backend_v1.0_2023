<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Http;

class DepartmentUsersTable extends Component
{
    public $loading = true;
    public $response = [];

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $this->response = $http->get('department_user');

        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($this->response)) {
            $this->loading = false;
        }
    }
    public function render()
    {
        $http = new Http();
        $users = $http -> get('user');
        $departments = $http -> get('department');
        $states = $http -> get('state');
        return view('livewire.department-users-table', [
            'states' => $states,
            'users' => $users,
            'departments' => $departments
        ]);
    }
}
