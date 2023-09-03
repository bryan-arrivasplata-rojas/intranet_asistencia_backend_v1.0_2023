<form class="form-floating formulario" method="POST" action="{{ route('logger') }}">
    @csrf
    <img class="image_logo" title="logo" src="{{env('APP_URL_API')}}images/logo.png">
    <h1>Iniciar Sesión</h1>
    <div class="form-floating mb-3">
        <input type="text" id="usuario" class="form-control" name="usuario" required autofocus placeholder="usuario">
        <label for="usuario">Usuario</label>
    </div>
    <div class="form-floating">
        <input type="password" id="password" class="form-control" name="password" required autocomplete="off" placeholder="Password">
        <label for="password">Contraseña</label>
    </div>
    @if(session('response'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('response') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-grid gap-2 form-group mt-3">
        <button class="btn btn-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</button>
    </div>
</form>