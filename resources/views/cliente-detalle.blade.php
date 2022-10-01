@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0 row">
        <span>Regresar</span>
        <h2 class="text-primary fs-2 text-center">Datos de Cliente</h2>
        <label class="client-name fw-bold text-secundary text-center">{{ $client->name }}</label>
    </div>
    <hr>
    <div class="card-body pt-0">

        <h5 class="subtitulo">Contacto</h5>
        <div class="row text-center">
            <!-- <label class="">Nombre completo:</label> -->
            
        </div>

        <div class="fw-bolder d-flex justify-content-between">
        </div>

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="email" class="text-secondary">Correo</label>
                {{ $client->email }}

            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="phone">Teléfono</label>
                {{ $client->phone }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="city">Ciudad</label>
                {{ $client->city }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="address">Dirección</label>
                {{ $client->address }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">RFC</label>
                {{ $client->rfc }}
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <div style="padding: 1rem 1.25rem;">
            <h3 class="subtitulo">Mascotas</h3>
            <a href="/agregar/mascota/{{ $client->id }}" class="btn btn-primary btn-sm">Agregar</a>
        </div>
    </div>
    <div style="padding: 1rem 1.25rem;">
        <div class="row">
            <list-mascota id-client="{{ $client->id }}"></list-mascota>
        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection

<style scoped>
    .client-name{
        font-size: 23px;
        color: #afaeb8;
    }
    .subtitulo {
        font-size: medium;

    }
</style>