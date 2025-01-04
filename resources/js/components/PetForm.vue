<template>
    <form action="" ref="petForm" @submit="save">
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="name">Nombre de la mascota</label>
                    <input type="text" name="name" id="name" class="form-control" v-model="name" required>
                    <small class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" v-model="fecha_nacimiento" required>
                    <small class="text-danger" v-if="errors && errors.fecha_nacimiento">{{ errors.fecha_nacimiento[0] }}</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="pet_type_id">Tipo de mascota</label>
                     <select id="pet_type_id" class="form-control" v-model="pet_type_id" required>
                        <option value="" selected disabled>Seleccione</option>
                        <option :value="typePet.id" v-for="typePet in pet_type" :key="typePet.id">{{ typePet.name }}</option>
                    </select>
                    <small class="text-danger" v-if="errors && errors.pet_type_id">{{ errors.pet_type_id[0] }}</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="raza_id">Raza</label>
                    <select id="raza_id" class="form-control" v-model="raza_id" required>
                        <option value="" selected disabled>Seleccione</option>
                        <option :value="razaPet.id" v-for="razaPet in raza_type" :key="razaPet.id">{{ razaPet.name }}</option>
                    </select>
                    <small class="text-danger" v-if="errors && errors.raza_id">{{ errors.raza_id[0] }}</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="color">Color</label>
                    <input type="text" name="color" id="color" class="form-control" v-model="color" required>
                    <small class="text-danger" v-if="errors && errors.color">{{ errors.color[0] }}</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="alergias">Alergias</label>
                    <input type="text" name="alergias" id="alergias" class="form-control" v-model="alergias" required>
                    <small class="text-danger" v-if="errors && errors.alergias">{{ errors.alergias[0] }}</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="comentarios">Comentarios</label>
                    <input type="text" name="comentarios" id="comentarios" class="form-control" v-model="comentarios">
                    <small class="text-danger" v-if="errors && errors.comentarios">{{ errors.comentarios[0] }}</small>
                </div>
            </div>
            <hr>

            <div class="text-right">

                <a type="button" class="btn btn-sm btn-secondary mr-5" :href="`/cliente/${clientId}`">Cancelar</a>
                <button class="btn btn-sm btn-success ml-3">Guardar</button>

            </div>
        </form>
</template>


<script>
import axios from 'axios';

export default {
    props: ['petId','clientId'],
    data(){
        return {
            id: undefined,
            name: '',
            fecha_nacimiento: '',
            color: '',
            comentarios: '',
            alergias: '',
            pet_type_id: '',
            raza_id: '',
            pet_type:[],
            raza_type:[],
            errors: undefined
           
        }
    },
    mounted() {
        this.getPetType();
        // this.razaType();

        if(this.petId){
            this.getPet(this.petId);
        }
    },
    watch:{
        pet_type_id(newVal, oldVal) {
            this.razaType();
        }

    },
    methods: {
        getPetType(){
            this.pet_type = []
            axios.get('/api/petType').then(resp => {
                if(resp.data.status){
                    this.pet_type = resp.data.pet_type;
                }else{
                    this.pet_type = []
                }
            })
        },
        razaType(){
            this.raza_type = []
            axios.get(`/api/razaType/${this.pet_type_id}`).then(resp => {
                if(resp.data.status){
                    this.raza_type = resp.data.raza_type;
                }else{
                    this.raza_type = []
                }
            })

        },
        clearForm(){
            this.id = undefined;
            this.name = "";
            this.fecha_nacimiento = "";
            this.color = "";
            this.comentarios = "";
            this.alergias = "";
            this.pet_type_id = "";
            this.raza_id = "";
        },
        getPet(petId){
            this.clearForm();
            axios.get(`/api/pet/${petId}`).then(resp => {
                if(resp.data.status){
                    this.id          = resp.data.pet.id;
                    this.name = resp.data.pet.name;
                    this.fecha_nacimiento = resp.data.pet.fecha_nacimiento;
                    this.color = resp.data.pet.color;
                    this.comentarios = resp.data.pet.comentarios;
                    this.alergias = resp.data.pet.alergias;
                    this.pet_type_id = resp.data.pet.pet_type_id;
                    this.raza_id = resp.data.pet.raza_id;
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                console.log({error});
                Swal.fire('',"Ocurrio un error al intentar obtener información de la mascota",'error')
            })

        },
        save(e){
            e.preventDefault();
            if(this.$refs.petForm.reportValidity()){
                this.errors = undefined;
                const formData = new FormData();
                formData.append('name', this.name);
                formData.append('fecha_nacimiento', this.fecha_nacimiento);
                formData.append('color', this.color);
                formData.append('comentarios', this.comentarios);
                formData.append('alergias', this.alergias);
                formData.append('pet_type_id', this.pet_type_id);
                formData.append('raza_id', this.raza_id);
                
                if(this.petId){
                    formData.append('id', this.id);
                    this.updatePet(this.id, formData);
                }else{
                    formData.append('client_id', this.clientId);

                    this.storePet(formData);
                }
            }

        },
        updatePet(id, pet){
            axios.post('/api/pet/'+ id ,pet).then(resp => {
                if(resp.data.status){
                    const petName = resp.data.pet && resp.data.pet.name || "";

                    Swal.fire('',`Información actualizada`,'success').then(resp => {
                        location.href = "/cliente/"+this.clientId
                    });

                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data.errors
                }
            })
        },
        storePet(pet){
            axios.post('/api/pet',pet).then(resp => {
                if(resp.data.status){
                    const petName = resp.data.pet && resp.data.pet.name || "";
                    Swal.fire('',
                        `La mascota <b>${petName}</b> ha sido agregado`,
                        'success'
                    ).then(resp => {
                        location.href = "/cliente/"+this.clientId
                    })
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data.errors
                }
            })
        }
    },
}
</script>

<style>
    .text-right{
        text-align: right;
    }
</style>
