<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SessionManager;
use App\Models\Http;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        return view('times.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        return view('times.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ];
        $respuesta = $http -> post('time',$body);
        // Verificar si existe el campo "message" en la respuesta
        if (property_exists($respuesta, 'response')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = $respuesta -> message;
            return redirect()->route('times.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('times.index')->with('error',json_encode($message));
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
        $response = $http -> get('time/'.$id);
        return view('times.edit',compact('response','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ];
        $respuesta = $http->upd('time/'.$id,$body);
        // Verificar si existe el campo "message" en la respuesta
        if (!property_exists($respuesta, 'message')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = 'El tiempo '.$respuesta -> idUser.' actualizo correctamente sus datos';
            return redirect()->route('times.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('times.index')->with('error',json_encode($message));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $respuesta = $http->del('time/' . $id);

        if (!property_exists($respuesta, 'error')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = $respuesta->message;

            // Redirigir a la vista index.blade.php (Livewire se actualizará automáticamente)
            return redirect()->route('times.index')->with('success', $success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $error = $respuesta->message;

            // Redirigir a la vista index.blade.php (Livewire se actualizará automáticamente)
            return redirect()->route('times.index')->with('error', $error);
        }
    }
}
