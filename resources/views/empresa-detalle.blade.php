@extends('layouts.app')

@section('content')
    <!-- {{Auth::user()->getId()}} obtener id de usuario-->
    <empresa-detalle empresa-id-prop="{{Auth::user()->getUserEmpresaId()}}"/>
@endsection



<style scoped>
    .texto-datos{
        font-size: 16px;
        color: #6a6a6a;
    }.client-name {
        font-size: 23px;
        color: #a09fab;
    }
    .sub-categoria-titulo {
        font-size: medium;
    }

</style>