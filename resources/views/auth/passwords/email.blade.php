@extends('layouts.auth')

@section('content')
    <div class="row flex-between-center mb-2">
        <div class="col-auto">
            <h5>Restablecer contraseña</h5>
        </div>
        <div class="col-auto fs--1 text-600"><span class="mb-0 undefined">O </span> <span><a href="{{ route('login') }}">Iniciar sesión</a></span></div>
    </div>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-3" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class=" mb-2">
        <button type="submit" class="btn btn-primary d-block w-100 ">
            {{ __('Restablecer contraseña') }}
        </button>
    </div>


    <div class="position-relative mt-4">
    <hr class="bg-300" />
    <div class="divider-content-center">o iniciar con</div>
</div>
<div class="row g-2 mt-2">
    <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> Google</a></div>
    <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> Facebook</a></div>
</div>
    
</form>

@endsection