<template>
    <form action="" ref="clientForm" @submit="save">

        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="name">Nombre de la empresa</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" v-model="nombre" required>
                            <small class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="logo">Logo</label>
                            <input type="file" @change="onFileChange" name="logo" id="logo" class="form-control" />
                            <!-- <small class="text-danger" v-if="errors && errors.address">{{ errors.address[0] }}</small> -->
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="razon_social">Razón Social</label>
                            <input type="text" name="razon_social" id="razon_social" class="form-control" v-model="razon_social">
                            <small class="text-danger" v-if="errors && errors.razon_social">{{ errors.razon_social[0] }}</small>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="phone">Teléfono</label>
                            <input type="tel" name="phone" id="phone" class="form-control" v-model="phone" min="0" maxlength="10" step="0.01">
                            <small class="text-danger" v-if="errors && errors.phone">{{ errors.phone[0] }}</small>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" class="form-control" v-model="address">
                            <small class="text-danger" v-if="errors && errors.address">{{ errors.address[0] }}</small>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="rfc">RFC</label>
                            <input type="text" name="rfc" id="rfc" class="form-control" v-model="rfc" maxlength="13">
                            <small class="text-danger" v-if="errors && errors.rfc">{{ errors.rfc[0] }}</small>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="estado">Estado</label>
                            <select id="estado" class="form-control" v-model="state_id" @change="changeEstado" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="estado">Ciudad</label>
                            <select id="estado" class="form-control" v-model="city" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
        <hr>

        <div class="text-right">
            <button class="btn btn-sm btn-success ml-3">Guardar</button>

        </div>
    </form>
</template>


<script>
import axios from 'axios';

export default {
    props: ['userId','empresaId'],
    data(){
        return {
            id: undefined,
            nombre: '',
            logo: '',
            razon_social: '',
            phone: '',
            address: '',
            rfc: '',
            state: '',
            city: '',
            state_id:'',
            estados:[],
            ciudades:[],
            errors: undefined,
            image: ''

        }
    },
    watch:{
        state_id(newVal, oldVal) {
            this.changeEstado();
        }

    },
    mounted() {        
        this.getEstado();
        
        if(this.userId){
            if(isEmpresaCreada()==false){
                this.crearEmpresa(formData);
                this.establecerEmpresa(this.userId);
            }else{
                if(this.empresaId){
                    this.getEmpresa(this.empresaId);
                }
            }
        }
        
    },
    methods: {
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
            return;
            this.createImage(files[0]);
        },
        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
            // console.log(file.name)
            this.logo = file.name
        },
        getEstado(){
            this.estados = []
            axios.get('/api/estado').then(resp => {
                if(resp.data.status){
                    this.estados = resp.data.estados;
                }else{
                    this.estados = []
                }
            })
        },
        changeEstado(){
            this.ciudades = []
            axios.get(`/api/ciudades/${this.state_id}`).then(resp => {
                if(resp.data.status){
                    this.ciudades = resp.data.ciudades;
                }else{
                    this.ciudades = []
                }
            })
        },
        clearForm(){
            this.id = undefined;
            this.name = '';
            this.email = '';
            this.phone = '';
            this.city = '';
            this.address = '';
            this.rfc = '';
            this.state_id ='';
        },
        getEmpresa(empresaId){
            this.clearForm();
            axios.get(`/api/client/${empresaId}`).then(resp => {
                if(resp.data.status){
                    this.id          = resp.data.client.id;
                    this.name        = resp.data.client.name;
                    this.email        = resp.data.client.email;
                    this.phone        = resp.data.client.phone;
                    this.city        = resp.data.client.city;
                    this.address        = resp.data.client.address;
                    this.rfc        = resp.data.client.rfc;
                    this.state_id        = resp.data.client.ciudad.state_id;
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                console.log({error});
                Swal.fire('',"Ocurrio un error al intentar obtener información del cliente",'error')
            })

        },
        establecerEmpresa(e){
            e.preventDefault();
            if(this.$refs.clientForm.reportValidity()){
                this.errors = undefined;
                const formData = new FormData();
                formData.append('nombre', this.nombre);
                formData.append('logo', this.logo);
                formData.append('razon_social', this.razon_social);
                formData.append('phone', this.phone);
                formData.append('address', this.address);
                formData.append('rfc', this.rfc);
                formData.append('state', this.state_id);
                formData.append('city', this.city);
                formData.append('admin_id', this.userId);

                if(this.clientId){
                    formData.append('id', this.id);
                    this.updateProduct(this.id, formData);
                }else{
                    Swal.fire('',`No puedes tener más de una empresa`,'error').then(resp => {
                        location.href = "/empresa"
                    });
                }
            }

        },
        save(e){
            e.preventDefault();
            if(this.$refs.clientForm.reportValidity()){
                this.errors = undefined;
                const formData = new FormData();
                formData.append('nombre', this.nombre);
                formData.append('logo', this.logo);
                formData.append('razon_social', this.razon_social);
                formData.append('phone', this.phone);
                formData.append('address', this.address);
                formData.append('rfc', this.rfc);
                formData.append('state', this.state_id);
                formData.append('city', this.city);
                formData.append('admin_id', this.userId);

                if(this.clientId){
                    formData.append('id', this.id);
                    this.updateProduct(this.id, formData);
                }else{
                    Swal.fire('',`No puedes tener más de una empresa`,'error').then(resp => {
                        location.href = "/empresa"
                    });
                }
            }

        },
        updateProduct(id, client){
            axios.post('/api/client/'+ id ,client).then(resp => {
                if(resp.data.status){

                    Swal.fire('',`Información actualizada`,'success').then(resp => {
                        // location.href = "/clientes"
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
        crearEmpresa(empresa){
            axios.post('/api/empresa',empresa).then(resp => {
                // console.log(resp.data);
                if(resp.data.status){
                    const empresaName = resp.data.empresa && resp.data.empresa.name || ""
                    Swal.fire('',
                        `La empresa <b>${empresaName}</b> ha sido agregada`,
                        'success'
                    ).then(resp => {
                        location.href = "/empresa"
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
