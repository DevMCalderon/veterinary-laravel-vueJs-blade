<template>
    <form ref="empresaForm" @submit="save" method="POST" action="" enctype="multipart/form-data">

        <div class="container x-10 w-80">
            <div class="row align-items-start">
                
                <!-- Datos de la empresa -->
                <div class="col-6 pe-5 ">

                    <!-- Empresa Logo -->
                    <div class="row">
                        <div class="mb-3">
                            <div class="image_group text-center">
                                <label>
                                    <input type="file" name="file" id="logo" class="form-control" accept="image/*" style="display: none;" @change="onFileChange"/>
                                    <div id="preview">
                                        <img v-if="img" :src="img">
                                    </div>
                                </label>
                                <label class="text-start mt-2">Para cambiar el icono de la empresa haga click en la imagen</label>
                            </div>
                        </div>
                    </div>
            
                        <hr/>
        
                        <!-- Datos de facturación -->
                        <div class="row">
                            <div class="mb-3">
                                <label>Datos de facturación:</label>
                            </div>
                        </div>

                        <!-- Razón social -->
                        <div class="row">
                            <div class="mb-3">
                                <label for="razon_social">Razón Social</label>
                                <input type="text" name="razon_social" id="razon_social" class="form-control" maxlength="50" v-model="razon_social">
                            </div>
                        </div>
                
                        <!-- RFC -->
                        <div class="row">
                            <div class="mb-3">
                                <label for="rfc">RFC</label>
                                <input type="tel" name="rfc" id="rfc" class="form-control" v-model="rfc" maxlength="13" required>
                            </div>
                        </div>
                        
                        <!-- Domicilio fiscal -->
                        <div class="bd-example">
                        <div class="row">
                            <div class="mb-3">
                                <label>Domicilio Fiscal:</label>
                            </div>
                        </div>

                        <!-- Check usar el mismo domicilio para la facturación -->
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-check">
                                <input type="checkbox" id="mismo_domicilio" class="form-check-input" v-model="mismo_domicilio"/> 
                                <label for="mismo_domicilio ">La dirección de facturación es la misma que la de la empresa</label>
                                </div>
                            </div>
                        </div>




                        <!-- en caso de que el domicilio fiscal no sea igual al domicilio de la empresa, se muestran los inputs
                         de domicilio fiscal -->
                        <div class="" v-if="this.mismo_domicilio == false">
                            <div class="row">
                                <!-- Pais -->
                                <div class="mb-3">
                                    <label for="country">País*</label>
                                    <select id="country" class="form-control" v-model="df_country_id" @change="changePais('fiscal_dom')" required>
                                        <option value="" selected disabled>Seleccione</option>
                                        <option :value="pais.id" v-for="pais in paises" :key="pais.id">{{ pais.name }}</option>
                                    </select>
                                </div>
                            </div>
                    
                            <!-- si el pais es mexico, se muestran los inputs para estado y ciudad como select -->
                            <div v-if="(df_country_id===157)">
                                <!-- Estado -->
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="estado">Estado / Provincia*</label>
                                        <select id="estado" class="form-control" v-model="df_state_id" @change="changeEstado(df_state_id,'fiscal_dom')" required> 
                                            <option value="" selected disabled>Seleccione</option>
                                            <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- Ciudad -->
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
                    
                            <!-- si el pais no es mexico, se muestran los inputs para estado y ciudad como input text -->
                            <div v-else>
                                <!-- Estado -->
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="estado">Estado / Provincia*</label>
                                        <input type="text" name="estado" id="estado" class="form-control" maxlength="50" v-model="df_state_id" required>
                                    </div>
                                </div>
                    
                                <!-- Ciudad -->
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="ciudad">Ciudad / Localidad*</label>
                                        <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="50" v-model="df_city_id" required>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Calle -->
                            <div class="row">
                                <div class="mb-3">
                                    <label for="street">Calle*</label>
                                    <input type="text" name="street" id="street" class="form-control" maxlength="50" v-model="df_street" required>
                                </div>
                            </div>
                            
                            <!-- Numero interior -->
                            <div class="row">
                                <div class="mb-3">
                                    <label for="num_interior">Numero interior</label>
                                    <input type="tel" name="num_interior" id="num_interior" class="form-control" v-model="df_num_interior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo"/>
                                </div>
                            </div>
                            
                            <!-- Numero exterior -->
                            <div class="row">
                                <div class="mb-3">
                                    <label for="num_exterior">Numero exterior*</label>
                                    <input type="tel" name="num_exterior" id="num_exterior" class="form-control" v-model="df_num_exterior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
                                </div>
                            </div>
                    
                            <!-- Codigo postal -->
                            <div class="row">
                                <div class="mb-3">
                                    <label for="cp">Código postal*</label>
                                    <input type="tel" name="cp" id="cp" class="form-control" v-model="df_cp" min="0" maxlength="5" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
                                </div>
                            </div>
                        </div>
            

                    </div>
                </div>
                
                <!-- DATOS DE EMPRESA -->
                <div class="col-6 pe-7">
                    <!-- TITULO de la pagina -->
                    <div class="row">
                        <div class="mb-4">
                            <h3 class="sub-categoria-titulo mb-3 pb-2 border-bottom border-primary text-primary">Editar Datos de Empresa</h3>
                        </div>
                    </div>
                    
                    <!-- NOMBRE de la empresa -->
                    
                    <!-- muestra el nombre de la empresa -->
                    <div class="row">
                        <div class="mb-3">
                            <label class="nombre_empresa" v-if="name"> {{name}}</label>
                            <label class="nombre_empresa" v-else>Sin nombre</label>
                        </div>
                    </div>
                    
                    <!-- input Nombre de la empresa -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="name">Nombre de empresa*</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control" maxlength="28" v-model="name" required/>
                            </div>
                        </div>
                    </div>

                    <!-- TELEFONO de la empresa -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="phone">Teléfono*</label>
                            <input type="tel" name="phone" id="phone" class="form-control" v-model="phone" min="0" maxlength="10" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
                        </div>
                    </div>

                    <!-- EMAIL de la empresa -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="email">Correo*</label>
                            <input type="text" name="email" id="email" class="form-control" maxlength="50" v-model="email" required/>
                        </div>
                    </div>

                   
                    <!-- DIRECCION -->
                    <div class="row">
                        <div class="mb-3">
                            <label>Dirección de la empresa:</label>
                        </div>
                    </div>
                
                    <!-- PAIS -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="country">País*</label>
                            <select id="country" class="form-control" v-model="country_id" @change="changePais('empresa_dom')" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="pais.id" v-for="pais in paises" :key="pais.id">{{ pais.name }}</option>
                            </select>
                        </div>
                    </div>
            
                    <!-- si el pais es mexico, se pide el estado y ciudad como select -->
                    <div v-if="(country_id===157)">
                        <!-- ESTADO -->
                        <div class="row">
                            <div class="mb-3">
                                <label for="estado">Estado / Provincia*</label>
                                <select id="estado" class="form-control" v-model="state_id" @change="changeEstado(state_id,'empresa_dom')" required> 
                                    <option value="" selected disabled>Seleccione</option>
                                    <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- CIUDAD -->
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
            
                    <!-- si el pais no es mexico se pide el estado y ciudad como input text -->
                    <div v-else>
            
                        <!-- estado -->
                        <div class="row">
                            <div class="mb-3">
                                <label for="estado">Estado / Provincia*</label>
                                <input type="text" name="estado" id="estado" class="form-control" maxlength="50" v-model="state_id" required>
                            </div>
                        </div>
            
                        <!-- ciudad -->
                        <div class="row">
                            <div class="mb-3">
                                <label for="ciudad">Ciudad / Localidad*</label>
                                <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="50" v-model="city_id" required>
                            </div>
                        </div>
                    </div>
            
                    <!-- CALLE -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="street">Calle*</label>
                            <input type="text" name="street" id="street" class="form-control" maxlength="50" v-model="street" required>
                        </div>
                    </div>
            
                    <!-- NUMERO INTERIOR -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="num_interior">Numero interior</label>
                            <input type="tel" name="num_interior" id="num_interior" class="form-control" v-model="num_interior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo"/>
                        </div>
                    </div>
            
                    <!-- NUMERO EXTERIOR -->
                    <div class="row">
                        <div class="mb-3">
                            <label for="num_exterior">Numero exterior*</label>
                            <input type="tel" name="num_exterior" id="num_exterior" class="form-control" v-model="num_exterior" min="0" maxlength="4" pattern="[0-9]*" title="Solo se permiten números en este campo" required/>
                        </div>
                    </div>
            
                    <!-- CODIGO POSTAL -->
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

        <!-- BOTON GUARDAR -->
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
            id_dom_aux:'',
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
            this.country_id===157 ? this.changeEstado(this.state_id,'empresa_dom') : undefined;
        },
        df_state_id(newVal, oldVal) {
            this.df_country_id===157 ? this.changeEstado(this.df_state_id,'fiscal_dom') : undefined;
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
        changeEstado(state_id, var_name){ //función que recibe los estados y detecta a que formulario pertenece en base al nombre de la variable indicado
            axios.get(`/api/ciudades/${state_id}`).then(resp => {
                if(resp.data.status){
                    if(var_name ==='empresa_dom'){ //para domicilio empresa
                        this.ciudades = []
                        this.ciudades = resp.data.ciudades;
                    }
                    else if(var_name ==='fiscal_dom'){//para domicilio fiscal
                        this.df_ciudades = []
                        this.df_ciudades = resp.data.ciudades;
                    }
                }
            })
        },
        changePais(var_name){ 
            if(var_name==='empresa_dom'){ //para domicilio empresa
                this.state_id = '';
                this.city_id = '';
            }
            else if(var_name==='fiscal_dom'){//para domicilio fiscal
                this.df_state_id = '';
                this.df_city_id = '';
            }
        },
        clearFormFiscal(){
            // domicilio fiscal
            this.df_country_id = '';
            this.df_state_id = '';
            this.df_city_id = '';
            this.df_street = '';
            this.df_num_interior = '';
            this.df_num_exterior = '';
            this.df_cp = '';
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
                    // console.log(resp.data.empresa[0])
                    const aux=resp.data.empresa[0];
                    
                    
                    if(aux.name==null){//si la empresa aun no está rellenada muestra petición
                        Swal.fire('',`Por favor registra una empresa antes de continuar`,'warning').then(resp => {
                        });
                    }
                    
                    this.id = aux.id;
                    
                    // datos Empresa
                    this.logo           = aux.logo;
                    this.razon_social   = aux.razon_social;
                    this.rfc            = aux.rfc;
                    this.name           = aux.name;
                    this.phone          = aux.phone;
                    this.email          = aux.email;

                    // IDs de domicilios
                    this.domicilio_empresa_id   = aux.domicilio_empresa_id;
                    this.domicilio_fiscal_id    = aux.domicilio_fiscal_id;
                                        
                    if(aux.domicilio_empresa){// domicilio empresa
                        const aux_dom_empresa       = aux.domicilio_empresa;
                        this.country_id             = aux_dom_empresa.country;
                        this.state_id               = aux_dom_empresa.state;
                        this.city_id                = aux_dom_empresa.city;
                        this.street                 = aux_dom_empresa.street;
                        this.num_interior           = aux_dom_empresa.num_interior;
                        this.num_exterior           = aux_dom_empresa.num_exterior;
                        this.cp                     = aux_dom_empresa.cp;
                    }

                    if(aux.domicilio_fiscal){ // domicilio fiscal
                        const aux_dom_fiscal        = aux.domicilio_fiscal;
                        this.df_country_id          = aux_dom_fiscal.country;
                        this.df_state_id            = aux_dom_fiscal.state;
                        this.df_city_id             = aux_dom_fiscal.city;
                        this.df_street              = aux_dom_fiscal.street;
                        this.df_num_interior        = aux_dom_fiscal.num_interior;
                        this.df_num_exterior        = aux_dom_fiscal.num_exterior;
                        this.df_cp                  = aux_dom_fiscal.cp;
                    }

                    if(aux.domicilio_empresa_id===aux.domicilio_fiscal_id && !!aux.domicilio_empresa_id){ //validar si los domicilios son el mismo y que no sean null
                        this.mismo_domicilio=true;
                        this.clearFormFiscal();
                    }else{
                        this.mismo_domicilio=false;
                    }

                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                console.log({error});
                Swal.fire('',"Ocurrio un error al intentar obtener información de la empresa",'error')
            })
        },
        async save(e){
            e.preventDefault();
            if(this.$refs.empresaForm.reportValidity()){
                // get form data
                // Datos empresa
                let datosEmpresaFD = new FormData();
                datosEmpresaFD.append('logo', this.logo);
                datosEmpresaFD.append('razon_social', this.razon_social);
                datosEmpresaFD.append('rfc', this.rfc);
                datosEmpresaFD.append('name', this.name);
                datosEmpresaFD.append('phone', this.phone);
                datosEmpresaFD.append('email', this.email);
                datosEmpresaFD.append('admin_id', this.userIdProp);

                // Datos domicilio empresa
                let domicilioEmpresaFD = new FormData();
                domicilioEmpresaFD.append('country', this.country_id);
                domicilioEmpresaFD.append('state', this.state_id);
                domicilioEmpresaFD.append('city', this.city_id);
                domicilioEmpresaFD.append('street', this.street);
                domicilioEmpresaFD.append('num_interior', this.num_interior);
                domicilioEmpresaFD.append('num_exterior', this.num_exterior);
                domicilioEmpresaFD.append('cp', this.cp);

                // datos domicilio fiscal
                let domicilioFiscalFD = new FormData();
                domicilioFiscalFD.append('country', this.df_country_id);
                domicilioFiscalFD.append('state', this.df_state_id);
                domicilioFiscalFD.append('city', this.df_city_id);
                domicilioFiscalFD.append('street', this.df_street);
                domicilioFiscalFD.append('num_interior', this.df_num_interior);
                domicilioFiscalFD.append('num_exterior', this.df_num_exterior);
                domicilioFiscalFD.append('cp', this.df_cp);
                
                //si ya existe empresa, ok
                if(this.empresaIdProp) {
                    //si ya tiene domicilios registrados, actualizar registros
                    if(this.domicilio_empresa_id && this.domicilio_fiscal_id) {
                        // Primero actualiza domicilio_empresa con los campos del formulario
                        domicilioEmpresaFD.append('id', this.domicilio_empresa_id);
                        this.updateDomicilio(this.domicilio_empresa_id, domicilioEmpresaFD);
                        datosEmpresaFD.append('domicilio_empresa_id', this.domicilio_empresa_id);

                        //si usar mismo domicilio = false >> se trabaja en dos domicilios
                        if (this.mismo_domicilio === false) {
                            domicilioFiscalFD.append('id', this.domicilio_fiscal_id);
                            
                            //si apuntaban al mismo registro, ahora se crea un registro nuevo para dom fiscal,
                            // deben ser dos registros distintos ahora.
                            if(this.domicilio_empresa_id === this.domicilio_fiscal_id){
                                await this.storeDomicilio(domicilioFiscalFD);
                                //auxiliar que retorna el id del domicilio guardado desde la funcion storeDomicilio
                                this.domicilio_fiscal_id = this.id_dom_aux; 
                                datosEmpresaFD.append('domicilio_fiscal_id', this.domicilio_fiscal_id);

                            }else{
                                // De lo contrario, si apuntaban a domicilios diferentes, solo sea actualizan el
                                // dom fiscal referenciado
                                this.updateDomicilio(this.domicilio_fiscal_id, domicilioFiscalFD);
                                datosEmpresaFD.append('domicilio_fiscal_id', this.domicilio_fiscal_id);
                            }
                            
                        } else {
                            // si usar mismo domicilio === true >> se trabaja en un domicilio
                            
                            // si los campos registrados apuntaban al mismo domicilio >> se guardan los campos con el mismo id
                            if (this.domicilio_empresa_id === this.domicilio_fiscal_id) {
                                datosEmpresaFD.append('domicilio_fiscal_id', this.domicilio_empresa_id);
                            } else {
                                // si los campos registrados apuntaban a domicilios diferentes >> se debe dejar solo un domicilio
                                // se borra domicilio_fiscal y se establece domicilio_empresa en ambos campos
                                this.deleteDomicilio(this.domicilio_fiscal_id);
                                datosEmpresaFD.append('domicilio_fiscal_id', this.domicilio_empresa_id);
                                
                                // se registra el nuevo domicilio empresa
                                await this.storeDomicilio(domicilioEmpresaFD);
                                //auxiliar que retorna el id del domicilio guardado mediante la funcion storeDomicilio
                                this.domicilio_fiscal_id = this.id_dom_aux;
                                // PENDIENTE IMPLEMENTAR
                            }
                        }
                    //si aun no hay domicilios registrados, se crearán nuevos registros
                    } else {
                        //se registra el domicilio de la empresa primero
                        await this.storeDomicilio(domicilioEmpresaFD);
                        this.domicilio_empresa_id = this.id_dom_aux;//auxiliar que retorna el id del domicilio guardado desde la función storeDomicilio

                        datosEmpresaFD.append('domicilio_empresa_id', this.domicilio_empresa_id);
                        
                        //si el usuario quiere que ambos domicilios sean diferentes
                        if (this.mismo_domicilio === false) {
                            // validar que aqui no haya error -----------------------
                            await this.storeDomicilio(domicilioFiscalFD);
                            this.domicilio_fiscal_id = this.id_dom_aux;
                            datosEmpresaFD.append('domicilio_fiscal_id', this.domicilio_fiscal_id)
                        //si el usuario quiere que ambos domicilios sean iguales se usa el de la empresa
                        }else{
                            datosEmpresaFD.append('domicilio_fiscal_id', this.domicilio_empresa_id);
                        }
                    }
                    // console.log("------ Imprimiendo datos de empresa -----");
                    // datosEmpresaFD.forEach((valor, clave) => {
                    //     console.log(clave, valor);
                    // });
                    this.updateEmpresa(this.empresaIdProp, datosEmpresaFD);
                    
                //si no existe empresa creada se manda error
                } else {
                    Swal.fire('',`Error aún no se ha creado una empresa`,'error').then(resp => {
                        // location.href = "/"
                    });
                }
            }
        },
        
        updateDomicilio(id, domicilio){
            axios.post('/api/domicilio/'+ id ,domicilio).then(resp => {
                if (resp.data.status) console.log("Domicilio actualizado")
                else Swal.fire('Ocurrio un error',resp.data.msg,'error')
            }).catch(error => {
                if (error.response.status == 422) console.log(resp.response.data.errors);
            })
        },
        updateEmpresa(id, empresa){
            empresa.append('id', this.empresaIdProp);
            
            axios.post('/api/empresa/'+ id ,empresa).then(resp => {
                if (resp.data.status){
                    Swal.fire('',`Información actualizada`,'success').then(resp => {
                        location.href = "/empresa"
                    });
                } else Swal.fire('Ocurrio un error',resp.data.msg,'error')
            }).catch(error => {
                if (error.response.status == 422) console.log(resp.response.data.errors);
            })
        },
        deleteDomicilio(domicilio){
            axios.delete(`/api/domicilio/${domicilio}`).then(resp => {
                if(resp.data.status){
                    // console.out("Registro de domicilio fiscal eliminado");
                }else{
                    Swal.fire(
                        'Ocurrio un error',
                        resp.data.msg,
                        'error'
                    )
                }
            });
        },
        async storeDomicilio(domicilio){
            const resp = await axios.post('/api/domicilio',domicilio).then(resp => {
                this.id_dom_aux = null;
                if(resp.data.status){
                    this.id_dom_aux = resp.data.domicilio.id; //esta variable se utiliza para retornar el valor del id del registro que acaba de ser guardado
                }else{
                    Swal.fire('Ocurrio un error', resp.data.msg,'error')
                }
            }).catch(error => {
                if(resp.response.status == 422){
                    console.error(error);
                }
            })
        }
    }
}

</script>
