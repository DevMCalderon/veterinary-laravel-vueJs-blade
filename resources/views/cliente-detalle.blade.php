@extends('layouts.app')

@section('content')
<div class="card ">
    <div class="card-header pb-0 row">
        <a href="/clientes">
            <button type="button" class="btn btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                <span></span>
            </button>
        </a>
        <h2 class="text-primary fs-1 text-center">Información de cliente</h2>
        <label class="registro-nombre  text-secundary text-center">{{ $client->name }}</label>
    </div>

    <hr>

    <div class="card-body px-8 py-0 ">
        <div class="row ">

            <h5 class="sub-categoria-titulo text-start">Contacto</h5>

            <div class=" d-flex justify-content-between">
            </div>

            <div class="col-md-10 col-lg-6 mb-3">
                <label for="email" class="text-secondary">Correo</label>
                <label class=" texto-datos">
                    {{ $client->email }}
                </label>
            </div>

            <div class="col-md-10 col-lg-6 mb-3">
                <label for="phone">Teléfono</label>
                <label class=" texto-datos">
                    {{ $client->phone }}
                </label>
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="city">Ciudad</label>
                <label class=" texto-datos">
                    {{ $client->ciudad->name }}
                </label>
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="address">Dirección</label>
                <label class=" texto-datos">
                    {{ $client->address }}
                </label>
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">RFC</label>
                <label class=" texto-datos">
                    {{ $client->rfc }}
                </label>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-body px-8 py-0">
        <div class="row">
            <div class="d-flex justify-content-between vw-100">
                <div class="vw-100">
                    <div class="d-flex justify-content-between">
                        <h3 class="sub-categoria-titulo">Mascotas</h3>
                        <a href="/agregar/mascota/{{ $client->id }}" class="btn btn-primary btn-sm">Agregar</a>
                    </div>
                </div>
            </div>


            <div class=" row d-flex vw-100 ">
                <div class="">
                    <client-pet-list :client_id="{{ $client->id }}"></client-pet-list>
                </div>
            </div>


            <div style="padding: 1rem 1.25rem;">
                <div class="row">
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('scripts')



@endsection

<style scoped>
    .texto-datos{
        font-size: 16px;
        color: #6a6a6a;
    }

    .registro-nombre {
        font-size: 23px;
        color: #a09fab;
    }

    .sub-categoria-titulo {
        font-size: medium;

    }
</style>