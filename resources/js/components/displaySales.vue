<template lang="html">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card card-default">
          <div class="card-header">Sales Record</div>
            <a href="/export/csv" class="btn btn-primary mt-2 ml-2 mr-2">Export All Sales Records</a>
              <div class="card m-2" v-for="(sale, index) in sales" :key="sale.id">
                <input type="hidden" name="_token" :value="csrf">
                <div class="card-body">
                  <div class="card-title ml-1">
                    <h5 class="float-left mt-2">Sale #{{index + 1}}</h5>
                    <button class="btn btn-danger float-right ml-2" type="button" name="deleteSales" v-on:click="delSalesRec(sale.id, index)">Delete</button>

                    <button class="btn btn-primary float-right mb-2" type="button" name="editSales" v-on:click="editSalesRec(sale, index)" v-if="!edit">Edit</button>

                    <button class="btn btn-success float-right mb-2" type="button" name="updateSales" v-on:click="updateSalesRec(sale)" v-if="edit">Save</button>

                    <button class="btn btn-secondary float-right mb-2 mr-2" type="button" name="cancelEdit" v-on:click="cancelEditRec()" v-if="edit">Cancel</button>

                  </div>
                  <table style="width:100%" >
                      <tr>
                        <th width="20%">Date:</th>
                        <td>{{ sale.created_at}}</td>
                      </tr>
                      <tr>
                        <th width="20%">Item ID:</th>
                        <td>
                          <input type="text" v-model="editForm.itemID" v-if="edit">
                          <span v-else>{{ sale.itemID }}</span>
                        </td>
                      </tr>
                      <tr>
                        <th width="20%">Item Name:</th>
                        <td>asdasd</td>
                      </tr>
                      <tr>
                        <th width="20%">Quantity:</th>
                        <td>
                          <input type="text" v-model="editForm.itemQty" v-if="edit">
                          <span v-else>{{ sale.itemQty }}</span>

                        </td>
                      </tr>
                  </table>
                </div>
              <!-- </form> -->
              </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
        edit: false,
        editForm:[{
          itemID:'',
          itemQty:''
        }],
        sales:[]
      }
    },
  mounted(id) {
      this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      axios.get('/Sales/' + id).then((response) => this.sales = response.data)
    },
    methods: {
      delSalesRec(id){
         if (confirm("Are you sure to delete this record?")) {
          axios.delete('/Sales/' + id).then((response) => alert('Deleted'))
          axios.get('/Sales/' + id).then((response) => this.sales = response.data)
         }
      },
      editSalesRec(sales,id){
        // window.location.href = 'editSales'
          this.edit = true;

          this.editForm.itemID=this.sales[id].itemID;
          this.editForm.itemQty=this.sales[id].itemQty;
      },
      updateSalesRec(sale, id){
        axios.put('/Sales/' + sale.id, {
          itemID: this.editForm.itemID,
          itemQty: this.editForm.itemQty
        }).then((response) => alert('Updated'))
        this.edit = false
        axios.get('/Sales/' + id).then((response) => this.sales = response.data)
      },
      cancelEditRec(){
        this.edit = false
        this.editForm.itemID = ''
        this.editForm.itemQty = ''
      }
    }
  }
</script>
