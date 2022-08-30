@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            Agregar cliente a lista de espera
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">
        <lista-espera-client-form
            date-prop="{{ date('Y-m-d') }}"
            time-prop="{{ date('H:i') }}"
            datetime-disabled-prop="true"
        ></lista-espera-client-form>

    </div>
</div>
@endsection

@section('scripts')



@endsection