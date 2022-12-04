<template>
    <form ref="empresaForm" @submit="save" method="POST" action="" enctype="multipart/form-data">

        <div class="container">
            <div class="row align-items-start">
                
                <div class="col-5">

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <div class="image_group text-center">
                                <label>
                                    <input type="file" name="file" id="logo" class="form-control" accept="image/*" style="display: none;" @change="onFileChange"/>
                                    <div id="preview">
                                        <img v-if="url" :src="url">  
                                    </div>
                                </label>
                                <label class="text-start">Para cambiar el icono de la empresa haga click en el</label>
                            </div>
                        </div>
                    </div>

                    <hr/>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label>Datos de facturación</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="razon_social">Razón Social</label>
                            <input type="text" name="razon_social" id="razon_social" class="form-control" maxlength="50" v-model="razon_social">
                            <small class="text-danger" v-if="errors && errors.razon_social">{{ errors.razon_social[0] }}</small>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="rfc">RFC</label>
                            <input type="tel" name="rfc" id="rfc" class="form-control" v-model="rfc" maxlength="13">
                            <small class="text-danger" v-if="errors && errors.rfc">{{ errors.rfc[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label>Domicilio Fiscal</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <div class="form-check">
                            <input type="checkbox" id="domicilio_fiscal" class="form-check-input" v-model="domicilio_fiscal"/> 
                            <label for="domicilio_fiscal ">La dirección de facturación es la misma que la de la empresa</label>
                            </div>
                        </div>
                    </div>

                    <div class="" v-if="domicilio_fiscal==false">
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="street">Calle</label>
                                <input type="text" name="street" id="street" class="form-control" maxlength="50" v-model="street">
                                <small class="text-danger" v-if="errors && errors.street">{{ errors.street[0] }}</small>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-10  mb-3">
                                <label for="num_interior">Numero interior</label>
                                <input type="tel" name="num_interior" id="num_interior" class="form-control" v-model="num_interior" min="0" maxlength="10">
                                <small class="text-danger" v-if="errors && errors.num_interior">{{ errors.num_interior[0] }}</small>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="num_exterior">Numero exterior</label>
                                <input type="tel" name="num_exterior" id="num_exterior" class="form-control" v-model="num_exterior" min="0" maxlength="10">
                                <small class="text-danger" v-if="errors && errors.num_exterior">{{ errors.num_exterior[0] }}</small>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="country">País</label>
                                <select id="country" class="form-control" v-model="country_id" @change="changePais">
                                    <option value="" selected disabled>Seleccione</option>
                                    <option :value="pais.id" v-for="pais in paises" :key="pais.id">{{ pais.name }}</option>
                                </select>
                                <small class="text-danger" v-if="errors && errors.country_id">{{ errors.state_id[0] }}</small>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="estado">Estado / Provincia</label>
                                <select id="estado" class="form-control" v-model="state_id" @change="changeEstado">
                                    <option value="" selected disabled>Seleccione</option>
                                    <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                                </select>
                                <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="city">Ciudad / Localidad</label>
                                <select id="city" class="form-control" v-model="city_id">
                                    <option value="" selected disabled>Seleccione</option>
                                    <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                                </select>
                                <small class="text-danger" v-if="errors && errors.city_id">{{ errors.city_id[0] }}</small>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class=" mb-3">
                                <label for="cp">Código postal</label>
                                <input type="tel" name="cp" id="cp" class="form-control" v-model="cp" min="0" maxlength="10">
                                <small class="text-danger" v-if="errors && errors.cp">{{ errors.cp[0] }}</small>
                            </div>
                        </div>
                        
                    </div>
            
                    
                </div>
                
                
                <div class="col-7">
                    <div class="row">
                        <div class="col-md">
                            <label class="titulo_pagina">
                                Editar datos de empresa
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md mb-3">
                            <label class="nombre_empresa" v-if="name"> {{name}}</label>
                            <label class="nombre_empresa" v-else>Sin nombre</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="name">Nombre de empresa*</label>
                            <input type="text" name="name" id="name" class="form-control" maxlength="40" v-model="name" required>
                            <small class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="phone">Teléfono</label>
                            <input type="tel" name="phone" id="phone" class="form-control" v-model="phone" min="0" maxlength="10">
                            <small class="text-danger" v-if="errors && errors.phone">{{ errors.phone[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="email">Correo</label>
                            <input type="text" name="email" id="email" class="form-control" maxlength="50" v-model="email">
                            <small class="text-danger" v-if="errors && errors.email">{{ errors.email[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="street">Calle</label>
                            <input type="text" name="street" id="street" class="form-control" maxlength="50" v-model="street">
                            <small class="text-danger" v-if="errors && errors.street">{{ errors.street[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="num_interior">Numero interior</label>
                            <input type="tel" name="num_interior" id="num_interior" class="form-control" v-model="num_interior" min="0" maxlength="10">
                            <small class="text-danger" v-if="errors && errors.num_interior">{{ errors.num_interior[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="num_exterior">Numero exterior</label>
                            <input type="tel" name="num_exterior" id="num_exterior" class="form-control" v-model="num_exterior" min="0" maxlength="10">
                            <small class="text-danger" v-if="errors && errors.num_exterior">{{ errors.num_exterior[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="country">País</label>
                            <select id="country" class="form-control" v-model="country_id" @change="changePais">
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="pais.id" v-for="pais in paises" :key="pais.id">{{ pais.name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors && errors.country_id">{{ errors.state_id[0] }}</small>
                        </div>
                    </div>
                    <div v-if="(country_id==157)">
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="estado">Estado / Provincia</label>
                                <select id="estado" class="form-control" v-model="state_id" @change="changeEstado">
                                    <option value="" selected disabled>Seleccione</option>
                                    <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                                </select>
                                <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="city">Ciudad / Localidad</label>
                                <select id="city" class="form-control" v-model="city_id">
                                    <option value="" selected disabled>Seleccione</option>
                                    <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                                </select>
                                <small class="text-danger" v-if="errors && errors.city_id">{{ errors.city_id[0] }}</small>
                            </div>
                        </div>
                </div>
                <div v-else>
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="estado">Estado / Provincia</label>
                            <input type="text" name="estado" id="estado" class="form-control" maxlength="60" v-model="estado" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="ciudad">Ciudad / Localidad</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="60" v-model="ciudad" required>
                        </div>
                    </div>
                </div>
                
            
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="cp">Código postal</label>
                            <input type="tel" name="cp" id="cp" class="form-control" v-model="cp" min="0" maxlength="10">
                            <small class="text-danger" v-if="errors && errors.cp">{{ errors.cp[0] }}</small>
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
    props: ['userIdProp','empresaIdProp','imgEmpresaProp'],
    data(){
        return {
            id: undefined,
            logo: '',
            razon_social: '',
            rfc: '',
            domicilio_fiscal: '',
            name: '',
            phone: '',
            email: '',
            street: '',
            num_interior: '',
            num_exterior: '',
            country_id: '',
            state_id:'',
            city_id: '',
            cp: '',
            estado:'',
            ciudad:'',
            paises:[],
            estados:[],
            ciudades:[],
            errors: undefined,
            url: null,
        }
    },
    watch:{
        state_id(newVal, oldVal) {
            this.changeEstado();
        }

    },
    mounted() {        
        this.getPais();
        this.getEstado();

        this.url =this.imgEmpresaProp;
        if(this.empresaIdProp){
            this.getEmpresa(this.empresaIdProp);
        }        
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
        getPais(){
            this.paises = []
            axios.get('/api/pais').then(resp => {
                if(resp.data.status){
                    this.paises = resp.data.countries;
                }else{
                    this.paises = []
                }
            })
        },
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
        changePais(){
            // this.ciudades = []
            // axios.get(`/api/ciudades/${this.state_id}`).then(resp => {
            //     if(resp.data.status){
            //         this.ciudades = resp.data.ciudades;
            //     }else{
            //         this.ciudades = []
            //     }
            // })
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
            this.logo = '';
            this.razon_social = '';
            this.rfc = '';
            this.name = '';
            this.phone = '';
            this.email = '';
            this.domicilio_fiscal = '';

            this.street = '';
            this.num_interior = '';
            this.num_exterior = '';
            this.country_id = '';
            this.state_id = '';
            this.city_id = '';
            this.cp = '';
        },
        getEmpresa(empresaId){
            this.clearForm();
            axios.get(`/api/empresa/${empresaId}`).then(resp => {
                if(resp.data.status){
                    console.log(resp.data.empresa[0])
                    let aux=resp.data.empresa[0];

                    if(aux.name==null){
                        Swal.fire('',`Por favor registra una empresa antes de continuar`,'warning').then(resp => {
                        });
                    }

                    this.id          = aux.id;
                    this.name        = aux.name;
                    this.logo        = aux.logo;
                    this.rfc        =aux.rfc;
                    this.razon_social        = aux.razon_social;
                    this.phone        = aux.phone;
                    this.email        = aux.email;
                    this.admin_id        = aux.admin_id;
                    this.domicilio_empresa_id= aux.domicilio_empresa_id;
                    this.domicilio_fiscal_id= aux.domicilio_fiscal_id;
                    
                    this.street        = aux.street;
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
                formData.append('name', this.name);
                formData.append('logo', this.logo);
                formData.append('phone', this.phone);
                formData.append('email', this.email);
                formData.append('rfc', this.rfc);
                formData.append('razon_social', this.razon_social);
                formData.append('admin_id', this.userIdProp);
                formData.append('domicilio_empresa_id', this.userIdProp);
                formData.append('domicilio_fiscal_id', this.userIdProp);
                // formData.append('address', this.address);
                // formData.append('state', this.state_id);
                // formData.append('city', this.city_id);

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

