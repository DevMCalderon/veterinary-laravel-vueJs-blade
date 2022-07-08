<template>
    <div>
        <div v-if="pets.length">
            <div class="fs--1 col-md-4" style="display: inline-block;" v-for="pet in pets" v-bind:key="pet.id">
                <a class="notification" :href="`/pet/${pet.id}`">
                
                    <div class="notification-avatar">
                        <div class="avatar avatar-2xl me-3">
                            <img class="rounded-circle" src="https://placedog.net/640/480?r" alt="" />
                        </div>
                    </div>
                    <div class="notification-body">
                        <p class="mb-1"><strong>{{ pet.name }}</strong> ({{ pet.tipo_mascota.name }})</p>
                        <span class="notification-time">
                            {{ pet.tipo_raza.name }}
                        </span>
                    </div>
                    <div class="dropdown font-sans-serif position-static">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-0">
                            <div class="bg-white py-2">
                                <a class="dropdown-item" :href="`/pet/${pet.id}/editar`">Editar</a>
                                <a class="dropdown-item text-danger" @click="confirmDelete(pet)" href="#!">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div v-else>
            Sin mascotas registradas
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    props:['idClient'],
    data(){
        return {
            pets: undefined
        }
    },
    mounted(){
        this.getPets();
    },
    methods: {
        getPets(){
            axios.get(`/api/pets/${this.idClient}`).then((resp)=>{
                if(resp.data.status){
                    this.pets = resp.data.pets
                }
            });
        },
        confirmDelete(pet){
            Swal.fire({
                html: `¿Desea eliminar la mascota<b> ${pet.name}</b>?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deletePet(pet)
                }
            })
        },
        deletePet(pet){
            axios.delete(`/api/pet/${pet.id}`).then(resp => {
                if(resp.data.status){
                    Swal.fire(
                        'Eliminado',
                        `La mascota <b>${pet.name}</b> ha sido eliminado`,
                        'success'
                    ).then(resp => {
                        this.getPets();
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
