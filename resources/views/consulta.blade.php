@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            Consulta
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">

    @if($waitingList)
        <div class="row">
            <div class="col-md-12">
                {{ $waitingList }}
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')



@endsection