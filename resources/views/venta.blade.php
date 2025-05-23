@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body overflow-hidden p-lg-6">
            <div class="d-flex justify-content-end">
                <button style="font-size: small;" class="btn btn-falcon-primary me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#search-client-modal">Añadir cliente <span class="fas fa-user-plus"></span>
                </button>
            </div>
            <div class="row align-items-center">
                <div class="">
                    <label class="form-label" for="exampleFormControlInput1">Código de producto</label>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="Introducir código" aria-label="Introducir código" aria-describedby="basic-addon2" id="inputSearch" autocomplete="off"/>
                        <button class="input-group-button btn btn-primary" id="buttonSearch"><i class="fas fa-search"></i></button>
                    </div>
                    <small class="float-end cursor-pointer" data-bs-toggle="modal" data-bs-target="#search-product-modal">Buscar producto</small>
                </div>
                
            </div>
            <div class="mt-5">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-md-auto">
                            <h5 class="mb-3 mb-md-0">Carrito de compras (<span class="cantProd">0</span> productos)</h5>
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-pagar" onclick="comprobarTotal()">Pagar</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row gx-card mx-0 text-900 fs--1 fw-semi-bold" id="divCliente" style="display: none">
                        Cliente: <span id="nomCliente"> </span>
                    </div>
                    <div class="row gx-card mx-0 bg-200 text-900 fs--1 fw-semi-bold">
                        <div class="col-9 col-md-8 py-2">Nombre</div>
                        <div class="col-3 col-md-4">
                            <div class="row">
                                <div class="col-md-8 py-2 d-none d-md-block text-center">Cantidad</div>
                                <div class="col-12 col-md-4 text-end py-2">Precio</div>
                            </div>
                        </div>
                    </div>
                    <div id="contCarrito">
                        
                    </div>

                    <div class="row fw-bold gx-card mx-0">
                        <div class="col-9 col-md-8 py-2 text-end text-900">Total</div>
                        <div class="col px-0">
                            <div class="row gx-card mx-0">
                                <div class="col-md-8 py-2 d-none d-md-block text-center"><span class="cantProd">0</span> (productos)</div>
                                <div class="col-12 col-md-4 text-end py-2">$<span id="totalVent">0</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light d-flex justify-content-end">
                    <form class="me-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="text" placeholder="Código promocional" />
                            <button class="btn btn-outline-secondary border-300 btn-sm" type="submit">Aplicar</button>
                        </div>
                    </form>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-pagar" onclick="comprobarTotal()">Pagar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="search-client-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button id="btnCloseClient" class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
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
                                <input class="form-control" id="search" type="text" autocomplete="off"/>
                                <div id="display"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    {{-- <button class="btn btn-primary" type="button">Understood </button> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="search-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button id="btnCloseProduct" class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
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
                                <input class="form-control" id="searchProducto" type="text" autocomplete="off"/>
                                <div id="displayProduct"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    {{-- <button class="btn btn-primary" type="button">Understood </button> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-pagar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button id="btnClosePagar" class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Cantidad a pagar</h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form id="formPago">
                            <div class="mb-3">
                                <h2 class="col-form-label" for="">Total: $<span id="totalPagar">0</span></h2>
                                <label class="col-form-label" for="dineroRecibido">Dinero recibido</label>
                                <input class="form-control" id="dineroRecibido" name="dineroRecibido" type="number"/>
                                <label class="col-form-label" for="tipoPago">Metodo de pago</label>
                                <select name="tipoPago" class="form-control" id="tipoPago">
                                    <option value="efectivo">Efectivo</option>
                                    <option value="tarjeta">Tarjeta</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button" onclick="pagar()">Pagar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ticket -->
<div class="modal fade" id="ticketModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Vista Previa Ticket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ticketCustomContanier">
            @section('styles')
            @endsection
            {{-- <div id="showScroll" class="container">
                <div class="receipt">
                    <h1 class="logo"><img src="../assets/img/logos/logo.png"
                            style="max-width:100px;max-height: 150px;"></h1>
                    <div class="address">MATRIZ<br>MERR730630DU6<br>Whatsapp 6121772500<br>
                        Amado Nervo #249, Local #3, Centro </div>
                    <div class="transactionDetails" style="display:none;">
                        <div class="detail">Reg#17</div>
                        <div class="detail">TRN#1313</div>
                        <div class="detail">CSHR#00097655</div>
                        <div class="detail">str#9852</div>
                    </div>
                    <div class="transactionDetails">
                        Le atendio: {{Auth()->user()->name}}
                    </div>
                    <div class="centerItem bold">
                        <div class="item">Numero de Tarjeta: </div>
                    </div>
                    <div class="transactionDetails">
                        <div class="detail"></div>
                        <div class="detail">6
                        </div>
                        <div class="detail">33.3</div>
                    </div>
                    <div class="survey bold">
                        <p>Folio:</p>
                        <p class="surveyID">1234</p>
                    </div>
                    <div class="paymentDetails bold">
                        <div class="detail">Total</div>
                        <div class="detail"></div>
                    </div>
                    <div class="paymentDetails">
                        <div class="detail">Pago con:</div>
                        <div class="detail"></div>
                    </div>
                    <div class="paymentDetails">
                        <div class="detail">EFECTIVO</div>
                        <div class="detail">EF</div>
                    </div>
                    <div class="creditDetails">
                        <p>Articulos &nbsp;&nbsp;&nbsp;&nbsp; ********************************</p>
                        <p>qq</p>
                        <p>b </p>
                        <p>c </p>
                        <p>d </p>
                        <p>e </p>
                        <p>f </p>
                    </div>

                    <div class="paymentDetails">
                        <div class="detail">Saldo Pendiente:</div>
                        <div class="detail">$.00</div>
                    </div>
                    <div class="receiptBarcode">
                        <div class="barcode">
                            123
                        </div>
                        123
                    </div>
                    <div class="returnPolicy">
                        <div class="detail"></div>
                        <div class="detail"></div>
                    </div>
                    <div class="tripSummary">
                        <div class="bold">Beneficios del progrma LABCELL te premia:</div>
                        <div class="item">
                            <div>Usted ahorro:</div>
                            <div>0.00</div>
                        </div>
                        <div class="item">
                            <div>Descuento del:</div>
                            <div>0%</div>
                        </div>
                    </div>

                    <div class="returnPolicy bold" style="font-size:50%;">

                        Es indispensable presentar este comprobante para recoger equipo. <br>Despues de 30 dias no nos
                        hacemos responsables por equipos no reclamados. <br>La garantia aplica en reparaciones con una
                        vigencia de 30 dias naturales y se aplica presentando este comprobante o el ticket fisico.
                        <br>Quejas o sugerencias en https://labcell.com.mx/quejas </div>
                    <div class="feedback">
                        <div class="break">
                            *****************************
                        </div>
                        <p class="text-justify ps-2 pe-2">
                            Este es unicamente un ticket electronico que se podra utilizar como remplazo en caso de
                            perdida total o parcial del ticket fisico, este ticket no presenta la misma informacion del
                            ticket fisico por lo que en ciertas ocasiones se requerira el ticket fisico, los beneficios
                            del programa VETSOFT Te premia son unicamente para los socios activos.</p>
                        <h4 class="web">www.VetSoft.com.mx</h4>
                        <p class="center">
                            We'll try to speak English
                        </p>
                        <div class="break">
                            ******************************
                        </div>
                    </div>
                    <div id="coupons" class="coupons">
                    </div>
                </div>
            </div> --}}
            <Ticket-buy user="{{Auth()->user()->name}}" id="idCompra"></Ticket-buy>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="printTicket()">Imprimir Ticket</button>
          <button type="button" class="btn btn-primary">Enviar a Correo Electronico </button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script>
    function printTicket() {
  window.print()
}
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
    var myModal = new bootstrap.Modal(document.getElementById("ticketModal"), {});
    var buttonSearch = document.getElementById('buttonSearch');
    var carrito = {};
    var cliente = 0;
    buttonSearch.addEventListener("click", function(event) {
        axios.post('buscarProducto',{'codigo':$('#inputSearch').val()}).then((resp)=>{
            if (resp.data.status) {
                $('#inputSearch').val('');
                
                if (carrito[resp.data.producto.id]) {
                    carrito[resp.data.producto.id]['cant']=carrito[resp.data.producto.id]['cant']+resp.data.cant
                    $('#cant'+resp.data.producto.id).val(carrito[resp.data.producto.id]['cant'])
                    $('#price'+resp.data.producto.id).text(carrito[resp.data.producto.id]['cant']*carrito[resp.data.producto.id]['price'])
                }else{
                    carrito[resp.data.producto.id]={'cant':resp.data.cant,'price':resp.data.producto.price}
                    $('#contCarrito').append(`
                        <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                            <div class="col-8 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-1">
                                        <h5 class="fs-0"><a class="text-900">${resp.data.producto.name}</a></h5>
                                        <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Eliminar</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 py-3">
                                <div class="row align-items-center">
                                    <div
                                        class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                                        <div>
                                            <div class="input-group input-group-sm flex-nowrap"
                                                data-quantity="data-quantity">
                                                <button class="btn btn-sm btn-outline-secondary border-300 px-2"
                                                    data-type="minus" onclick="min(${resp.data.producto.id})">-</button>
                                                <input id="cant${resp.data.producto.id}" class="form-control text-center px-2 input-spin-none" type="number"
                                                    min="1" value="${resp.data.cant}" aria-label="Amount (to the nearest dollar)"
                                                    style="width: 50px" />
                                                <button class="btn btn-sm btn-outline-secondary border-300 px-2"
                                                    data-type="plus" onclick="sum(${resp.data.producto.id})">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">$<span id="price${resp.data.producto.id}">${resp.data.producto.price*resp.data.cant}</span></div>
                                </div>
                            </div>
                        </div>
                    `);
                }
                $('.cantProd').text(Object.keys(carrito).length)
                $('#totalVent').text(checkTotal())

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
    function fill(id,name) {
        cliente = id;
        $('#nomCliente').text(name);
        $('#display').hide();
        $('#btnCloseClient').click();
        $("#divCliente").css('display','block')
    }
    function fillCode(Value) {
        $('#inputSearch').val(Value);
        $('#searchProducto').val('');
        $('#displayProduct').hide();
        $('#btnCloseProduct').click();
    }
    function min(params) {
        let cant = parseInt($(`#cant${params}`).val())-1;
        if (cant>0) {
            carrito[params]['cant'] = cant;
            $(`#cant${params}`).val(cant) 
            $('#price'+params).text(carrito[params]['cant']*carrito[params]['price'])
        }
        $('#totalVent').text(checkTotal())
    }
    function sum(params) {
        let cant = parseInt($(`#cant${params}`).val())+1;
        if (cant>0) {
            carrito[params]['cant'] = cant;
            $(`#cant${params}`).val(cant) 
            $('#price'+params).text(carrito[params]['cant']*carrito[params]['price'])
        }
        $('#totalVent').text(checkTotal())
    }
    let totalPrueba = checkTotal();
    
    function checkTotal(){
        let total = 0;
        $.each(carrito, ( key,element ) => {
            total+= element['cant']*element['price'];
        });
        return total;
    }
    function comprobarTotal(params) {
        axios.post('comprobarTotal',{'carrito':carrito}).then((resp)=>{
            $('#totalPagar').text(resp.data);
        })
    }
    function pagar(params) {
        if (Object.keys(carrito).length>0) {
            axios.post('pagar',{'carrito':carrito,'datos':{'dineroRecibido':$('#dineroRecibido').val(),'tipoPago':$('#tipoPago').val(),'cliente':cliente}}).then((resp)=>{
                let icono;
                let titulo;
                let compratrue = false;
                console.log(resp.data);
                switch (resp.data.estado) {
                    case true:
                        compratrue = true;
                        icono = 'success'
                        titulo = 'Venta exitosa'
                        carrito = {};
                        $('#dineroRecibido').val('')
                        $('#totalPagar').text(0)
                        $('.cantProd').text(0)
                        $('#totalVent').text(0)
                        $("#contCarrito").empty()
                        $("#btnClosePagar").click()
                        break;
                    case 'cambio':
                        compratrue = true;
                        icono = 'info'
                        titulo = 'Venta exitosa con cambio pendiente'
                        carrito = {};
                        $('#dineroRecibido').val('')
                        $('#totalPagar').text(0)
                        $('.cantProd').text(0)
                        $('#totalVent').text(0)
                        $("#contCarrito").empty()
                        $("#btnClosePagar").click()
                        break;
                    case false:
                    case 'faltante':
                        icono = 'error'
                        titulo = 'Estas ingresando una cantidad menor a tu venta'
                        break;
                    case 'sin':
                        icono = 'error'
                        titulo = 'Sin productos'
                        break;
                }
                Swal.fire({
                    title: titulo,
                    text: resp.data.msg,
                    icon: icono,
                    confirmButtonText: 'Enterado'
                }).then((result) => {
                /* Read more about handling dismissals below */
               
                    if (result.isConfirmed && compratrue) {
                        myModal.show()
                        // Swal.fire({
                        // title: 'Seleccione una opción',
                        // showCancelButton: true,
                        // confirmButtonText: 'Imprimir Ticket',
                        // cancelButtonText: 'Enviar Ticket',
                        // }).then((result) => {
                        // /* Read more about isConfirmed, isDenied below */
                        // if (result.isConfirmed) {
                           
                        //     // location.href = "ticket";
                        // } else if (result.dismiss === Swal.DismissReason.cancel) {
                        //     Swal.fire({
                        //     title: 'Ingrese correo electronico.',
                        //     input: 'text',
                        //     inputAttributes: {
                        //         autocapitalize: 'off'
                        //     },
                        //     showCancelButton: true,
                        //     confirmButtonText: 'Enviar',
                        //     showLoaderOnConfirm: true
                        // })
                        // }
                        // })
                    }
                })  
            })
        }else{
            Swal.fire({
                title: 'Productos no agregados',
                icon: 'error',
            })
        }
    }
    
</script>
@endsection
