<template>
    <div>
        <div class="row mb-3">
            <label for="">Llegada</label>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Fecha</label>
                    <input type="date" class="form-control form-control-sm" aria-label="Fecha" v-model="date"
                        :disabled="datetimeDisabled">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Hora</label>
                    <input type="time" class="form-control form-control-sm" aria-label="Hora" v-model="time"
                        :disabled="datetimeDisabled">
                </div>
            </div>
        </div>
        <label for="">Cliente</label>
        <div class="row mb-2">
            <div class="col-md-3">
                <label for="">Tipo de cliente</label>
                <select class="form-control form-control-sm" @change="setTypeClient" v-model="clientType">
                    <option value="nuevo">Nuevo</option>
                    <option value="existente">Buscar cliente</option>
                </select>
            </div>
            <div class="col-md-3" v-if="clientType == 'existente'">
                <search-client></search-client>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control form-control-sm" id="name" v-model="client.name" autocomplete="off">
                    <small class="text-danger" v-if="errors && errors['client.name']">{{errors['client.name'][0]}}</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control form-control-sm" id="phone" v-model="client.phone" autocomplete="off">
                    <small class="text-danger" v-if="errors && errors['client.phone']">{{errors['client.phone'][0]}}</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control form-control-sm" id="email" v-model="client.email" autocomplete="off">
                    <small class="text-danger" v-if="errors && errors['client.email']">{{errors['client.email'][0]}}</small>
                </div>
            </div>
        </div>
        <hr class="mt-4">

        <div class="d-flex justify-content-end">
            <button class="btn btn-sm btn-secondary mx-3">Cancelar</button>
            <button class="btn btn-sm btn-success" @click="save">Guardar</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import { eventBus } from '../EventBus.js'

export default {
    props: ['dateProp', 'timeProp', 'datetimeDisabledProp'],
    data() {
        return {
            client: {
                name: '',
                phone: '',
                email: '',
            },
            date: '',
            time: '',
            datetimeDisabled: false,
            clientType: 'nuevo',

            errors: []
        }
    },
    mounted() {
        if (this.dateProp) {
            this.date = this.dateProp;
        }

        if (this.timeProp) {
            this.time = this.timeProp;
        }
        console.log({ datetimeDisabledProp: this.datetimeDisabledProp });

        if (this.datetimeDisabledProp) {
            this.datetimeDisabled = this.datetimeDisabledProp == 'true' ? true : false;
        }

        eventBus.$on('setClient', client => {
            this.client = client;
        });
        eventBus.$on('clearClient', () => {
            this.clearClient();
        });
    },
    methods: {
        clearClient() {
            this.client = {
                name: '',
                phone: '',
                email: '',
            };
        },
        setTypeClient() {
            this.clearClient();
        },
        save() {
            const { name, phone, email } = this.client;
            const payload = {
                date: this.date,
                time: this.time,
                clientType: this.clientType,
                client_id: this.client.id,
                client: {
                    name,
                    phone,
                    email
                }
            }

            axios.post(`/api/waiting-list`, payload).then(response => {
                if (response.data.status) {
                    Swal.fire({
                        title: 'Guardado',
                        text: 'Se ha guardado correctamente',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                }
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ha ocurrido un error',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            });
        }
    }
}
</script>