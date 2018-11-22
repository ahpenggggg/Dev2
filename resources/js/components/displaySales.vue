<template lang="html">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card card-default">
          <div class="card-header">Sales Record</div>

          <div class="card m-2" v-for="(sale, index) in sales" :key="sale.id">
            <!-- <date-picker v-model="date" :config="options"></date-picker> -->

            <div class="card-body">
              <div class="card-title ml-1">
                <h5 class="float-left mt-2">Sale #{{index + 1}}</h5>
                <button class="btn btn-danger float-right ml-2" type="button" name="deleteSales" v-on:click="delSalesRec(sale.id, index)">Delete</button>
                <button class="btn btn-primary float-right mb-2" type="button" name="editSales" v-on:click="editSalesRec">Edit</button>
              </div>
              <table style="width:100%" >
                  <tr>
                    <th width="20%">Date:</th>
                    <td>N/A</td>
                  </tr>
                  <tr>
                    <th width="20%">Item ID:</th>
                    <td>{{ sale.itemID }}</td>
                  </tr>
                  <tr>
                    <th width="20%">Item Name:</th>
                    <td>asdasd</td>
                  </tr>
                  <tr>
                    <th width="20%">Quantity:</th>
                    <td>{{ sale.itemQty }}</td>
                  </tr>
              </table>
            </div>

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
        sales:[],
      }
    },
  mounted() {
      axios.post('/retrieveSales').then((response) => this.sales = response.data )
    },
    methods: {
      delSalesRec(id, index){
         if (confirm("Are you sure to delete this record?")) {
          axios.delete('/deleteSales/' + id).then((response) => alert('Deleted'))
          axios.post('/retrieveSales').then((response) => this.sales = response.data )
         }
      },
      editSalesRec(){
        window.location.href = 'editSales'
      }
    }
  }
</script>
