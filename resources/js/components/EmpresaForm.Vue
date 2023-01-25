<template>
    <form ref="empresaForm" @submit="save" method="POST" action="" enctype="multipart/form-data">

        <div class="container mx-4">
            <div class="row align-items-start">
                
                <div class="col-4 pe-5 ">

                    <div class="row">
                        <div class="mb-3">

                            <div class="image_group text-center">
                                <label>
                                    <input type="file" name="file" id="logo" class="form-control" accept="image/*" style="display: none;" @change="onFileChange"/>
                                    <div id="preview">
                                        <img v-if="img" :src="img">  
                                    </div>
                                    
                                </label>
                                <label class="text-start">Para cambiar el icono de la empresa haga click en el</label>
                                
                            </div>
                          
                        </div>
                    </div>

            
                        <hr/>
        
                        <div class="row">
                            <div class="mb-3">
                                <label>Datos de facturación:</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label for="razon_social">Razón Social</label>
                                <input type="text" name="razon_social" id="razon_social" class="form-control" maxlength="50" v-model="razon_social">
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="mb-3">
                                <label for="rfc">RFC</label>
                                <input type="tel" name="rfc" id="rfc" class="form-control" v-model="rfc" maxlength="13" required>
                            </div>
                        </div>

                        <div class="bd-example">
                        <div class="row">
                            <div class="mb-3">
                                <label>Domicilio Fiscal:</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <div class="form-check">
                                <input type="checkbox" id="mismo_domicilio" class="form-check-input" v-model="mismo_domicilio"/> 
                                <label for="mismo_domicilio ">La dirección de facturación es la misma que la de la empresa</label>
                                </div>
                            </div>
                        </div>





                        <div class="" v-if="this.mismo_domicilio == false">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="country">País</label>
                                    <select id="country" class="form-control" v-model="country_id" required>
                                        <option value="" selected disabled>Seleccione</option>
                                        <option :value="pais.id" v-for="pais in paises" :key="pais.id">{{ pais.name }}</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div v-if="(country_id===157)">
                                <div class="row">
                                    <div class=" mb-3">
                                        <label for="estado">Estado / Provincia</label>
                                        <select id="estado" class="form-control" v-model="state_id" @change="changeEstado" required> 
                                            <option value="" selected disabled>Seleccione</option>
                                            <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" mb-3">
                                        <label for="city">Ciudad / Localidad</label>
                                        <select id="city" class="form-control" v-model="city_id" required>
                                            <option value="" selected disabled>Seleccione</option>
                                            <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    
                            <div v-else>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="estado">Estado / Provincia</label>
                                        <input type="text" name="estado" id="estado" class="form-control" maxlength="50" v-model="estado" required>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="ciudad">Ciudad / Localidad</label>
                                        <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="50" v-model="ciudad" required>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="mb-3">
                                    <label for="street">Calle</label>
                                    <input type="text" name="street" id="street" class="form-control" maxlength="50" v-model="street">
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="mb-3">
                                    <label for="num_interior">Numero interior</label>
                                    <input type="tel" name="num_interior" id="num_interior" class="form-control" v-model="num_interior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo"/>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="mb-3">
                                    <label for="num_exterior">Numero exterior</label>
                                    <input type="tel" name="num_exterior" id="num_exterior" class="form-control" v-model="num_exterior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo"/>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="mb-3">
                                    <label for="cp">Código postal</label>
                                    <input type="tel" name="cp" id="cp" class="form-control" v-model="cp" min="0" maxlength="5" pattern="[0-9]*" title="Solo se permiten números en este campo"/>
                                </div>
                            </div>
                        </div>
            

                    </div>        
                </div>
                
                
                
                <div class="col-6 pe-7">
                    <div class="row">
                        <div class="col-md">
                            <label class="titulo_pagina">
                                Editar datos de empresa:
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label class="nombre_empresa text-primary" v-if="name"> {{name}}</label>
                            <label class="nombre_empresa text-dark" v-else>Sin nombre</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="name">Nombre de empresa*</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control" maxlength="28" v-model="name" required>
                                <!-- <div class="input-group-text" v-text="(40 - name.length)"></div> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="phone">Teléfono*</label>
                            <input type="tel" name="phone" id="phone" class="form-control" v-model="phone" min="0" maxlength="10" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="email">Correo*</label>
                            <input type="text" name="email" id="email" class="form-control" maxlength="50" v-model="email" required>
                        </div>
                    </div>

                   

                    
                
                    <div class="row">
                        <div class="mb-3">
                            <label for="country">País*</label>
                            <select id="country" class="form-control" v-model="country_id" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="pais.id" v-for="pais in paises" :key="pais.id">{{ pais.name }}</option>
                            </select>
                        </div>
                    </div>
            
                    <div v-if="(country_id===157)">
                        <div class="row">
                            <div class="mb-3">
                                <label for="estado">Estado / Provincia*</label>
                                <select id="estado" class="form-control" v-model="state_id" @change="changeEstado" required> 
                                    <option value="" selected disabled>Seleccione</option>
                                    <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="city">Ciudad / Localidad*</label>
                                <select id="city" class="form-control" v-model="city_id" required>
                                    <option value="" selected disabled>Seleccione</option>
                                    <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
            
                    <div v-else>
                        <div class="row">
                            <div class="mb-3">
                                <label for="estado">Estado / Provincia*</label>
                                <input type="text" name="estado" id="estado" class="form-control" maxlength="50" v-model="estado" required>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="mb-3">
                                <label for="ciudad">Ciudad / Localidad*</label>
                                <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="50" v-model="ciudad" required>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="mb-3">
                            <label for="street">Calle*</label>
                            <input type="text" name="street" id="street" class="form-control" maxlength="50" v-model="street" required>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="mb-3">
                            <label for="num_interior">Numero interior</label>
                            <input type="tel" name="num_interior" id="num_interior" class="form-control" v-model="num_interior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo"/>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="mb-3">
                            <label for="num_exterior">Numero exterior*</label>
                            <input type="tel" name="num_exterior" id="num_exterior" class="form-control" v-model="num_exterior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="mb-3">
                            <label for="cp">Código postal*</label>
                            <input type="tel" name="cp" id="cp" class="form-control" v-model="cp" min="0" maxlength="5" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
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
            mismo_domicilio: '',
            name: '',
            phone: '',
            email: '',

            img: null,
            name_substr:'',

            country_id: '',
            state_id:'',
            city_id: '',
            cp: '',
            street: '',
            num_interior: '',
            num_exterior: '',
            
            estado:'',
            ciudad:'',
            paises:[],
            estados:[],
            ciudades:[],

            domicilio_empresa_id:'',
            domicilio_fiscal_id:'',
        }
    },
    mounted() {        
        // Obtener lista de paises y estados
        this.getPais();
        this.getEstado();

        // Cargar imagen por defecto
        this.img =this.imgEmpresaProp;

        // obtener datos de empresa si es que ya existe 
        if(this.empresaIdProp){
            this.getEmpresa(this.empresaIdProp);
        }        
    },
    watch:{
        state_id(newVal, oldVal) {
            this.changeEstado();
        },
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.img = URL.createObjectURL(file);
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

            //datos empresa
            this.logo = '';
            this.razon_social = '';
            this.rfc = '';
            this.mismo_domicilio = '';
            this.name = '';
            this.phone = '';
            this.email = '';

            // domicilio empresa
            this.country_id = '';
            this.state_id = '';
            this.city_id = '';
            this.street = '';
            this.num_interior = '';
            this.num_exterior = '';
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
                    
                    // datos Empresa
                    this.logo        = aux.logo;
                    this.razon_social= aux.razon_social;
                    this.rfc        =aux.rfc;
                    this.name        = aux.name;
                    this.phone        = aux.phone;
                    this.email        = aux.email;
                    
                    // variables necesarias
                    this.domicilio_empresa_id = aux.domicilio_empresa_id;
                    this.domicilio_fiscal_id = aux.domicilio_fiscal_id;
                    
                    console.log("domicilios:  empresa:"+this.domicilio_empresa_id+" | : "+this.domicilio_fiscal_id)
                    
                    // domicilio empresa
                    if(aux.domicilio_empresa){
                        let auxDomicilioEmpresa=aux.domicilio_empresa;
                        this.country_id = auxDomicilioEmpresa.country;
                        this.state_id = auxDomicilioEmpresa.state;
                        this.city_id = auxDomicilioEmpresa.city;
                        this.street = auxDomicilioEmpresa.street;
                        this.num_interior = auxDomicilioEmpresa.num_interior;
                        this.num_exterior = auxDomicilioEmpresa.num_exterior;
                        this.cp = auxDomicilioEmpresa.cp;
                    }

                    

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

                const domicilioEmpresaFD = new FormData();
                domicilioEmpresaFD.append('country', this.country_id);
                domicilioEmpresaFD.append('state', this.state_id);
                domicilioEmpresaFD.append('city', this.city_id);
                domicilioEmpresaFD.append('street', this.street);
                domicilioEmpresaFD.append('num_interior', this.num_interior);
                domicilioEmpresaFD.append('num_exterior', this.num_exterior);
                domicilioEmpresaFD.append('cp', this.cp);

                const datosEmpresa = new FormData();
                datosEmpresa.append('logo', this.logo);
                datosEmpresa.append('razon_social', this.razon_social);
                datosEmpresa.append('rfc', this.rfc);
                datosEmpresa.append('name', this.name);
                datosEmpresa.append('phone', this.phone);
                datosEmpresa.append('email', this.email);
                datosEmpresa.append('admin_id', this.userIdProp);
                
                if(this.empresaIdProp){ //si ya existe empresa

                    if(this.domicilio_empresa_id){//si ya hay domicilio
                        console.log(`Ya existe domicilio ${this.domicilio_empresa_id}`)
                        
                        domicilioEmpresaFD.append('id', this.domicilio_empresa_id);
                        this.updateDomicilio(this.domicilio_empresa_id, domicilioEmpresaFD);
                        
                        datosEmpresa.append('domicilio_empresa_id', this.domicilio_empresa_id);
                        datosEmpresa.append('domicilio_fiscal_id', 1);
                    }else{
                        // -p CREACION AUTOMATICA TEMPORAL -p
                        datosEmpresa.append('domicilio_empresa_id', 1);
                        datosEmpresa.append('domicilio_fiscal_id', 1);
                        console.log("Nuevo domicilio creado")
                    }

                    datosEmpresa.append('id', this.empresaIdProp);
                    this.updateEmpresa(this.empresaIdProp, datosEmpresa);
                }else{
                    Swal.fire('',`No puedes tener más de una empresa`,'error').then(resp => {
                        // location.href = "/"
                    });
                }
            }
        },
        saveDomicilioEmpresa(){
            if(this.$refs.empresaForm.reportValidity()){
                

                // Imprimir entradas
                // for (const [key, value] of formData.entries()) {
                //     console.log(key, value);
                // }

                
            }
        },
        updateDomicilio(id, domicilio){
            axios.post('/api/domicilio/'+ id ,domicilio).then(resp => {
                if(resp.data.status){

                    Swal.fire('',`Domicilio actualizado`,'success').then(resp => {
                        // location.href = "/empresa"
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
        updateEmpresa(id, empresa){
            axios.post('/api/empresa/'+ id ,empresa).then(resp => {
                if(resp.data.status){

                    Swal.fire('',`Información actualizada`,'success').then(resp => {
                        // location.href = "/empresa"
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

