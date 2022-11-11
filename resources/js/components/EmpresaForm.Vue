<template>
    <form ref="empresaForm" @submit="save" method="POST" action="" enctype="multipart/form-data">

        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="name">Nombre de la empresa</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" v-model="nombre" required>
                            <small class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="logo">Logo</label>
                            <input type="file" name="file" id="logo" class="form-control" accept="image/*" />
                            <!-- <small class="text-danger" v-if="errors && errors.address">{{ errors.address[0] }}</small> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="razon_social">Razón Social</label>
                            <input type="text" name="razon_social" id="razon_social" class="form-control" v-model="razon_social">
                            <small class="text-danger" v-if="errors && errors.razon_social">{{ errors.razon_social[0] }}</small>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="phone">Teléfono</label>
                            <input type="tel" name="phone" id="phone" class="form-control" v-model="phone" min="0" maxlength="10" step="0.01">
                            <small class="text-danger" v-if="errors && errors.phone">{{ errors.phone[0] }}</small>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" class="form-control" v-model="address">
                            <small class="text-danger" v-if="errors && errors.address">{{ errors.address[0] }}</small>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="rfc">RFC</label>
                            <input type="text" name="rfc" id="rfc" class="form-control" v-model="rfc" maxlength="13">
                            <small class="text-danger" v-if="errors && errors.rfc">{{ errors.rfc[0] }}</small>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="estado">Estado</label>
                            <select id="estado" class="form-control" v-model="state_id" @change="changeEstado" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="estado">Ciudad</label>
                            <select id="estado" class="form-control" v-model="city" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
        <hr>

        <div class="text-end">
            <button class="btn btn-sm btn-success ml-3">Guardar</button>
        </div>
    </form>
</template>


<script>
import axios from 'axios';

export default {
    props: ['userIdProp','empresaIdProp'],
    data(){
        return {
            id: undefined,
            nombre: '',
            logo: '',
            razon_social: '',
            phone: '',
            address: '',
            rfc: '',
            city: '',
            state_id:'',
            estados:[],
            ciudades:[],
            errors: undefined,
            image: ''

        }
    },
    watch:{
        state_id(newVal, oldVal) {
            this.changeEstado();
        }

    },
    mounted() {        
        this.getEstado();

        if(this.empresaIdProp){
            this.getEmpresa(this.empresaIdProp);
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
            this.nombre = '';
            this.logo = '';
            this.razon_social = '';
            this.phone = '';
            this.address = '';
            this.rfc = '';
            this.state_id = '';
            this.city = '';
        },
        getEmpresa(empresaId){
            this.clearForm();
            axios.get(`/api/empresa/${empresaId}`).then(resp => {
                if(resp.data.status){
                    console.log(resp.data.empresa[0])
                    let aux=resp.data.empresa[0];
                    this.id          = aux.id;
                    this.nombre        = aux.nombre;
                    this.logo        = aux.logo;
                    this.razon_social        = aux.razon_social;
                    this.phone        = aux.phone;
                    this.address        = aux.address;
                    this.rfc        =aux.rfc;
                    this.state_id        = aux.state;
                    this.city        = aux.city;
                    this.admin_id        = aux.admin_id;
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                console.log({error});
                Swal.fire('',"Ocurrio un error al intentar obtener información de la empresa",'error')
            })

        },
        save(e){
            e.preventDefault();
            if(this.$refs.empresaForm.reportValidity()){
                console.log(this.logo);
                this.errors = undefined;
                const formData = new FormData();
                formData.append('nombre', this.nombre);
                formData.append('logo', this.logo);
                formData.append('razon_social', this.razon_social);
                formData.append('phone', this.phone);
                formData.append('address', this.address);
                formData.append('rfc', this.rfc);
                formData.append('state', this.state_id);
                formData.append('city', this.city);
                formData.append('admin_id', this.userIdProp);

                // console.log(this.empresaIdProp);
                if(this.empresaIdProp){
                    formData.append('id', this.empresaIdProp);
                    this.updateEmpresa(this.empresaIdProp, formData);
                }else{
                    Swal.fire('',`No puedes tener más de una empresa`,'error').then(resp => {
                        location.href = "/"
                    });
                }
            }
        },
        updateEmpresa(id, empresa){
            axios.post('/api/empresa/'+ id ,empresa).then(resp => {
                if(resp.data.status){

                    Swal.fire('',`Información actualizada`,'success').then(resp => {
                        location.href = "/empresa"
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
    }
}


</script>

