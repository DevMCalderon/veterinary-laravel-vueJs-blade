<template>
    <form action="" ref="productForm" @submit="save">
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="name">Nombre de producto</label>
                    <input type="text" name="product_name" id="name" class="form-control" v-model="name" required>
                    <small class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</small>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="name">Código de producto</label>
                    <input type="text" id="name" class="form-control" v-model="code" required>
                    <small class="text-danger" v-if="errors && errors.code">{{ errors.code[0] }}</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="name">Precio</label>
                    <input type="number" id="name" class="form-control" v-model="price" min="0" step="0.01">
                    <small class="text-danger" v-if="errors && errors.price">{{ errors.price[0] }}</small>
                </div>
            </div>


            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="category">Categoria</label>
                    <select id="category" class="form-control" v-model="category_id" required>
                        <option value="" selected disabled>Seleccione</option>
                        <option :value="category.id" v-for="category in categories" :key="category.id">{{ category.name }}</option>
                    </select>
                    <small class="text-danger" v-if="errors && errors.category_id">{{ errors.category_id[0] }}</small>
                </div>
            </div>


            <div class="row">
                <div class="col-md-10 col-lg-6 mb-3">
                    <label for="image">Imagen</label><br>
                    <input type="file" name="" id="image" @change="localSave" ref="image">
                    <small class="text-danger" v-if="errors && errors.image">{{ errors.image[0] }}</small>
                </div>
            </div>


            <hr>

            <div class="text-right">

                <button type="button" class="btn btn-sm btn-secondary mr-5">Cancelar</button>
                <button class="btn btn-sm btn-success ml-3">Guardar</button>

            </div>
        </form>
</template>


<script>
import axios from 'axios';

export default {
    data(){
        return {
            name: '',
            code: '',
            price: '0',
            image: undefined ,
            category_id : '',

            categories:[],
            errors: undefined
           
        }
    },
    mounted() {
        this.getCategory();
    },
    methods: {
        localSave(){
            if(this.$refs.image.files.length > 0 ){
                this.image = this.$refs.image.files[0];
            }else{
                this.image = undefined;
            }
        },
        getCategory(){
            this.categories = []
            axios.get('/api/categories').then(resp => {
                if(resp.data.status){
                    this.categories = resp.data.categories;
                }else{
                    this.categories = []
                }
            })
        },
        save(e){
            e.preventDefault();
            if(this.$refs.productForm.reportValidity()){
                this.errors = undefined;
                const formData = new FormData();
                formData.append('image', this.image);
                formData.append('name', this.name);
                formData.append('code', this.code);
                formData.append('price', this.price);
                formData.append('category_id', this.category_id);

                axios.post('/api/product',formData).then(resp => {
                    if(resp.data.status){
                        const productName = resp.data.product && resp.data.product.name || "";
                        Swal.fire(
                            '',
                            `El producto <b>${productName}</b> ha sido agregado`,
                            'success'
                        ).then(resp => {
                            location.href = "/productos"
                        })
                    }else{
                        Swal.fire('Ocurrio un error',resp.data.msg,'error')
                    }
                }).catch(error => {
                    const errorStatus = error.response.status;
                    if(errorStatus == 422){
                        console.log("errorStatus: 422");
                        console.log({errors: error.response.data});
                        this.errors = error.response.data.errors
                    }
                })

            }

        }
    },
}
</script>

<style>
    .text-right{
        text-align: right;
    }
</style>
