<template> 
    <div class="card pb-4">
        <div class="card-header pb-0 row">
            <a href="/">
                <button type="button" class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    <span></span>
                </button>
            </a>
            
            <h2 class="text-primary fs-1 text-center">Información de empresa</h2>
    
        </div>

        <hr/>

        <div class="card-body px-8 py-0" v-if="empresa">
            <div class="row">

                <div class="d-flex justify-content-between">
                    <h5 class="sub-categoria-titulo text-start">Empresa</h5>
                    <a href="/empresa/editar" class="btn btn-secondary btn-sm">Editar</a>
                </div>

                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="nombre" class="text-secondary">Nombre</label>
                    <label class=" texto-datos">
                        {{empresa.nombre}}
                    </label>
                </div>

                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="logo" class="text-secondary">Logo</label>
                    <label class=" texto-datos">
                        {{empresa.logo}}
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
                    <label class=" texto-datos" v-if="empresa.estado !=null && empresa.estado.name">
                        {{empresa.estado.name}}
                    </label>
                </div>
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="city">Ciudad</label>
                    <label class=" texto-datos" v-if="empresa.ciudad !=null && empresa.ciudad.name">
                        {{empresa.ciudad.name}}
                    </label>
                </div>  
            </div>

            <hr/>

            <div class="row">
                <div class="d-flex justify-content-between">
                    <h5 class="sub-categoria-titulo text-start">Usuario Administrador</h5>
                    <a href="" class="btn btn-secondary btn-sm">Editar</a>
                </div>

                <div class="d-flex justify-content-between" v-if="empresa.user_admin !=null">
                    <div class="col-md-10 col-lg-6 mb-3">
                        <label for="admin_nombre">Nombre</label>
                        <label class=" texto-datos">
                            {{ empresa.user_admin.name }}
                        </label>
                        
                    </div>
                    <div class="col-md-10 col-lg-6 mb-3" >
                        <label for="admin_email">Correo</label>
                        <label class=" texto-datos">
                            {{ empresa.user_admin.email }}
                        </label>
                    </div>  
                </div>
                <div v-else>
                    <p class="text-center">No asignado</p>
                </div>
            </div>
        </div>
        <div class="card-body px-8 py-0 " v-else>
            <div class="card-header pb-5 row">
                <div class="text-center">
                    <div v-if="this.empresaIdProp==''">
                        <p>No hay empresa creada</p>
                        <a href="" class="btn btn-primary btn-sm">Crear</a>
                    </div>
                    <div v-else>
                        <p class="text-center">Cargando...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    props: ['empresaIdProp'],
    data(){
        return {
            empresa: ''
        }
    },
    mounted() {      
        console.log(this.empresaIdProp)
        console.log("a")
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

