<template>

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Images</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(product, index) in products" :key="index">
            <td>{{product.id}}</td>
            <td>{{product.img}}</td>
            <td>{{product.name}}</td>
            <td>{{product.description}}</td>
            <td>{{product.price}}</td>
            <td>{{product.stock}}</td>
            <td>{{product.action}}</td>
            <td class="btn-group">
                <i class="btn fas fa-pencil-alt text-info" data-toggle="modal" data-target="#edit"></i>
                
                <i class="btn fas fa-trash text-danger"></i>
                </td>
        </tr>
    </tbody>
</table>

</template>

<script>

import axios from 'axios'

    export default {
        data () {
                return {
                    products: null,
                }
            },
            mounted () {
                this.getProducts();
            },
            methods: {
                getProducts: function () {
                    axios.get('/api/products').then(response => {
                        this.products = response.data.data
                    });
            }
    }
}
</script>
