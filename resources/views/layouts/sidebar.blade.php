<div class="container-fluid informacion_usuario">
    <img class="image_logo" title="logo" src="{{env('APP_URL_API')}}images/logo.png">
    <h5>{{session('name_rol_view')}}</h5>
</div>
<ul class="sidebar-list">
    <li class="list" onclick="simulateLinkClick(event)">
        <a href="{{route('home')}}"><i class="bi bi-house-heart-fill"></i><span>Home</span></a>
    </li>
    @if(session('name_rol')==='admin')
    <li class="list {{Request::is('users*','roles*','types*','services*','times*','states*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a><i class="bi bi-puzzle"></i><span>Parametros</span></a>
        <ul class="list-sub">
            <li class="{{'users'==Request::is('users*')?'active':''}}">
                <a href="{{route('users.index')}}"><i class="bi bi-person-badge-fill"></i><span>Usuario</span></a>
            </li>
            <li class="{{'roles'==Request::is('roles*')?'active':''}}">
                <a href="{{route('roles.index')}}"><i class="bi bi-dpad"></i><span>Rol</span></a>
            </li>
            <li class="{{'types'==Request::is('types*')?'active':''}}">
                <a href="{{route('types.index')}}"><i class="bi bi-alexa"></i><span>Tipo de Asist.</span></a>
            </li>
            <li class="{{'services'==Request::is('services*')?'active':''}}">
                <a href="{{route('services.index')}}"><i class="bi bi-ui-radios-grid"></i><span>Servicio de Asist.</span></a>
            </li>
            <li class="{{'times'==Request::is('times*')?'active':''}}">
                <a href="{{route('times.index')}}"><i class="bi bi-alarm-fill"></i><span>Tiempos</span></a>
            </li>
            <li class="{{'states'==Request::is('states*')?'active':''}}">
                <a href="{{route('states.index')}}"><i class="bi bi-balloon-heart"></i><span>Estado</span></a>
            </li>
        </ul>
    </li>
    @endif
    @if(session('name_rol')==='admin' || session('name_rol') === 'executive')
    <li class="list {{Request::is('profiles*','areas*','departments*','department_users*','assistances*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a><i class="bi bi-playstation"></i><span>Opciones</span></a>
        <ul class="list-sub">
            @if(session('name_rol')==='admin')
            <li class="{{'profiles'==Request::is('profiles*')?'active':''}}">
                <a href="{{route('profiles.index')}}"><i class="bi bi-person-vcard-fill"></i><span>Perfil</span></a>
            </li>
            <li class="{{'areas'==Request::is('areas*')?'active':''}}">
                <a href="{{route('areas.index')}}"><i class="bi bi-box2-heart-fill"></i><span>Área</span></a>
            </li>
            <li class="{{'departments'==Request::is('departments*')?'active':''}}">
                <a href="{{route('departments.index')}}"><i class="bi bi-boxes"></i><span>Departamento</span></a>
            </li>
            <li class="{{'department_users'==Request::is('department_users*')?'active':''}}">
                <a href="{{route('department_users.index')}}"><i class="bi bi-bricks"></i><span>Dept. x Usuario</span></a>
            </li>
            @endif
            @if(session('name_rol')==='admin' || session('name_rol') === 'executive')
            <li class="{{'assistances'==Request::is('assistances*')?'active':''}}">
                <a href="{{route('assistances.index')}}"><i class="bi bi-check-circle-fill"></i><span>Asistencia</span></a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    <li class="list {{Request::is('reports_asistencia_date*','reports_asistencia_date*')?'active':''}}" onclick="simulateLinkClick(event)">
        <a><i class="bi bi-file-earmark-text-fill"></i><span>Reportes</span></a>
        <ul class="list-sub">
            @if(session('name_rol') === 'admin' || session('name_rol') === 'executive')
            <li class="{{'reports_asistencia_date'==Request::is('reports_asistencia_date*')?'active':''}}">
                <a href="{{route('reports_asistencia_date.index')}}"><i class="bi bi-file-earmark-bar-graph"></i><span>Reporte Fecha</span></a>
            </li>
            @endif
            <li class="{{'reports_asistencia_date'==Request::is('reports_asistencia_date*')?'active':''}}">
                <a href="{{route('reports_asistencia_user.index')}}"><i class="bi bi-file-earmark-bar-graph"></i><span>Reporte Usuario</span></a>
            </li>
        </ul>
    </li>
</ul>