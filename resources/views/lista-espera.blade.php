@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            Lista de espera del dia
            <a href="{{  route('lista-espera-crear') }}" class="btn btn-primary btn-sm">Nuevo</a>
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive scrollbar">
            <list-espera date="{{ date('Y-m-d') }}"></list-espera>
        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection
