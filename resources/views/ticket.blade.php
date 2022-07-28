@extends('layouts.app')
@section('style')
<style>
  * {
  margin: 0;
  box-sizing: border-box;
  font-family: "VT323", monospace;
  color: #1f1f1f;
}

.container {
  background: #f1f1f1;
  padding: 20px 10px;
}

.bold {
  font-weight: bold;
}

.center {
  text-align: center;
}

.receipt {
  width: 300px;
  min-height: 100vh;
  height: 100%;
  background: #fff;
  margin: 0 auto;
  box-shadow: 5px 5px 19px #ccc;
  padding: 10px;
}

.logo {
  text-align: center;
  padding: 20px;
}

.barcode {
  font-family: "Libre Barcode 128", cursive;
  font-size: 42px;
  text-align: center;
}

.address {
  text-align: center;
  margin-bottom: 10px;
}

.transactionDetails {
  display: flex;
  justify-content: space-between;
  margin: 0 10px 10px;
}
.transactionDetails .detail {
  text-transform: uppercase;
}

.centerItem {
  display: flex;
  justify-content: center;
  margin-bottom: 8px;
}

.survey {
  text-align: center;
  margin-bottom: 12px;
}
.survey .surveyID {
  font-size: 20px;
}

.paymentDetails {
  display: flex;
  justify-content: space-between;
  margin: 0 auto;
  width: 150px;
}

.creditDetails {
  margin: 10px auto;
  width: 230px;
  font-size: 14px;
  text-transform: uppercase;
}

.receiptBarcode {
  margin: 10px 0;
  text-align: center;
}

.returnPolicy {
  margin: 10px 20px;
  width: 220px;
  display: flex;
  justify-content: space-between;
}

.coupons {
  margin-top: 20px;
}

.tripSummary {
  margin: auto;
  width: 255px;
}
.tripSummary .item {
  display: flex;
  justify-content: space-between;
  margin: auto;
  width: 220px;
}

.feedback {
  margin: 20px auto;
}
.feedback h3.clickBait {
  font-size: 30px;
  font-weight: bold;
  text-align: center;
  margin: 10px 0;
}
.feedback h4.web {
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  margin: 10px 0;
}
.feedback .break {
  text-align: center;
  font-size: 18px;
  font-weight: bold;
  margin: 10px 0;
}

.couponContainer {
  border-top: 1px dashed #1f1f1f;
  margin-bottom: 20px;
}
.couponContainer .discount {
  font-size: 35px;
  text-align: center;
  margin-bottom: 10px;
}
.couponContainer .discountDetails {
  font-size: 20px;
  text-align: center;
  margin-bottom: 15px;
}
.couponContainer .barcode {
  margin: 10px 0 0;
}
.couponContainer .legal {
  font-size: 12px;
  margin-bottom: 12px;
}
.couponContainer .barcodeID {
  margin-bottom: 8px;
}
.couponContainer .expiration {
  display: flex;
  justify-content: space-between;
  margin: 10px;
}
.couponContainer .couponBottom {
  font-size: 13px;
  text-align: center;
}

</style>
@endsection

@section('content')
<div id="showScroll" class="container">
	<div class="receipt">
		<h1 class="logo"><img src="https://www.labcell.com.mx/images/icono.png" style="max-width:100px;max-height: 150px;"></h1>
		<div class="address">MATRIZ<br>MERR730630DU6<br>Whatsapp 6563336307<br>
 Amado Nervo #249, Local #3, Centro 		</div>
		<div class="transactionDetails" style="display:none;">
			<div class="detail">Reg#17</div>
			<div class="detail">TRN#1313</div>
			<div class="detail">CSHR#00097655</div>
			<div class="detail">str#9852</div>
		</div>
		<div class="transactionDetails">
			Le atendio: chiporrito
		</div>
		<div class="centerItem bold">
			<div class="item">Numero de Tarjeta: </div>
		</div>
		<div class="transactionDetails">
			<div class="detail"></div>
			<div class="detail"> galletas
</div>
			<div class="detail">60</div>
		</div>
		<div class="survey bold">
			<p>Folio:</p>
			<p class="surveyID">1234</p>
		</div>
		<div class="paymentDetails bold">
			<div class="detail">Total</div>
			<div class="detail">50</div>
		</div>
		<div class="paymentDetails">
			<div class="detail">Anticipo</div>
			<div class="detail">2000</div>
		</div>
		<div class="paymentDetails">
			<div class="detail">EFECTIVO</div>
			<div class="detail">EF</div>
		</div>
		<div class="creditDetails">
			<p>Detalles del telefono &nbsp;&nbsp;&nbsp;&nbsp; ****************</p>
			<p>marca</p>
			<p>modelo </p>
			<p>num_serie  </p>
			<p>tipo_reparacion </p>
			<p>descripcion_problema </p>
			<p>componentes_faltantes </p>
		</div>

		<div class="paymentDetails">
			<div class="detail">Saldo Pendiente:</div>
			<div class="detail">$spendiente.00</div>
		</div>
		<div class="receiptBarcode">
			<div class="barcode">
				num_orden
			</div>
			num_orden
		</div>
		<div class="returnPolicy">
			<div class="detail">fecha;?></div>
			<div class="detail">hora;?></div>
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

Es indispensable presentar este comprobante para recoger equipo. <br>Despues de 30 dias no nos hacemos responsables por equipos no reclamados. <br>La garantia aplica en reparaciones con una vigencia de 30 dias naturales y se aplica presentando este comprobante o el ticket fisico. <br>Quejas o sugerencias en https://labcell.com.mx/quejas		</div>
		<div class="feedback">
			<div class="break">
				***********************************
			</div>
			<p class="center">
Este es unicamente un ticket electronico que se podra utilizar como remplazo en caso de perdida total o parcial del ticket fisico, este ticket no presenta la misma informacion del ticket fisico por lo que en ciertas ocasiones se requerira el ticket fisico, los beneficios del programa LABCELL Te premia son unicamente para los socios activos.</p>
			<h4 class="web">www.labcell.com.mx</h4>
			<p class="center">
We'll try to speak English
			</p>
			<div class="break">
				***********************************
			</div>
		</div>
		<div id="coupons" class="coupons">
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
  
</script>
@endsection