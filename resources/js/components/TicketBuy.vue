<template>
  <div id="showScroll" class="container">
                <div class="receipt">
                    <h1 class="logo">
                      <img src="/assets/img/logos/logo.png"
                            style="max-width:100px;max-height: 150px;"> 
                            </h1>
                    <div class="address">MATRIZ<br>MERR730630DU6<br>Whatsapp 6121772500<br>
                        Amado Nervo #249, Local #3, Centro </div>
                    <div class="transactionDetails" style="display:none;">
                        <div class="detail">Reg#17</div>
                        <div class="detail">TRN#1313</div>
                        <div class="detail">CSHR#00097655</div>
                        <div class="detail">str#9852</div>
                    </div>
                    <div class="transactionDetails">
                        Le atendio: {{user}}
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
                        <div class="detail">{{totalFinal}}</div>
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
                            <div @click="getTicket">00</div>
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
            </div>
</template>

<script>
export default {
  props:["user","total"],
  data(){
    return{
        totalFinal: "1"
    }
  },
  watch:{
user(newValue, oldValue){

    console.log("cambio user ", newValue);
},
totalFinal(newValue, oldValue){
console.log("cambio total", newValue);
}
  },
  mounted(){
console.log("ticketMontado");
this.getTicket()
  },
  methods:{
    getTicket(){
        console.log("ejecucion de funcion get ticket");
        console.log(this.totalFinal);
    }
  }
// computed:{
//     user(){
// return this.user
//     }
// }
 
}

</script>