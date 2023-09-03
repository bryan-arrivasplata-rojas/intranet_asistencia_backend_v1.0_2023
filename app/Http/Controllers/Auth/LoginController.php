<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'password');
        $http = new Http();
        $respuesta = $http->get('user/login/'.$credentials['usuario']);
        $state = $http->get('user/state/'.$credentials['usuario']);

        if (isset($respuesta->message)) {
            // Autenticación fallida, redirigir al formulario de inicio de sesión
            return redirect()->route('home')->with('response', $respuesta->message);
        } else {
            if (Hash::check($credentials['password'],$respuesta->password)) {
                if($state->name_state==='enabled'){
                    if($respuesta->profile->idProfile!=null || $respuesta->profile->rol->idRol!=null || $respuesta->profile->state->idState!=null || $respuesta->department_user->idDepartmentUser!=null){
                        // Autenticación exitosa, guardar sesión
                        session(['idUser' => $respuesta->idUser]); // Guardar el ID del usuario en la sesión
                        session()->put('usuario', $respuesta->usuario); // Guardar el EMAIL del usuario en la sesión
                        session()->put('idProfile', $respuesta->profile->idProfile);
                        session()->put('name_profile', $respuesta->profile->name_profile);
                        session()->put('lastname', $respuesta->profile->lastname);
                        session()->put('email', $respuesta->profile->email);
                        session()->put('image', $respuesta->profile->image);
                        session()->put('idState', $respuesta->profile->idState);
                        session()->put('idRol', $respuesta->profile->idRol);
                        session()->put('name_rol', $respuesta->profile->rol->name_rol);
                        session()->put('name_rol_view', $respuesta->profile->rol->name_rol_view);
                        session()->put('name_state', $respuesta->profile->state->name_state);
                        session()->put('idDepartmentUser',$respuesta->department_user->idDepartmentUser);
                        session()->put('last_activity', time());
                        if (session()->has('redirect_url')) {
                            $redirectUrl = session('redirect_url');
                            session()->forget('redirect_url'); // Eliminar la URL guardada de la sesión
                            return redirect()->to($redirectUrl); // Redirigir al usuario a la URL guardada
                        } else {
                            return redirect()->route('home'); // Si no hay URL guardada, redirigir a la página de inicio
                        }
                    }else{
                        return redirect()->route('home')->with('response', 'Usuario no tiene perfil registrado, comunicarse con soporte técnico');
                    }
                }else{
                    return redirect()->route('home')->with('response', 'Usuario | departamento | area esta deshabilitado');
                }
                
            }else{
                return redirect()->route('home')->with('response', 'Contraseña incorrecta');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logout(Request $request)
    {
        $request->session()->forget('idUser');
        session()->forget('idProfile');
        session()->forget('name_profile');
        session()->forget('lastname');
        session()->forget('email');
        session()->forget('image');
        session()->forget('idUser');
        session()->forget('idState');
        session()->forget('idRol');
        session()->forget('name_rol');
        session()->forget('name_rol_view');
        session()->forget('name_state');
        session()->forget('idDepartmentUser');
        session()->forget('last_activity');
        $request->session()->regenerateToken();

        // Redirigir a la página de inicio u otra página después de cerrar sesión
        return redirect('/');
    }

    /*public function logoutAuto(Request $request)
    {
        return redirect()->route('home');
    }*/
}
