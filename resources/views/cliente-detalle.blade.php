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
        <h2 class="text-primary fs-1 text-center">Datos de cliente</h2>
        <label class="client-name fw-bold text-secundary text-center">{{ $client->name }}</label>
    </div>

    <hr>

    <div class="card-body px-10 py-0">
        <div class="row">

            <h5 class="sub-categoria-titulo text-start">Contacto</h5>

            <div class="fw-bolder d-flex justify-content-between">
            </div>

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

    <div class="card-body px-10 py-0">
        <div class="row">
            <div class="d-flex justify-content-between vw-100">
                <div class="vw-100">
                    <div class="d-flex justify-content-between">
                        <h3 class="sub-categoria-titulo">Mascotas</h3>
                        <a href="{{  route('cliente-crear') }}" class="btn btn-primary btn-sm">Agregar</a>
                    </div>
                </div>
            </div>


            <div class=" row d-flex vw-100 ">
                <div class="aul">
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
    .aul {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .client-name {
        font-size: 23px;
        color: #a09fab;
    }

    .sub-categoria-titulo {
        font-size: medium;

    }
</style>