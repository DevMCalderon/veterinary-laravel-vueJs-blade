@extends('layouts.app')

@section('content')
<div class="card">
    {{-- Header --}}
    <div class="card-header bg-primary border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Título centrado -->
                <div class="col text-center">
                    <h2 class="text-light fw-bold mb-0">Listado de Clientes</h2>
                </div>
                <!-- Botn crear-->
                <div class="col-auto text-end">
                    <a href="{{  route('cliente-crear') }}" class="btn btn-outline-light btn-sm">+ Nuevo</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body pt-3">
        <div class="table-responsive scrollbar">
            <client-list></client-list>
        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection

@section('styles')
<style scoped>
</style>
@endsection
