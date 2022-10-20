<template>
    <div>
        <table class="table table-sm  table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Raza</th>
                    <th>Color</th>
                    <!-- <th>Alergias</th> -->
                    <th>Fecha nacimiento</th>
                    <!-- <th>Comentarios</th> -->
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="pets && pets.length > 0">
                <tr class="btn-reveal-trigger" v-for="pet in pets" :key="pet.id">
                    <td>
                        <a :href="`/pet/detalle/${pet.id}`">
                            {{ pet.name }}
                        </a>
                    </td>
                    <td>{{ pet.tipo_mascota.name }}</td>
                    <td>
                        <div v-if="pet.tipo_raza !=null">
                            {{ pet.tipo_raza.name }}
                        </div>
                    </td>
                    <td>{{ pet.color }}</td>
                    <!-- <td>{{ pet.alergias}}</td> -->
                    <td>{{ pet.fecha_nacimiento }}</td>
                    <!-- <td>{{ pet.comentarios}}</td> -->
                    <td class="text-center">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" :href="`/pet/${pet.id}/editar`">Editar</a>
                                    <a class="dropdown-item text-danger" @click="confirmDelete(pet)" href="#!">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="8">
                        <p class="text-center" v-if="pets">No hay mascotas</p>
                        <p class="text-center" v-else>Cargando...</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="text-right">

        <small>{{ pets.length }} Mascotas</small>
        </p>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    props: ['client_id'],
    data(){
        return {
            pets: undefined,
            clientid:this.client_id
        }
    },
    mounted(){
        this.getPets();
    },
    methods: {
        getPets(){
            axios.get(`/api/client/${this.client_id}/pets`).then((resp)=>{
                if(resp.data.status){
                    console.log(resp.data.pets);
                    this.pets = resp.data.pets
                    // console.log(this.clientid);
                    // console.log(this.pets);
                }
            });
        },
        confirmDelete(pet){
            Swal.fire({
                html: `¿Desea eliminar la mascota <b>${pet.name}</b>?`,
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
                        `La mascota <b>${pet.name}</b> ha sido eliminada`,
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
        },
        loadErorrImage(e){
            console.log({e});
            e.target.src = "/img/image-not-found.png";
        }
    }
}
</script>


