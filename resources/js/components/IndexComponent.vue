<template>
  <div>
      <h1>Products</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Product</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Item Quantity</th>
                <th>Item Price</th>
                <th>Item Supplier</th>
                <th>Item Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.product_id">
                    <td>{{ product.product_id }}</td>
                    <td>{{ product.product_name }}</td>
                    <td>{{ product.quantity }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.supplier_name }}</td>
                    <td>{{ product.is_active }}</td>         
                    <td><router-link :to="{name: 'edit', params: { id: product.product_id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click = "deleteProduct(product.product_id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          products: []
        }
      },
      created() {
      let uri = '/api/products';
      this.axios.get(uri).then(response => {
        this.products = response.data;
      });
    },
    methods: {
      deleteProduct(id)
      {
        let uri = `/api/product/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.products.splice(this.products.indexOf(id), 1);
        });
      }
    }
  }
</script>
