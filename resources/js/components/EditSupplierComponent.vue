<template>
  <div>
    <h1>Edit Supplier</h1>
    <form @submit.prevent="updateSupplier">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Name:</label>
              <input type="text" class="form-control" v-model="supplier.supplier_name">
            </div>
          </div>        
          <div class="col-md-6">
            <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" v-model="supplier.supplier_email">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Company Name:</label>
              <input type="text" class="form-control" v-model="supplier.company_name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Website:</label>
              <input type="text" class="form-control" v-model="supplier.website">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label> Phone:</label>
              <input type="text" class="form-control" v-model="supplier.supplier_phone">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Status:</label>
              <select class="form-control" v-model="supplier.is_active">
                  <option value='1'>Active</option>
                  <option value='0'>In-Active</option>  
              </select>
            </div>
          </div>
        </div><div class="row">
          
        </div><br /><br />
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
          supplier: {}
        }
      },
      created() {
        let uri = `/api/supplier/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.supplier = response.data;
        });
      },
      methods: {
        updateSupplier() {
          let uri = `/api/supplier/update/${this.$route.params.id}`;
          this.axios.post(uri, this.supplier).then((response) => {
            this.$router.push({name: 'suppliers'});
          });
        }
      }
    }
</script>
