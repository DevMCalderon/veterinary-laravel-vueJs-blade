@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            Edicion del cliente
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">
        <client-form client-id="{{ $client->id }}"></client-form>
    </div>
</div>
@endsection

@section('scripts')



@endsection