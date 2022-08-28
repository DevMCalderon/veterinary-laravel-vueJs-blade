<template>
    <div>
        <table class="table table-sm  table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="citas && citas.length > 0">
                <tr class="btn-reveal-trigger" v-for="cita in citas" :key="cita.id">

                    <td><a :href="`/cliente/${cita.id}`">{{ cita.name }}</a></td>
                    <td>{{ cita.email }}</td>
                    <td>{{ cita.phone }}</td>
                    <td>{{ cita.ciudad.name }}</td>
                    <td>{{ cita.address }}</td>
                    <td class="text-center">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" :href="`/client/${cita.id}/editar`">Editar</a>
                                    <a class="dropdown-item text-danger" @click="confirmDelete(cita)" href="#!">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="6">
                        <p class="text-center" v-if="citas">No hay clientes</p>
                        <p class="text-center" v-else>Cargando...</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="text-right">

        <small>{{ citas.length }} Clientes</small>
        </p>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data(){
        return {
            citas: undefined
        }
    },
    mounted(){
        this.getCitas();
    },
    methods: {
        getCitas(){
            axios.get('/api/citas').then((resp)=>{
                if(resp.data.status){
                    this.citas = resp.data.clients
                }
            });
        },
        confirmDelete(cita){
            Swal.fire({
                html: `¿Desea eliminar el cliente <b>${cita.name}</b>?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deleteCita(cita)
                }
            })
        },
        deleteCita(cita){
            axios.delete(`/api/cita/${cita.id}`).then(resp => {
                if(resp.data.status){
                    Swal.fire(
                        'Eliminado',
                        `La cita de <b>${cita.name}</b> ha sido eliminado`,
                        'success'
                    ).then(resp => {
                        this.getCitas();
                    })
                }else{
                    Swal.fire(
                        'Ocurrio un error',
                        resp.data.msg,
                        'error'
                    )
                }
            });
        }
    }
}
</script>


<style scoped>
    .text-right{
        text-align: right
    }
    .img-product{
        max-width: 80px;

    }
</style>
