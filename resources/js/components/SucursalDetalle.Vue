<template>
    <div class="card pb-4">
        <div class="card-header pb-0 row">
            <a href="/sucursals">
                <button type="button" class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    <span></span>
                </button>
            </a>
            <h2 class="text-primary fs-1 text-center">Información de sucursal</h2>
            <label class="registro-nombre  text-secundary text-center" v-if="sucursal.name!=null">{{ sucursal.name }}</label>
        </div>

        <hr/>
    
        <div class="card-body px-8 py-0" v-if="sucursal">
            <div class="row ">
    
                <h5 class="sub-categoria-titulo text-start">Contacto</h5>
    
                <div class=" d-flex justify-content-between">
                </div>
    
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="name" class="text-secondary">Nombre</label>
                    <label class=" texto-datos" v-if="sucursal.name!=null">
                        {{ sucursal.name }}
                    </label>
                </div>
    
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="state">Estado</label>
                    <label class=" texto-datos"  v-if="sucursal.estado!=null">
                        {{ sucursal.estado.name }}
                    </label>
                </div>
    
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="city">Ciudad</label>
                    <label class=" texto-datos" v-if="sucursal.ciudad!=null">
                        {{ sucursal.ciudad.name }}
                    </label>
                </div>
    
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="address">Dirección</label>
                    <label class=" texto-datos">
                        {{ sucursal.address }}
                    </label>
                </div>
    
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="phone">Teléfono</label>
                    <label class=" texto-datos">
                        {{ sucursal.phone }}
                    </label>
                </div>
    
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="email" class="text-secondary">Correo</label>
                    <label class=" texto-datos">
                        {{ sucursal.email }}
                    </label>
                </div>
            </div>
    
            <hr/>
    
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h5 class="sub-categoria-titulo text-start">Usuario Encargado</h5>
                    <a href="" class="btn btn-secondary btn-sm">Editar</a>
                </div>
    
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="encargado_id">Nombre</label>
                    <label class=" texto-datos">
                        <div v-if="sucursal.encargado !=null">
                            {{ sucursal.encargado.name }}
                        </div>
                        <div v-else>
                            <p class="text-center">No asignado</p>
                        </div>
                    </label>
                </div>
    
            </div>
        </div>
        <div v-else>
            <p class="text-center">Cargando...</p>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    props: ['empresaIdProp'],
    data(){
        return {
            sucursal: ''
        }
    },
    mounted() {      
        if(this.empresaIdProp){
            this.getData(this.empresaIdProp);
        }        
    },
    methods: {
        getData(empresaId){
            axios.get(`/api/sucursal/${empresaId}`).then(resp => {
                if(resp.data.status){
                    this.sucursal = resp.data.sucursal[0]
                    console.log(resp.data.sucursal[0])
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                console.log({error});
                Swal.fire('',"Ocurrio un error al intentar obtener información de la sucursal",'error')
            })

        },
    }
}
</script>

