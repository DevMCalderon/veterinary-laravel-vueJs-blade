<template>
    <div class="">
        <label class="">{{ title }}</label>
        <small>(Escriba al menos 3 caracteres)</small>
        <input type="text" class="form-control form-control-sm" id="search" autocomplete="off" @keyup="buscarCliente" ref="search" placeholder="Escriba el nombre del cliente para realizar la búsqueda">

        <div v-if="clients.length>0">
            <a class='list-group-item list-group-item-action cursor-pointer bg-warning' @click="newClient" v-if="allowNew">
                Nuevo cliente
            </a>
            <a class='list-group-item list-group-item-action cursor-pointer' v-for="client in clients" :key="client.id" @click="select(client)">
                {{ client.name }}
            </a>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { eventBus } from '../EventBus.js'

export default {
    props: ['titleProp', 'allowNew'],
    data() {
        return {
            title: 'Buscar cliente',
            clients: [],
        }
    },
    mounted() {
        if (this.titleProp) {
            this.title = this.titleProp;
        }
    },
    methods: {
        buscarCliente(e) {
            const name    = this.$refs.search.value;
            this.clients  = [];
            
            if (name != "" && name.length >= 3) {
                const payload = {
                    name: name
                }
                axios.post(`/clients/search`, payload).then((resp) => {
                    if(resp.data.status){
                        this.clients = resp.data.clients;
                    }
                })
            }
        },
        select(client) {
            this.clients = [];
            this.$refs.search.value = client.name;
            eventBus.$emit('setClient', client);
        },
        newClient(){
            this.clients = [];
            this.$refs.search.value = "";
            eventBus.$emit('clearClient');
        }
    }
}
</script>

<style scoped>
.list-group-item{
    padding: 5px 11px;
    font-size: 0.9em;
}

</style>