<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SessionManager;
use App\Models\Http;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        return view('profiles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $users = $http -> get('user/available');
        $states = $http -> get('state');
        $roles = $http -> get('rol');
        return view('profiles.create',compact('users','states','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'name_profile' => $request->name_profile,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'idUser' => $request->idUser,
            'idRol' => $request->idRol,
            'idState' => $request->idState
        ];
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $respuesta = $http -> post('profile',$body,$file);
        }else{
            $respuesta = $http -> post('profile',$body);
        }
        // Verificar si existe el campo "message" en la respuesta
        if (property_exists($respuesta, 'response')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = $respuesta -> message;
            return redirect()->route('profiles.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('profiles.index')->with('error',json_encode($message));
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
        if (session('name_rol') != 'admin') {
            // Puedes personalizar el manejo de la denegación de acceso aquí, como redirigir o mostrar un mensaje de error.
            if($id != session('idProfile')){
                return redirect()->route('home');
            }  
        }
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $users = $http -> get('user/available/'.$id);
        $states = $http -> get('state');
        $roles = $http -> get('rol');
        $response = $http -> get('profile/'.$id);
        return view('profiles.edit',compact('response','id','users','states','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $body = [
            'name_profile' => $request->name_profile,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'idUser' => $request->idUser,
            'idRol' => $request->idRol,
            'idState' => $request->idState
        ];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $respuesta = $http -> post('profile/'.$id,$body,$file);
        }else{
            $respuesta = $http -> post('profile/'.$id,$body);
        }
        // Verificar si existe el campo "message" en la respuesta
        if (!property_exists($respuesta, 'message')) {
            if(session('name_rol')!='admin'){
                session()->put('name_profile', $respuesta->name_profile);
                session()->put('lastname', $respuesta->lastname);
                session()->put('email', $respuesta->email);
                session()->put('image', $respuesta->image);
            }
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = 'El perfil '.$respuesta -> idProfile.' actualizo correctamente sus datos';
            return redirect()->route('profiles.index')->with('success',$success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $message = $respuesta->message;
            return redirect()->route('profiles.index')->with('error',json_encode($message));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        SessionManager::checkSessionTimeout($request);
        $http = new Http();
        $respuesta = $http->del('profile/' . $id);

        if (!property_exists($respuesta, 'error')) {
            // El campo "message" NO está presente en la respuesta, lo que significa que no hay errores.
            $success = $respuesta->message;

            // Redirigir a la vista index.blade.php (Livewire se actualizará automáticamente)
            return redirect()->route('profiles.index')->with('success', $success);
        } else {
            // Si el campo "message" está presente en la respuesta, significa que hay errores.
            // Entonces puedes acceder al contenido de "message" y manejar los errores.
            $error = $respuesta->message;

            // Redirigir a la vista index.blade.php (Livewire se actualizará automáticamente)
            return redirect()->route('profiles.index')->with('error', $error);
        }
    }
}
