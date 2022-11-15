<template>
    <div>
        <table class="table table-sm  table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Encargado</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="sucursals && sucursals.length > 0">
                <tr class="btn-reveal-trigger" v-for="sucursal in sucursals" :key="sucursal.id">
                    
                    <td><a :href="`/sucursal/${sucursal.id}`">{{ sucursal.name }}</a></td>
                    <td class="texto-desborde"><div v-if="!!sucursal.ciudad">{{ sucursal.ciudad.name }}</div></td>
                    <td class="texto-desborde"><div v-if="!!sucursal.address">{{ sucursal.address }}</div></td>
                    <td class="texto-desborde">{{ sucursal.phone }}</td>
                    <td class="texto-desborde">{{ sucursal.email }}</td>
                    <td class="texto-desborde"><div v-if="!!sucursal.encargado">{{ sucursal.encargado.name}}</div></td>
                    <td class="text-center">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" :href="`/sucursal/${sucursal.id}/editar`">Editar</a>
                                    <a class="dropdown-item text-danger" @click="confirmDelete(sucursal)" href="#!">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="7">
                        <p class="text-center" v-if="sucursals">No hay sucursales</p>
                        <p class="text-center" v-else>Cargando...</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="text-end" v-if="sucursals && sucursals.length > 0">
            <small>{{ sucursals.length }} Sucursales</small>
        </p>

    </div>
</template>
<script>
import axios from 'axios'

export default {
    props: ['empresaIdProp'],
    data(){
        return {
            sucursals: undefined,
        }
    },
    mounted(){
        this.get();
        // console.log(this.empresaIdProp);
        // if(this.empresaIdProp){
        //     this.get();
        // }   
    },
    methods: {
        get(){
            axios.get('/api/sucursals').then((resp)=>{
                if(resp.data.status){
                    console.log(resp.data);
                    this.sucursals = resp.data.sucursales
                    console.log(resp.data.sucursales);
                }
            });
        },
        confirmDelete(sucursal){
            Swal.fire({
                html: `¿Desea eliminar la sucursal <b>${sucursal.name}</b>?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.delete(sucursal)
                }
            })
        },
        delete(sucursal){
            axios.delete(`/api/sucursal/${sucursal.id}`).then(resp => {
                if(resp.data.status){
                    Swal.fire(
                        'Eliminado',
                        `La sucursal <b>${sucursal.name}</b> ha sido eliminada`,
                        'success'
                    ).then(resp => {
                        this.get();
                    })
                }else{
                    Swal.fire(
                        'Ocurrio un error',
                        resp.data.msg,
                        'error'
                    )
                }
            });
        },
        loadErorrImage(e){
            console.log({e});
            e.target.src = "/img/image-not-found.png";
        }
    }
}
</script>


<style scoped>
</style>
