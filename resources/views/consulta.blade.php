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

    @if(env('APP_ENV')=='local')
        <div class="row">
            <div class="col-md-12">
                <code class="text-secondary">{{ $waitingList }}</code>
            </div>
        </div>
        <hr>
    @endif

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Cliente</label>
                <input type="text" class="form-control form-control-sm" value="{{ $waitingList->client ? $waitingList->client->name : '' }}" disabled>
            </div>
        </div>
    </div>
    @endif
    </div>
</div>
@endsection

@section('scripts')



@endsection