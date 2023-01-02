<template>
    <form ref="empresaForm" @submit="save" method="POST" action="" enctype="multipart/form-data">

        <div class="container mx-4">
            <div class="row align-items-start">
                
                <div class="col-5">

                    <div class="row">
                        <div class="col-md-10 mb-3">
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
                        <div class="col-md-10 mb-3">
                            <label>Datos de facturación</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="razon_social">Razón Social</label>
                            <input type="text" name="razon_social" id="razon_social" class="form-control" maxlength="50" v-model="razon_social">
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="rfc">RFC</label>
                            <input type="tel" name="rfc" id="rfc" class="form-control" v-model="rfc" maxlength="13">
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
                            <input type="checkbox" id="mismo_domicilio_fiscal" class="form-check-input" v-model="mismo_domicilio_fiscal"/> 
                            <label for="mismo_domicilio_fiscal ">La dirección de facturación es la misma que la de la empresa</label>
                            </div>
                        </div>
                    </div>

                    <!-- <div v-if="this.mismo_domicilio_fiscal==false"> -->
                    <div v-if="this.empresaIdProp">
aaa
                    </div>
  
                    
                </div>
                
                
                <div class="col-6">
                    <div class="row">
                        <div class="col-md">
                            <label class="titulo_pagina">
                                Editar datos de empresa
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label class="nombre_empresa text-dark" v-if="name"> {{name | truncate(28)}}</label>
                            <label class="nombre_empresa text-dark" v-else>Sin nombre</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="name">Nombre de empresa*</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control" maxlength="40" v-model="name" required>
                                <!-- <div class="input-group-text" v-text="(40 - name.length)"></div> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="phone">Teléfono</label>
                            <input type="tel" name="phone" id="phone" class="form-control" v-model="phone" min="0" maxlength="10">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="email">Correo</label>
                            <input type="text" name="email" id="email" class="form-control" maxlength="50" v-model="email">
                        </div>
                    </div>

                    aaaa

                    
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
            mismo_domicilio_fiscal: '',
            name: '',
            phone: '',
            email: '',

            img: null,
            name_substr:'',
        }
    },
    filters: {
        truncate: function(data,num){
            let reqdString
            if(data.length>num){
                reqdString = 
                  data.split("").slice(0, num).join("")+'...';
            }else{
                reqdString = data;
            }
            return reqdString;
        }
    },
    mounted() {        
        this.img =this.imgEmpresaProp;
        if(this.empresaIdProp){
            this.getEmpresa(this.empresaIdProp);
        }        
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.img = URL.createObjectURL(file);
        },
        clearForm(){
            this.id = undefined;

            this.logo = '';
            this.razon_social = '';
            this.rfc = '';
            this.mismo_domicilio_fiscal = '';
            this.name = '';
            this.phone = '';
            this.email = '';
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

                    this.logo        = aux.logo;
                    this.razon_social= aux.razon_social;
                    this.rfc        =aux.rfc;

                    this.name        = aux.name;
                    this.phone        = aux.phone;
                    this.email        = aux.email;


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
                formData.append('logo', this.logo);
                formData.append('razon_social', this.razon_social);
                formData.append('rfc', this.rfc);

                formData.append('name', this.name);
                formData.append('phone', this.phone);
                formData.append('email', this.email);

                formData.append('admin_id', this.userIdProp);
                formData.append('domicilio_empresa_id', 1);
                formData.append('domicilio_fiscal_id', 1);

                for (const [key, value] of formData.entries()) {
                    console.log(key, value);
                }


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

