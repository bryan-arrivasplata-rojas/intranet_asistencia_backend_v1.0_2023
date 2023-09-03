<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" ><i class="bi bi-list"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="d-flex navbar-nav">
                
                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{session('name_profile')}} {{session('lastname')}} <img class="image_profile_head" title="{{session('image')}}" src="{{env('APP_URL_API')}}{{session('image')}}"></a>
                    
                    <ul class="dropdown-menu" style="right: 0px;">
                        <li>
                            <a href="{{ route('profiles.edit', ['profile' => session('idProfile')]) }}" type="button" class="dropdown-item" style="text-align-last: center;"><i class="bi bi-person-fill"></i> Perfil</a>
                            <form class="sidehead-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item" style="text-align-last: center;"><i class="bi bi-box-arrow-left"></i> Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
