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
                <label for="phone">Telefono</label>
                {{ $client->phone }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="city">Ciudad</label>
                {{ $client->city }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="address">Direccion</label>
                {{ $client->address }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">RFC</label>
                {{ $client->rfc }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection