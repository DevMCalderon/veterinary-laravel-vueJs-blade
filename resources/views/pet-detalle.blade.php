@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            {{ $pet->name }}
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="email">Fecha de nacimiento</label>
                {{ $pet->fecha_nacimiento }}
                
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="phone">Color</label>
                {{ $pet->color }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="city">Comentario</label>
                {{ $pet->comentarios }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="address">Alergias</label>
                {{ $pet->alergias }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">Tipo mascota</label>
                {{ $pet->tipoMascota->name }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">Raza</label>
                {{ $pet->tipoRaza->name }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection