@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            Editar sucursal
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">
        <sucursal-form 
            sucursal-id-prop="{{ $sucursal->id }}"
            empresa-id-prop="{{  Auth::user()->empresa_id }}"
        />
    </div>
</div>
@endsection

@section('scripts')
@endsection