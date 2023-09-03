<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SessionManager;
use App\Models\Http;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        return view('assistances.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $types = $http -> get('type');
        $services = $http -> get('service');
        $department_users = $http -> get('department_user');
        return view('assistances.create',compact('types','services','department_users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'idType' => $request->idType,
            'idService' => $request->idService,
            'idDepartmentUser' => $request->idDepartmentUser,
            'observation' => $request->observation
        ];
        $respuesta = $http -> post('assistance',$body);
        // Verificar si existe el campo "message" en la respuesta
        if (property_exists($respuesta, 'response')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = $respuesta -> message;
            return redirect()->route('assistances.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('assistances.index')->with('error',json_encode($message));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $types = $http -> get('type');
        $services = $http -> get('service');
        $department_users = $http -> get('department_user');
        $response = $http -> get('assistance/'.$id);
        return view('assistances.edit',compact('response','id','types','services','department_users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'idType' => $request->idType,
            'idService' => $request->idService,
            'idDepartmentUser' => $request->idDepartmentUser,
            'observation' => $request->observation
        ];
        $respuesta = $http->upd('assistance/'.$id,$body);
        // Verificar si existe el campo "message" en la respuesta
        if (!property_exists($respuesta, 'message')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = 'La asistencia '.$respuesta -> idAssistance.' actualizo correctamente la observación';
            return redirect()->route('assistances.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('assistances.index')->with('error',json_encode($message));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $respuesta = $http->del('assistance/' . $id);

        if (!property_exists($respuesta, 'error')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = $respuesta->message;

            // Redirigir a la vista index.blade.php (Livewire se actualizará automáticamente)
            return redirect()->route('assistances.index')->with('success', $success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $error = $respuesta->message;

            // Redirigir a la vista index.blade.php (Livewire se actualizará automáticamente)
            return redirect()->route('assistances.index')->with('error', $error);
        }
    }
}
