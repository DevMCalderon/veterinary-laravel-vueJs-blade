@extends('layouts.app')

@section('content')
<div class="card shadow-sm h-100">
    {{-- Header --}}
    <div class="card-header bg-light border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Botón de volver -->
                <div class="col-auto">
                    <a href="/clientes" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                        <span>Volver</span>
                    </a>
                </div>
                <!-- Título centrado -->
                <div class="col text-center">
                    <h2 class="text-primary fw-bold mb-0">Información del Cliente</h2>
                </div>
                <!-- Nombre del cliente alineado a la derecha -->
                <div class="col-auto text-end">
                    <span class="registro-nombre text-truncate">{{ $client->name }}</span>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Body --}}
    <div class="card-body">
        <div class="container">
            <div class="row">
                <!-- Columna Contacto -->
                <div class="col-md-6 mx-auto">
                    <h5 class="sub-categoria-titulo mb-3 pb-2 border-bottom border-primary">
                        <i class="bi bi-person-lines-fill me-2"></i> Contacto
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center py-2">
                            <i class="bi bi-envelope text-primary me-2"></i>
                            <span class="text-muted fw-bold">Correo:</span>
                            <span class="ms-auto">{{ $client->email }}</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center py-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <span class="text-muted fw-bold">Teléfono:</span>
                            <span class="ms-auto">{{ $client->phone }}</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center py-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <span class="text-muted fw-bold">Ciudad:</span>
                            <span class="ms-auto">{{ $client->ciudad->name }}</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center py-2">
                            <i class="bi bi-house text-primary me-2"></i>
                            <span class="text-muted fw-bold">Dirección:</span>
                            <span class="ms-auto">{{ $client->address }}</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center py-2">
                            <i class="bi bi-card-checklist text-primary me-2"></i>
                            <span class="text-muted fw-bold">RFC:</span>
                            <span class="ms-auto">{{ $client->rfc }}</span>
                        </li>
                    </ul>
                </div>

                
                <hr class="mx-auto w-94">

                {{-- pet data --}}
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="sub-categoria-titulo">Mascotas</h3>
                        
                        {{-- button add pet --}}
                        <a href="/agregar/mascota/{{ $client->id }}" class="btn btn-primary btn-sm">Agregar Mascota</a>
                    </div>
                    {{-- pet list --}}
                    <client-pet-list :client_id="{{ $client->id }}"></client-pet-list>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style scoped>
    .texto-datos {
        font-size: 16px;
        color: #6d7781;
    }

    .registro-nombre {
        font-size: 20px;
        font-weight: bold;
        color: #606972;
    }
    .sub-categoria-titulo {
        font-size: 18px;
        font-weight: bold;
        color: #505962;
    }

    .list-group-item {
        background-color: #f8f9fa;
        border-radius: 5px;
    }
</style>
@endsection
