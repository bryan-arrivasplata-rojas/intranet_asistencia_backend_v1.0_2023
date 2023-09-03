<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SessionManager;
use App\Models\Http;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        $name_rol = session()->get('name_rol');
        $name_profile = session()->get('name_profile');
        $lastname = session()->get('lastname');
        $http = new Http();
        $services = $http->get('service');
        $services_user = $http->get('user/service/'.session('idUser'));
        $contador_gestion = 0; // Variable para almacenar la suma de count_service
        $response = [];

        if ($services) {
            foreach ($services as $service) {
                $serviceName = $service->name_service;
                $countService = 0; // Valor predeterminado en caso de que no se encuentre en $response
                if (!empty($services_user)){
                    foreach ($services_user as $item) {
                        if ($item->name_service === $serviceName) {
                            if($item->name_service === 'Gestión'){
                                $contador_gestion += $item->count_service;
                            }
                            $countService = $item->count_service;
                            break; // Salir del bucle interno si se encuentra la coincidencia
                        }
                    }
                }
                $response[] = [
                    'name_service' => $serviceName,
                    'count_service' => $countService,
                    'idService' => $service->idService,
                    'description_service' => $service->description_service
                ];
            }
        }
        return view('welcome',compact('services','response','name_rol','name_profile','lastname','response','contador_gestion'));
    }
}
