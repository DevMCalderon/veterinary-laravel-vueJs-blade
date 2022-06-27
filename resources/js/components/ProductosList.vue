<template>
    <div>
        <table class="table table-sm  table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th style="width:120px">Imagen</th>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="products && products.length > 0">
                <tr class="btn-reveal-trigger" v-for="product in products" :key="product.id">
                    <td>
                        <img v-if="product.image" :src="product.image" :alt="product.name" class="img-fluid img-product" onerror="this.onerror=null;this.src='/img/image-not-found.png';">
                        <span v-else>Sin imagen</span>
                    </td>
                    <td>{{ product.code }}</td>
                    <td>{{ product.name }}</td>
                    <td>${{ product.price }} <small>MXN</small></td>
                    <td>{{ product.category && product.category.name || '' }}</td>
                    <td class="text-center">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" :href="`/product/${product.id}/editar`">Editar</a>
                                    <a class="dropdown-item text-danger" @click="confirmDelete(product)" href="#!">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="6">
                        <p class="text-center" v-if="products">No hay productos</p>
                        <p class="text-center" v-else>Cargando...</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="text-right">

        <small>{{ products.length }} productos</small>
        </p>
    </div>
</template>



<script>
import axios from 'axios'

export default {
    data(){
        return {
            products: undefined
        }
    },
    mounted(){
        this.getProducts();
    },
    methods: {
        getProducts(){
            axios.get('/api/products').then((resp)=>{
                if(resp.data.status){
                    console.log(resp.data);
                    this.products = resp.data.products
                }
            });
        },
        confirmDelete(product){
            Swal.fire({
                html: `¿Desea eliminar el producto <b>${product.name}</b>?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deleteProduct(product)
                }
            })
        },
        deleteProduct(product){
            axios.delete(`/api/product/${product.id}`).then(resp => {
                if(resp.data.status){
                    Swal.fire(
                        'Eliminado',
                        `El producto <b>${product.name}</b> ha sido eliminado`,
                        'success'
                    ).then(resp => {
                        this.getProducts();
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


<style scoped>
    .text-right{
        text-align: right
    }
    .img-product{
        max-width: 80px;

    }
</style>
