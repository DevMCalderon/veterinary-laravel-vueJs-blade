<template>
    <div>
        <table class="table table-sm  table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="products && products.length > 0">
                <tr class="btn-reveal-trigger" v-for="product in products" :key="product.id">
                    <td>{{ product.image }}</td>
                    <td>{{ product.code }}</td>
                    <td>{{ product.name }}</td>
                    <td>${{ product.price }} <small>MXN</small></td>
                    <td>{{ product.category && product.category.name || '' }}</td>
                    <td class="text-center">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" href="#!">Editar</a>
                                    <a class="dropdown-item text-danger" href="#!">Eliminar</a>
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
        }
    }
}
</script>
