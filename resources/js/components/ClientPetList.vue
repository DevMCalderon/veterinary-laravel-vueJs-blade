<template>
    <div>
        <table class="table table-sm  table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th>Nombre</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="clients && clients.length > 0">
                <tr class="btn-reveal-trigger" v-for="client in clients" :key="client.id" v-on="getPetsNames(client.pets)">
                    <td>{{ petsNamesList }} {{clientid}}</td>
                    <td class="text-center">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" :href="`/client/${client.id}/editar`">Editar</a>
                                    <a class="dropdown-item text-danger" @click="confirmDelete(client)" href="#!">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="6">
                        <p class="text-center" v-if="clients">No hay clientes</p>
                        <p class="text-center" v-else>Cargando...</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="text-right">

        <small>{{ clients.length }} Clientes</small>
        </p>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    props: ['client_id'],
    data(){
        return {
            clients: undefined,
            clientid:this.client_id 
        }
    },
    mounted(){
        this.getClients();
    },
    methods: {
         getPetsNames(pets){
            let arrayNombres=[];
            for(let i=0; i<pets.length; i++){
                let unNombre=pets[i].name
                unNombre=unNombre.charAt(0).toUpperCase() + unNombre.slice(1) //mayuscula primera letra
                arrayNombres.push(unNombre)
            }
            this.petsNamesList=arrayNombres.join(', ') //separar por coma 
        },
        getClients(){
            axios.get('/api/clients').then((resp)=>{
                if(resp.data.status){
                    console.log(resp.data);
                    this.clients = resp.data.clients
                }
            });
        },
        confirmDelete(client){
            Swal.fire({
                html: `¿Desea eliminar el cliente <b>${client.name}</b>?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deleteClient(client)
                }
            })
        },
        deleteClient(client){
            axios.delete(`/api/client/${client.id}`).then(resp => {
                if(resp.data.status){
                    Swal.fire(
                        'Eliminado',
                        `El cliente <b>${client.name}</b> ha sido eliminado`,
                        'success'
                    ).then(resp => {
                        this.getClients();
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


