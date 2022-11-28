@extends('layouts.app')

@section('content')
<sucursal-detalle sucursal-id-prop="{{$sucursal->id}}"/>
@endsection

@section('scripts')
@endsection

<style scoped>
    .texto-datos{
        font-size: 16px;
        color: #6a6a6a;
    }

    .registro-nombre {
        font-size: 23px;
        color: #a09fab;
    }

    .sub-categoria-titulo {
        font-size: medium;

    }
</style>