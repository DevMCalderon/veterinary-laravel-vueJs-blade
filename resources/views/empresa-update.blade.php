@extends('layouts.app')

@section('content')
<div class="card  mt-2">
    <div class="card-body pt-5">
        <!-- se valida si el usuario inicio sesión y se le asigna su id -->
        @if(Auth::check()) 
            <empresa-form user-id-prop="{{Auth::user()->getId()}}" empresa-id-prop="{{Auth::user()->getUserEmpresaId()}}" img-empresa-prop="{{asset('assets/img/team/avatar.png')}}"/>
        @endif 
    </div>
</div>
@endsection

<style scoped>

.bd-example {
    position: relative;
    margin: 1rem -0.75rem 0;
    border: solid #dee2e6;
    border-width: 1px 0 0;

    padding: 1rem;
    margin-right: 0;
    margin-left: 0;
    border-width: 1px;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}
    .titulo_pagina{
        font-weight: 4px;
        font-size: 13px;
    }
    .nombre_empresa{
        font-size:26px;
        font-weight: 100px;
    }
    .image_group{
        width:100%;
    }
    .form-group {
        display: flex;
        align-items: center;
    }
      #preview {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      
      #preview img {
        max-width: 100%;
        height: 15rem;
        border-radius: 0%;
      }
</style>