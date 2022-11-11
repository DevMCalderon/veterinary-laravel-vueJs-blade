<template>

                   
    <div class="card-body px-8 py-0 ">
        <div class="row" v-if="empresa">

            <div class="d-flex justify-content-between">
                <h5 class="sub-categoria-titulo text-start">Empresa</h5>
                <a href="/empresa/editar" class="btn btn-secondary btn-sm">Editar</a>
            </div>

            <div class="col-md-10 col-lg-6 mb-3">
                <label for="logo" class="text-secondary">Logo</label>
                <label class=" texto-datos">
                    {{empresa.logo}}
                </label>
            </div>
            
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="nombre" class="text-secondary">Nombre</label>
                <label class=" texto-datos">
                    {{empresa.nombre}}
                </label>
            </div>

            <div class="col-md-10 col-lg-6 mb-3">
                <label for="razon_social" class="text-secondary">Razon social</label>
                <label class=" texto-datos">
                    {{empresa.razon_social}}
                    
                </label>
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="phone">Teléfono</label>
                <label class=" texto-datos">
                    {{empresa.phone}}
                </label>
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="address">Dirección</label>
                <label class=" texto-datos">
                    {{empresa.address}}
                </label>
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">RFC</label>
                <label class=" texto-datos">
                    {{empresa.rfc}}
                </label>
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="state">Estado</label>
                <label class=" texto-datos" v-if="empresa.estado.name">
                    {{empresa.estado.name}}
                </label>
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="city">Ciudad</label>
                <label class=" texto-datos" v-if="empresa.ciudad.name">
                    {{empresa.ciudad.name}}
                </label>
            </div>  
        </div>

        <hr/>

        <div class="row" v-if="empresa.user_admin">
            <div class="d-flex justify-content-between">
                <h5 class="sub-categoria-titulo text-start">Usuario Administrador</h5>
                <a href="" class="btn btn-secondary btn-sm">Editar</a>
            </div>


                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="city">Nombre</label>
                    <label class=" texto-datos">
                        {{ empresa.user_admin.name }}
                    </label>
                    
                </div>
                <div class="col-md-10 col-lg-6 mb-3" >
                    <label for="city">Correo</label>
                    <label class=" texto-datos">
                        {{ empresa.user_admin.email }}
                    </label>
                </div>  
            </div>
           
        
    </div>

</template>


<script>
import axios from 'axios';

export default {
    props: ['userIdProp','empresaIdProp'],
    data(){
        return {
            empresa: ''
        }
    },
    mounted() {      
        if(this.empresaIdProp){
            this.getEmpresa(this.empresaIdProp);
        }        
    },
    methods: {
        getEmpresa(empresaId){
            axios.get(`/api/empresa/${empresaId}`).then(resp => {
                if(resp.data.status){
                    this.empresa = resp.data.empresa[0]
                    console.log(resp.data.empresa[0])
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                console.log({error});
                Swal.fire('',"Ocurrio un error al intentar obtener información de la empresa",'error')
            })

        },
    }
}
</script>

