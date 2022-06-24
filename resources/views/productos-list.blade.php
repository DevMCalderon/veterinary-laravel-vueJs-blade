@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        Productos
        <hr>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive scrollbar">
          

            <products-list></products-list>
        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection