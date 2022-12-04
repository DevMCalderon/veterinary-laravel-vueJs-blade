@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <!-- se valida si el usuario inicio sesión y se le asigna su id -->
        @if(Auth::check()) 
            <empresa-form user-id-prop="{{Auth::user()->getId()}}" empresa-id-prop="{{Auth::user()->getUserEmpresaId()}}" img-empresa-prop="{{asset('assets/img/team/avatar.png')}}"/>
        @endif 
    </div>
</div>
@endsection

<style scoped>

    
    .titulo_pagina{
        font-weight: 4px;
        font-size: 13px;
    }
    .nombre_empresa{
        color:black;
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
        max-width: 18rem;
        height: 15rem;
        border-radius: 100%;
      }
</style>