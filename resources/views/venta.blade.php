@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center">
            <div class="">
                <label class="form-label" for="exampleFormControlInput1">Codigo de producto</label>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="Introducir codigo" aria-label="Introducir codigo" aria-describedby="basic-addon2" />
                    <button class="input-group-button btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
            </div>
        </div>
        </div>
    </div>
@endsection
