<template>
  <div>
      <h1>Suppliers</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'createSupplier' }" class="btn btn-primary">Create Supplier</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Company Name</th>
                <th>Phone</th>
                <th>Approved at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="supplier in suppliers" :key="supplier.id">
                    <td>{{ supplier.supplier_name  }}</td>
                    <td>{{ supplier.supplier_email }}</td>
                    <td>{{ supplier.company_name }}</td>
                    <td>{{ supplier.supplier_phone }}</td>
                    <td>{{ supplier.approved_at }}</td>
                    <td><router-link :to="{name: 'editSupplier', params: { id: supplier.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click = "deleteSupplier(supplier.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          suppliers: []
        }
      },
      created() {
      let uri = '/api/suppliers';
      var _this = this;
      this.axios.get(uri).then(function(response){
          _this.suppliers = response.data;
      });
    },
    methods: {
      deleteSupplier(id)
      {
        let uri = `/api/supplier/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.suppliers.splice(this.suppliers.indexOf(id), 1);
        });
      }
    }
  }
</script>
