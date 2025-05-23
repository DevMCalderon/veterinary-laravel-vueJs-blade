/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('products-list', require('./components/ProductosList.vue').default);
Vue.component('client-list', require('./components/ClientList.vue').default);
Vue.component('client-pet-list', require('./components/ClientPetList.vue').default);
Vue.component('producto-form', require('./components/ProductoForm.vue').default);
Vue.component('client-form', require('./components/ClientForm.vue').default);
Vue.component('list-mascota',require('./components/PetList.vue').default);
Vue.component('list-espera',require('./components/EsperaList.vue').default);
Vue.component('pet-form',require('./components/PetForm.vue').default);
Vue.component('ticket-buy',require('./components/TicketBuy.vue').default);

Vue.component('search-client',require('./components/SearchClient.vue').default);
Vue.component('lista-espera-client-form',require('./components/ListaEsperaClientForm.vue').default);
Vue.component('consulta-form',require('./components/ConsultaForm.vue').default);

// Empresa
Vue.component('empresa-form', require('./components/EmpresaForm.vue').default);
Vue.component('empresa-detalle', require('./components/EmpresaDetalle.vue').default);
Vue.component('empresa-form-address', require('./components/EmpresaFormAddress.vue').default);

//Sucursal
Vue.component('sucursal-list', require('./components/SucursalList.vue').default);
Vue.component('sucursal-detalle', require('./components/SucursalDetalle.vue').default);
Vue.component('sucursal-form', require('./components/SucursalForm.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

axios = require('axios').default;
$ = require( "jquery" );
Swal = require( "sweetalert2" );
