@extends('layouts.auth')

@section('title-page','Iniciar sesión')

@section('content')
<div class="row flex-between-center mb-2">
    <div class="col-auto">
        <h5>Iniciar Sesión</h5>
    </div>
    <div class="col-auto fs--1 text-600"><span class="mb-0 undefined">o</span> <span><a href="{{ route('register') }}">Crear una cuenta</a></span></div>
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Contraseña" required />
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="row flex-between-center">
        <div class="col-auto">
            <div class="form-check mb-0">
                <input class="form-check-input" type="checkbox" id="basic-checkbox" checked="checked" name="remember" {{ old('remember') ? 'checked' : '' }} />
                <label class="form-check-label mb-0" for="basic-checkbox">Recordarme</label>
            </div>
        </div>
        <div class="col-auto"><a class="fs--1" href="{{ route('password.update') }}">Olvide mi contraseña</a></div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Entrar</button>
    </div>
</form>
<div class="position-relative mt-4">
    <hr class="bg-300" />
    <div class="divider-content-center">o iniciar con</div>
</div>
<div class="row g-2 mt-2">
    <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="{{ url('/login/google') }}"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> Google</a></div>
    <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="{{ route('facebook.auth', 'facebook') }}"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> Facebook</a></div>
</div>
@endsection