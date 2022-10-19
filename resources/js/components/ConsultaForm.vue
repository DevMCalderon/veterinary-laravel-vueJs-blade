<template>
    <form @submit="save">
        <div class="d-flex justify-content-between mb-3 mt-3">
            <h5>Consulta</h5>
            <button class="btn btn-primary btn-sm">Guardar</button>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <p>Paciente</p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Dueño</label>
                            <input type="text" class="form-control form-control-sm" disabled v-model="client.name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Mascota</label>
                            <select class="form-control form-control-sm" v-model="pet">
                                <option value="">Seleccione</option>
                                <option :value="pet" v-for="(pet, index) in client.pets" :key="index">{{ pet.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha nacimiento <span
                                    v-if="pet && pet.fecha_nacimiento">({{petAge}})</span></label>
                            <input type="date" class="form-control form-control-sm" v-model="pet.fecha_nacimiento">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <p>Exploración clínica</p>
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-1">
                        <div class="form-group">
                            <label for="">Peso (kg)</label>
                            <input type="text" class="form-control form-control-sm" v-model="peso">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-1">
                        <div class="form-group">
                            <label for="">Temperatura (°C)</label>
                            <input type="text" class="form-control form-control-sm" v-model="temp">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-1">
                        <div class="form-group">
                            <label for="">Mucosas</label>
                            <input type="text" class="form-control form-control-sm" v-model="mucosas">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-1">
                        <div class="form-group">
                            <label for="">Palpación abdominal</label>
                            <input type="text" class="form-control form-control-sm" v-model="palpitacion_abdominal">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <p>Sintomas</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="" id="" class="form-control form-control-sm w-100   " rows="3"
                                v-model="sintomas"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <p>Diagnostico</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="" id="" class="form-control form-control-sm w-100   " rows="3"
                                v-model="diagnostico"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-3">
            <div class="card-body">
                <p>Receta</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="" id="" class="form-control form-control-sm w-100" rows="3"
                                v-model="receta"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mb-3 mt-3">
            <button class="btn btn-primary btn-sm">Guardar</button>
        </div>
    </form>
</template>


<script>
import axios from 'axios';
import utils from '../utils'

export default {
    props:['clientId'],
    data() {
        return {
            client: {
                name: "",
                pets: [
                ]
            },
            pet: '',

            peso: "",
            temp: "",
            mucosas: "",
            palpitacion_abdominal: "",
            sintomas: "",
            diagnostico: "",
            receta: ""
        }
    },
    mounted(){
        if(this.clientId){
            this.getClient(this.clientId);
        }
    },
    methods: {
        getClient(clientId){
            axios.get(`/api/client/${clientId}`).then(resp => {
                if(resp.data.status){
                    this.client = resp.data.client;
                }
            }).catch(error => {
            })

        },
        save(e) {
            e.preventDefault();
            const payload = {
                client: this.client.id,
                pet: this.pet.id,
                peso: this.peso,
                temp: this.temp,
                mucosas: this.mucosas,
                palpitacion_abdominal: this.palpitacion_abdominal,
                sintomas: this.sintomas,
                diagnostico: this.diagnostico,
                receta: this.receta,
            }

            axios.post(`/api/consulta`, payload).then(resp => {
                if (resp.data.status) {
                    alert(resp.data.msg)
                    location.href='/listEspera';
                } else {
                    alert(resp.data.msg)
                }
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors
                } else {
                    alert("ocurrio un error")
                }
            })
        }
    },
    computed: {
        petAge() {
            const edad = utils.edad(this.pet.fecha_nacimiento);
            return (edad) ? `${edad.years} años, ${edad.months} meses` : ""
        }

    }
}

</script>
