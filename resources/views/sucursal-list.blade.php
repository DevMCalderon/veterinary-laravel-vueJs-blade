@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            Sucursales
            <a href="{{  route('cliente-crear') }}" class="btn btn-primary btn-sm">Nuevo</a>
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive scrollbar">
            <sucursal-list/>
        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection