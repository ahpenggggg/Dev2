<template lang="html">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card card-default">
          <div class="card-header">Sales Record</div>

          <div class="card mb-2">
            <!-- <date-picker v-model="date" :config="options"></date-picker> -->

            <div class="card-body" v-for="sale in sales">
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
                    <td>sd</td>
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
        axios.post('/retrieveSales').
        then((response) => this.sales = response.data )
      }
  }

// import datePicker from 'vue-bootstrap-datetimepicker';
//
// import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
//
// export default {
//   data () {
//     return {
//
//     }
//   },
//   components: {
//     datePicker
//   }
// }
</script>
