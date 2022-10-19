@extends('layouts.app')

@section('content')

<consulta-form
    consulta-id="{{$waitingList->id}}"
    client-id="{{$waitingList->client->id}}"
></consulta-form>

@endsection

@section('scripts')



@endsection
