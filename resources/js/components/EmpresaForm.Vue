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
                                    <label for="country">País*</label>
                                    <select id="country" class="form-control" v-model="df_country_id" required>
                                        <option value="" selected disabled>Seleccione</option>
                                        <option :value="pais.id" v-for="pais in paises" :key="pais.id">{{ pais.name }}</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div v-if="(df_country_id===157)">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="estado">Estado / Provincia*</label>
                                        <select id="estado" class="form-control" v-model="df_state_id" @change="changeEstado(df_state_id,'df_state_id')" required> 
                                            <option value="" selected disabled>Seleccione</option>
                                            <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="city">Ciudad / Localidad*</label>
                                        <select id="city" class="form-control" v-model="df_city_id" required>
                                            <option value="" selected disabled>Seleccione</option>
                                            <option :value="ciudad.id" v-for="ciudad in df_ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    
                            <div v-else>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="estado">Estado / Provincia*</label>
                                        <input type="text" name="estado" id="estado" class="form-control" maxlength="50" v-model="df_state_id" required>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="ciudad">Ciudad / Localidad*</label>
                                        <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="50" v-model="df_city_id" required>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="mb-3">
                                    <label for="street">Calle*</label>
                                    <input type="text" name="street" id="street" class="form-control" maxlength="50" v-model="df_street" required>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="mb-3">
                                    <label for="num_interior">Numero interior</label>
                                    <input type="tel" name="num_interior" id="num_interior" class="form-control" v-model="df_num_interior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo"/>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="mb-3">
                                    <label for="num_exterior">Numero exterior*</label>
                                    <input type="tel" name="num_exterior" id="num_exterior" class="form-control" v-model="df_num_exterior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="mb-3">
                                    <label for="cp">Código postal*</label>
                                    <input type="tel" name="cp" id="cp" class="form-control" v-model="df_cp" min="0" maxlength="5" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
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
                            <label class="nombre_empresa text-primary" v-else>Sin nombre</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="name">Nombre de empresa*</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control" maxlength="28" v-model="name" required/>
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
                            <input type="text" name="email" id="email" class="form-control" maxlength="50" v-model="email" required/>
                        </div>
                    </div>

                   

                    <div class="row">
                        <div class="mb-3">
                            <label>Dirección de la empresa:</label>
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
                                <select id="estado" class="form-control" v-model="state_id" @change="changeEstado(state_id,'state_id')" required> 
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
                                <input type="text" name="estado" id="estado" class="form-control" maxlength="50" v-model="state_id" required>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="mb-3">
                                <label for="ciudad">Ciudad / Localidad*</label>
                                <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="50" v-model="city_id" required>
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
            domicilio_empresa_id:'',
            domicilio_fiscal_id:'',

            country_id: '',
            state_id:'',
            city_id: '',
            street: '',
            num_interior: '',
            num_exterior: '',
            cp: '',

            df_country_id: '',
            df_state_id:'',
            df_city_id: '',
            df_street: '',
            df_num_interior: '',
            df_num_exterior: '',
            df_cp: '',
            
            estado:'',
            ciudad:'',
            paises:[],
            estados:[],
            ciudades:[],   
            df_ciudades:[],   
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
            this.changeEstado(this.state_id,'state_id');
        },
        df_state_id(newVal, oldVal) {
            this.changeEstado(this.df_state_id,'df_state_id');
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
        changeEstado(state_id, var_name){
            axios.get(`/api/ciudades/${state_id}`).then(resp => {
                if(resp.data.status){
                    if(var_name=='state_id'){
                        console.log("state_id")
                        this.ciudades = []
                        this.ciudades = resp.data.ciudades;
                    }
                    else if(var_name=='df_state_id'){
                        console.log("df_state_id")
                        this.df_ciudades = []
                        this.df_ciudades = resp.data.ciudades;
                    }
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

            // domicilio fiscal
            this.df_country_id = '';
            this.df_state_id = '';
            this.df_city_id = '';
            this.df_street = '';
            this.df_num_interior = '';
            this.df_num_exterior = '';
            this.df_cp = '';
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
                    
                    // IDs de domicilios
                    this.domicilio_empresa_id = aux.domicilio_empresa_id;
                    this.domicilio_fiscal_id = aux.domicilio_fiscal_id;
                                        
                    if(aux.domicilio_empresa_id==aux.domicilio_fiscal_id){ //validar si los domicilios son el mismo
                        this.mismo_domicilio=true;
                    }else{
                        this.mismo_domicilio=false;
                    }
                    
                    if(aux.domicilio_empresa && aux.domicilio_fiscal){
                        
                        // domicilio empresa
                        let auxDomicilioEmpresa=aux.domicilio_empresa;
                        this.country_id = auxDomicilioEmpresa.country;
                        this.state_id = auxDomicilioEmpresa.state;
                        this.city_id = auxDomicilioEmpresa.city;
                        this.street = auxDomicilioEmpresa.street;
                        this.num_interior = auxDomicilioEmpresa.num_interior;
                        this.num_exterior = auxDomicilioEmpresa.num_exterior;
                        this.cp = auxDomicilioEmpresa.cp;

                        // domicilio empresa
                        let auxDomicilioFiscal=aux.domicilio_fiscal;
                        this.df_country_id = auxDomicilioFiscal.country;
                        this.df_state_id = auxDomicilioFiscal.state;
                        this.df_city_id = auxDomicilioFiscal.city;
                        this.df_street = auxDomicilioFiscal.street;
                        this.df_num_interior = auxDomicilioFiscal.num_interior;
                        this.df_num_exterior = auxDomicilioFiscal.num_exterior;
                        this.df_cp = auxDomicilioFiscal.cp;
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

                // Datos domicilio empresa
                const domicilioEmpresaFD = new FormData();
                domicilioEmpresaFD.append('country', this.country_id);
                domicilioEmpresaFD.append('state', this.state_id);
                domicilioEmpresaFD.append('city', this.city_id);
                domicilioEmpresaFD.append('street', this.street);
                domicilioEmpresaFD.append('num_interior', this.num_interior);
                domicilioEmpresaFD.append('num_exterior', this.num_exterior);
                domicilioEmpresaFD.append('cp', this.cp);

                // datos domicilio fiscal
                const domicilioFiscalFD = new FormData();
                domicilioFiscalFD.append('country', this.df_country_id);
                domicilioFiscalFD.append('state', this.df_state_id);
                domicilioFiscalFD.append('city', this.df_city_id);
                domicilioFiscalFD.append('street', this.df_street);
                domicilioFiscalFD.append('num_interior', this.df_num_interior);
                domicilioFiscalFD.append('num_exterior', this.df_num_exterior);
                domicilioFiscalFD.append('cp', this.df_cp);

                // Datos empresa
                const datosEmpresaFD = new FormData();
                datosEmpresaFD.append('logo', this.logo);
                datosEmpresaFD.append('razon_social', this.razon_social);
                datosEmpresaFD.append('rfc', this.rfc);
                datosEmpresaFD.append('name', this.name);
                datosEmpresaFD.append('phone', this.phone);
                datosEmpresaFD.append('email', this.email);
                datosEmpresaFD.append('admin_id', this.userIdProp);

                
                if(this.empresaIdProp){ //si ya existe empresa, ok

                    if(this.domicilio_empresa_id && this.domicilio_fiscal_id){ //si ya tiene domicilios, actualizar
                        //actualizando domicilios en tabla domicilios
                        
                        domicilioEmpresaFD.append('id', this.domicilio_empresa_id);
                        this.updateDomicilio(this.domicilio_empresa_id, domicilioEmpresaFD);
                        datosEmpresaFD.append('domicilio_empresa_id', this.domicilio_empresa_id);
                        
                        if(this.mismo_domicilio==false){//si el usuario quiere usar domicilio de empresa y fiscal diferentes
                            domicilioFiscalFD.append('id', this.domicilio_fiscal_id);   
                            this.updateDomicilio(this.domicilio_fiscal_id, domicilioFiscalFD);
                            
                            datosEmpresaFD.append('domicilio_fiscal_id', this.domicilio_fiscal_id);
                        }else{
                            datosEmpresaFD.append('domicilio_fiscal_id', this.domicilio_empresa_id);
                            //-p borrar domicilio fiscal desuso en la tabla
                        }
                        

                    }else{//si primera vez que crea ambos domicilios
                        this.storeDomicilio(domicilioEmpresaFD);
                        datosEmpresaFD.append('domicilio_empresa_id', 1);

                        if(this.mismo_domicilio==false){
                            this.storeDomicilio(domicilioFiscalFD);
                            datosEmpresaFD.append('domicilio_fiscal_id', 1);
                        }
                    }

                    datosEmpresaFD.append('id', this.empresaIdProp);
                    this.updateEmpresa(this.empresaIdProp, datosEmpresaFD);
                }else{
                    Swal.fire('',`Error aún no se ha creado una empresa`,'error').then(resp => {
                        // location.href = "/"
                    });
                }
            }
        },
        updateDomicilio(id, domicilio){
            axios.post('/api/domicilio/'+ id ,domicilio).then(resp => {
                if(resp.data.status){

                    console.log("Domicilio actualizado")

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
        storeDomicilio(domicilio){
            axios.post('/api/domicilio',domicilio).then(resp => {
                if(resp.data.status){
                    console.log(resp.data);
                    Swal.fire('',
                        `El domicilio ha sido agregado`,
                        'success'
                    ).then(resp => {})
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data.errors
                }
            })
        }
    }
}

</script>



<!-- 
    Pendiente
    
    -borrar el otro domicilio fiscal de la tabla tras seleccionar  la opcion de usar mismo domicilio, se quita de la tabla de empresa pero se mantiene en la tabla domicilios

    -al crear un nuevo domicilio fical, obtener el id de este tras ser creado y añadirlo en la tabla empresas
    
    -validar si se añaden a la tabla de domicilios fiscales los nuevos domicilios fiscales tras deseleccionar mismo domicilio

 -->
