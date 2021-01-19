<template>
  <div>
    <h1>Edit Post</h1>
    <form @submit.prevent="updateProduct">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Name:</label>
              <input type="text" class="form-control" v-model="product.product_name">
            </div>
          </div>        
          <div class="col-md-6">
            <div class="form-group">
              <label>Quantity:</label>
              <input type="number" class="form-control" v-model="product.quantity">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label>Price:</label>
                <input type="number" class="form-control" v-model="product.price">
              </div>
            </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Supplier Name:</label>
              <select class="form-control" v-model="product.supplier_id" @change="getSuppliers">
                <option v-for="supplier in suppliers" :value="supplier.id">{{ supplier.supplier_name }}</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Status:</label>
              <select class="form-control" v-model="product.is_active">
                  <option value='1'>Active</option>
                  <option value='0'>In-Active</option>  
              </select>
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          suppliers: [],
          product: {}
        }
      },
      mounted() {
        console.log('product')
      },
      methods: {
        getSuppliers: function(){
          axios.get('/api/allsuppliers')
          .then(function (response) {
             this.suppliers = response.data;
          }.bind(this));
        },
        updateProduct() {
          let uri = `/api/product/update/${this.$route.params.id}`;
          this.axios.post(uri, this.product).then((response) => {
            this.$router.push({name: 'products'});
          });
        }
      },
      created: function(){
        let uri = `/api/product/edit/${this.$route.params.id}`;
        console.log(uri);
        this.axios.get(uri).then((response) => {
            this.product = response.data;
        });
        this.getSuppliers()
      }
    }
</script>
