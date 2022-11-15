@extends('layouts.onboarding-layout')

@section('title-page','Definir empresa')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            Definir empresa
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">
        <!-- se valida si el usuario inicio sesión y se le asigna su id -->
        @if(Auth::check()) 
            <empresa-form user-id-prop="{{Auth::user()->getId()}}" empresa-id-prop="{{Auth::user()->getUserEmpresaId()}}"/>
        @endif 
    </div>
</div>
@endsection

