@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body overflow-hidden p-lg-6">
            <div class="d-flex justify-content-end">
                <button style="font-size: small;" class="btn btn-falcon-primary me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#search-client-modal">Añadir cliente <span class="fas fa-user-plus"></span>
                </button>
            </div>
            <div class="row align-items-center">
                <div class="">
                    <label class="form-label" for="exampleFormControlInput1">Codigo de producto</label>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="Introducir codigo" aria-label="Introducir codigo" aria-describedby="basic-addon2" id="inputSearch"/>
                        <button class="input-group-button btn btn-primary" id="buttonSearch"><i class="fas fa-search"></i></button>
                    </div>
                    <small class="float-end cursor-pointer" data-bs-toggle="modal" data-bs-target="#search-product-modal">Buscar producto</small>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="search-client-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Buscar cliente</h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label" for="search">Nombre del cliente:</label>
                                <input class="form-control" id="search" type="text" />
                                <div id="display"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Understood </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="search-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Buscar producto</h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label" for="searchProducto">Nombre del producto:</label>
                                <input class="form-control" id="searchProducto" type="text" />
                                <div id="displayProduct"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Understood </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(function() {
        $("#search").keyup(function () {
            var name = $('#search').val();
            if (name == "") {
                $("#display").html("");
            }else {
                axios.get(`searchClient/${name}`).then((resp)=>{
                    $("#display").html(resp.data).show();
                })
            }
        });
        $("#searchProducto").keyup(function () {
            var name = $('#searchProducto').val();
            if (name == "") {
                $("#display").html("");
            }else {
                axios.get(`searchProducto/${name}`).then((resp)=>{
                    $("#displayProduct").html(resp.data).show();
                })
            }
        });
    });

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


    //Getting value from "ajax.php".

    function fill(Value) {
        $('#search').val(Value);
        $('#display').hide();
    }
    function fillCode(Value) {
        $('#inputSearch').val(Value);
        $('#searchProducto').val('');
        $('#search-product-modal').modal('hide');
        $('#displayProduct').hide();
    }
    
</script>
@endsection
