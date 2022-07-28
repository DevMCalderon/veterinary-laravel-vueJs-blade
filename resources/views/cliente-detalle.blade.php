@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            {{ $client->name }}
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="email">Correo</label>
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
            Mascotas
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