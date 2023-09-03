<?php
namespace App\Helpers;

use Illuminate\Http\Request;

class SessionManager
{
    public static function checkSessionTimeout(Request $request)
    {
        $lastActivity = session()->get('last_activity');
        $sessionTimeout = env('SESSION_LIFETIME'); // 5 minutos (en segundos)

        if (time() - $lastActivity > $sessionTimeout) {
            session()->put('redirect_url', url()->current());
            // Si ha transcurrido el tiempo de inactividad, cerrar sesión automáticamente
            session()->forget('idUser');
            session()->forget('idProfile');
            session()->forget('name_profile');
            session()->forget('lastname');
            session()->forget('email');
            session()->forget('image');
            session()->forget('idState');
            session()->forget('idRol');
            session()->forget('name_rol');
            session()->forget('name_rol_view');
            session()->forget('name_state');
            session()->forget('idDepartmentUser');
            session()->forget('last_activity');
            $request->session()->regenerateToken();

            // Redirigir a la página de inicio u otra página después de cerrar sesión
            //return redirect('/');
        } else {
            // Actualizar el tiempo de actividad de la sesión
            session()->put('last_activity', time());
        }
    }
}