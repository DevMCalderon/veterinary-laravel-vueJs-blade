@extends('layouts.auth')

@section('content')

<div class="row flex-between-center mb-2">
    <div class="col-auto">
        <h5>Registro</h5>
    </div>
    <div class="col-auto fs--1 text-600"><span class="mb-0 undefined">Tienes una cuenta?</span> <span><a href="{{ route('login') }}">Iniciar sesión</a></span></div>
</div>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <input class="form-control @error('name') is-invalid @enderror" type="text" autocomplete="on" placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <input class="form-control @error('email') is-invalid @enderror" type="email" autocomplete="on" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="row gx-2">
        <div class="mb-3 col-sm-6">
            <input class="form-control @error('password') is-invalid @enderror" type="password" autocomplete="on" placeholder="Contraseña" name="password" />
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3 col-sm-6">
            <input class="form-control" type="password" placeholder="Confirmar contraseña" name="password_confirmation" required />
        </div>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="basic-register-checkbox" />
        <label class="form-label" for="basic-register-checkbox">Acepto los <a href="#!">terminos </a>y la <a href="#!"> politica de privacidad</a></label>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Registrar</button>
    </div>
</form>
<div class="position-relative mt-4">
    <hr class="bg-300" />
    <div class="divider-content-center">o registrate con</div>
</div>
<div class="row g-2 mt-2">
    <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> Google</a></div>
    <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> Facebook</a></div>
</div>


@endsection