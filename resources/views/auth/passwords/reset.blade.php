@extends('layouts.auth')




@section('content')

<div class="row flex-between-center mb-3">
    <div class="col-auto">
        <h5>Restablecer contraseña</h5>
    </div>
</div>
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    
    <div class="row mb-3">
        <div class="col-md-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Correo electrónico" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-12">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Nueva contraseña" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmación de contraseña" required autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary w-100">
                {{ __('Restablecer contraseña') }}
            </button>
        </div>
    </div>
</form>
@endsection