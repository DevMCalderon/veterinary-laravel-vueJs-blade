<template>
    <div class="" v-if="">
        <div class="row">
            <div class="col-md-10 mb-3">
                <label for="country">País</label>
                <select id="country" class="form-control" v-model="country_id" :disabled="this.mismoDomicilioProp == true">
                    <option value="" selected disabled>Seleccione</option>
                    <option :value="pais.id" v-for="pais in paises" :key="pais.id">{{ pais.name }}</option>
                </select>
            </div>
        </div>

        <div v-if="(country_id===157)">
            <div class="row">
                <div class="col-md-9 mb-3">
                    <label for="estado">Estado / Provincia</label>
                    <select id="estado" class="form-control" v-model="state_id" @change="changeEstado">
                        <option value="" selected disabled>Seleccione</option>
                        <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 mb-3">
                    <label for="city">Ciudad / Localidad</label>
                    <select id="city" class="form-control" v-model="city_id">
                        <option value="" selected disabled>Seleccione</option>
                        <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div v-else>
            <div class="row">
                <div class="col-md-9 mb-3">
                    <label for="estado">Estado / Provincia</label>
                    <input type="text" name="estado" id="estado" class="form-control" maxlength="60" v-model="estado" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 mb-3">
                    <label for="ciudad">Ciudad / Localidad</label>
                    <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="60" v-model="ciudad" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 mb-3">
                <label for="street">Calle</label>
                <input type="text" name="street" id="street" class="form-control" maxlength="50" v-model="street">
            </div>
        </div>

        <div class="row">
            <div class="col-md-10  mb-3">
                <label for="num_interior">Numero interior</label>
                <input type="tel" name="num_interior" id="num_interior" class="form-control" v-model="num_interior" min="0" maxlength="10">
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 mb-3">
                <label for="num_exterior">Numero exterior</label>
                <input type="tel" name="num_exterior" id="num_exterior" class="form-control" v-model="num_exterior" min="0" maxlength="10">
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 mb-3">
                <label for="cp">Código postal</label>
                <input type="tel" name="cp" id="cp" class="form-control" v-model="cp" min="0" maxlength="10">
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    props: ['empresaIdProp','mismoDomicilioProp'],
    data(){
        return {
            id: undefined,

            country_id: '',
            state_id:'',
            city_id: '',
            cp: '',
            street: '',
            num_interior: '',
            num_exterior: '',
            
            estado:'',
            ciudad:'',
            paises:[],
            estados:[],
            ciudades:[],
        }
    },
    watch:{
        state_id(newVal, oldVal) {
            this.changeEstado();
        },
    },
    mounted() {        
        this.getPais();
        this.getEstado();

        console.log(this.mismoDomicilioProp)

        if(this.empresaIdProp){
            this.getEmpresa(this.empresaIdProp);
        }

    },
    methods: {
        getPais(){
            this.paises = []
            axios.get('/api/pais').then(resp => {
                if(resp.data.status){
                    this.paises = resp.data.countries;
                }else{
                    this.paises = []
                }
            })
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
            this.country_id = '';
            this.state_id = '';
            this.city_id = '';
            this.street = '';
            this.num_interior = '';
            this.num_exterior = '';
            this.cp = '';
        },
        getEmpresa(empresaId){
            // this.clearForm();
            // axios.get(`/api/empresa/${empresaId}`).then(resp => {
            //     if(resp.data.status){
            //         console.log(resp.data.empresa[0])
            //         let aux=resp.data.empresa[0];

            //         if(aux.name==null){
            //             Swal.fire('',`Por favor registra una empresa antes de continuar`,'warning').then(resp => {
            //             });
            //         }


            //         this.street        = aux.street;
            //     }else{
            //         Swal.fire('Ocurrio un error',resp.data.msg,'error')
            //     }
            // }).catch(error => {
            //     console.log({error});
            //     Swal.fire('',"Ocurrio un error al intentar obtener información de la empresa",'error')
            // })

        },
        save(e){
            // e.preventDefault();
            // if(this.$refs.empresaForm.reportValidity()){
            //     console.log(this.logo);
            //     this.errors = undefined;
            //     const formData = new FormData();

            //     formData.append('state', this.state_id);
            //     formData.append('city', this.city_id);

            //     // console.log(this.empresaIdProp);
            //     if(this.empresaIdProp){
            //         formData.append('id', this.empresaIdProp);
            //         this.updateEmpresa(this.empresaIdProp, formData);
            //     }else{
            //         Swal.fire('',`No puedes tener más de una empresa`,'error').then(resp => {
            //             location.href = "/"
            //         });
            //     }
            // }
        },
        updateEmpresa(id, empresa){
            // axios.post('/api/empresa/'+ id ,empresa).then(resp => {
            //     if(resp.data.status){

            //         Swal.fire('',`Información actualizada`,'success').then(resp => {
            //             location.href = "/empresa"
            //         });

            //     }else{
            //         Swal.fire('Ocurrio un error',resp.data.msg,'error')
            //     }
            // }).catch(error => {
            //     if(error.response.status == 422){
            //         this.errors = error.response.data.errors
            //     }
            // })
        },
    }
}

</script>

