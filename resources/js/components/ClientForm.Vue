<template>
    <form action="" ref="clientForm" @submit="save">
        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" v-model="name" required>
                <small class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="email">Correo</label>
                <input type="text" name="email" id="email" class="form-control" v-model="email" required>
                <small class="text-danger" v-if="errors && errors.email">{{ errors.email[0] }}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="phone">Teléfono</label>
                <input type="tel" name="phone" id="phone" class="form-control" v-model="phone" min="0" maxlength="10" step="0.01">
                <small class="text-danger" v-if="errors && errors.phone">{{ errors.phone[0] }}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="address">Dirección</label>
                <input type="text" name="address" id="address" class="form-control" v-model="address">
                <small class="text-danger" v-if="errors && errors.address">{{ errors.address[0] }}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">RFC</label>
                <input type="text" name="rfc" id="rfc" class="form-control" v-model="rfc" maxlength="13">
                <small class="text-danger" v-if="errors && errors.rfc">{{ errors.rfc[0] }}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="estado">Estado</label>
                <select id="estado" class="form-control" v-model="state_id" @change="changeEstado" required>
                    <option value="" selected disabled>Seleccione</option>
                    <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                </select>
                <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="estado">Ciudad</label>
                <select id="estado" class="form-control" v-model="city" required>
                    <option value="" selected disabled>Seleccione</option>
                    <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                </select>
                <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
            </div>
        </div>

        <hr>

        <div class="text-right">

            <a type="button" href="/clientes" class="btn btn-sm btn-secondary mr-5">Cancelar</a>
            <button class="btn btn-sm btn-success ml-3">Guardar</button>

        </div>
    </form>
</template>


<script>
import axios from 'axios';

export default {
    props: ['clientId'],
    data(){
        return {
            id: undefined,
            name: '',
            email: '',
            phone: '',
            city: '',
            address: '',
            rfc: '',
            state_id:'',
            estados:[],
            ciudades:[],
            errors: undefined
           
        }
    },
    watch:{
        state_id(newVal, oldVal) {
            this.changeEstado();
        }

    },
    mounted() {
        this.getEstado();

        if(this.clientId){
            this.getClient(this.clientId);
        }
    },
    methods: {
        getEstado(){
            this.estados = []
            axios.get('/api/estado').then(resp => {
                if(resp.data.status){
                    this.estados = resp.data.estados;
                }else{
                    this.estados = []
                }
            })
        },
        changeEstado(){
            this.ciudades = []
            axios.get(`/api/ciudades/${this.state_id}`).then(resp => {
                if(resp.data.status){
                    this.ciudades = resp.data.ciudades;
                }else{
                    this.ciudades = []
                }
            })
        },
        clearForm(){
            this.id = undefined;
            this.name = '';
            this.email = '';
            this.phone = '';
            this.city = '';
            this.address = '';
            this.rfc = '';
            this.state_id ='';
        },
        getClient(clientId){
            this.clearForm();
            axios.get(`/api/client/${clientId}`).then(resp => {
                if(resp.data.status){
                    this.id          = resp.data.client.id;
                    this.name        = resp.data.client.name;
                    this.email        = resp.data.client.email;
                    this.phone        = resp.data.client.phone;
                    this.city        = resp.data.client.city;
                    this.address        = resp.data.client.address;
                    this.rfc        = resp.data.client.rfc;
                    this.state_id        = resp.data.client.ciudad.state_id;
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                console.log({error});
                Swal.fire('',"Ocurrio un error al intentar obtener información del cliente",'error')
            })

        },
        save(e){
            e.preventDefault();
            if(this.$refs.clientForm.reportValidity()){
                this.errors = undefined;
                const formData = new FormData();
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('phone', this.phone);
                formData.append('city', this.city);
                formData.append('address', this.address);
                formData.append('rfc', this.rfc);
                
                if(this.clientId){
                    formData.append('id', this.id);
                    this.updateProduct(this.id, formData);
                }else{
                    this.storeProduct(formData);
                }
            }

        },
        updateProduct(id, client){
            axios.post('/api/client/'+ id ,client).then(resp => {
                if(resp.data.status){

                    Swal.fire('',`Información actualizada`,'success').then(resp => {
                        location.href = "/clientes"
                    });

                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data.errors
                }
            })
        },
        storeProduct(client){
            axios.post('/api/client',client).then(resp => {
                if(resp.data.status){
                    const clientName = resp.data.client && resp.data.client.name || ""
                    Swal.fire('',
                        `El cliente <b>${clientName}</b> ha sido agregado`,
                        'success'
                    ).then(resp => {
                        location.href = "/clientes"
                    })
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data.errors
                }
            })
        }
    },
}
</script>

<style>
    .text-right{
        text-align: right;
    }
</style>
