<template>
    <div class="container py-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle table-bordered shadow-sm">
                <thead class="table-header-bg">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Ciudad</th>
                        <th>Mascotas</th>
                        <th>Dirección</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody v-if="clients && clients.length > 0">
                    <tr v-for="client in clients" :key="client.id">
                        <td><a :href="`/cliente/${client.id}`" class="text-decoration-none fw-semi-bold text-primary">{{ client.name }}</a></td>
                        <td class="text-truncate" style="max-width: 150px;">{{ client.email }}</td>
                        <td>{{ client.phone }}</td>
                        <td>{{ client.ciudad?.name || '-' }}</td>
                        <td class="text-center">
                            <span v-if="client.pets.length > 1" class="badge bg-primary">{{ client.pets.length }}</span>
                            <span v-else>{{ client.pets.length ? truncateText(client.pets[0].name, 15) : '0' }}</span>
                        </td>
                        <td>{{ client.address }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" :href="`/client/${client.id}/editar`"><i class="fas fa-edit me-2"></i>Editar</a></li>
                                    <li><a class="dropdown-item text-danger" @click="confirmDelete(client)" href="#"><i class="fas fa-trash-alt me-2"></i>Eliminar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="7" class="text-center py-3 bg-light">
                            <p class="fw-bold text-muted" v-if="clients">No hay clientes</p>
                            <p class="fw-bold text-muted" v-else>Cargando...</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-end text-muted fw-bold" v-if="clients?.length">
            <small>{{ clients.length }} Clientes</small>
        </p>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            clients: undefined,
        };
    },
    mounted() {
        this.getClients();
    },
    methods: {
        getClients() {
            axios.get('/api/clients').then((resp) => {
                if (resp.data.status) {
                    this.clients = resp.data.clients;
                }
            });
        },
        confirmDelete(client) {
            Swal.fire({
                html: `¿Desea eliminar el cliente <b>${client.name}</b>?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deleteClient(client);
                }
            });
        },
        deleteClient(client) {
            axios.delete(`/api/client/${client.id}`).then((resp) => {
                if (resp.data.status) {
                    Swal.fire('Eliminado', `El cliente <b>${client.name}</b> ha sido eliminado`, 'success').then(() => {
                        this.getClients();
                    });
                } else {
                    Swal.fire('Error', resp.data.msg, 'error');
                }
            });
        },
        truncateText(text, length) {
            return text.length > length ? text.substring(0, length) + '...' : text;
        },
    },
};
</script>

<style scoped>

</style>
