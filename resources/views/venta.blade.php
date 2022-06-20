@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center">
            <div class="">
                <label class="form-label" for="exampleFormControlInput1">Codigo de producto</label>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="Introducir codigo" aria-label="Introducir codigo" aria-describedby="basic-addon2" id="inputSearch"/>
                    <button class="input-group-button btn btn-primary" id="buttonSearch"><i class="fas fa-search"></i></button>
                  </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var inputSearch = document.getElementById('inputSearch');
        inputSearch.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                document.getElementById("buttonSearch").click();
            }
        });
        var buttonSearch = document.getElementById('buttonSearch');
        buttonSearch.addEventListener("click", function(event) {
            axios.post('buscarProducto',{'codigo':$('#inputSearch').val()}).then((resp)=>{
                if (resp.data.status) {
                    
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: resp.data.msg,
                        icon: 'error',
                        confirmButtonText: 'Enterado'
                    })
                    
                }
            })
        });
    </script>
@endsection
