@extends('layouts.app')

@section('content')
<div class="card ">

    <div class="card-header pb-0 row">
        <a href="/">
            <button type="button" class="btn btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                <span></span>
            </button>
        </a>
        
        <h2 class="text-primary fs-1 text-center">Información de empresa</h2>
 
    </div>

    <hr>

    @if(Auth::check()) 
            <empresa-detalle user-id-prop="{{Auth::user()->getId()}}" empresa-id-prop="{{Auth::user()->getEmpresaId()}}"/>
    @endif 

    


</div>
@endsection



<style scoped>
    .texto-datos{
        font-size: 16px;
        color: #6a6a6a;
    }

    .client-name {
        font-size: 23px;
        color: #a09fab;
    }

    .sub-categoria-titulo {
        font-size: medium;

    }
</style>