<template lang="html">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card card-default">
          <div class="card-header">Edit Record</div>
          <div class="card m-2">
            <!-- <date-picker v-model="date" :config="options"></date-picker> -->

            <div class="card-body">
              <form action="/Sales" method="post">
                <input type="hidden" name="_token" :value="csrf">
                  <div  v-for="(sale, index) in sales.slice(0,1)" :key="sale.id">

                    <div class="form-group">

                      <div class="form-inline">
                        <div class="mr-3 mt-2">Item ID: </div>
                        <input class="form-control mt-2 col" name="itemID[]" maxlength="12" :value="sale.itemID">
                      </div>

                      <div class="form-inline">
                        <div class="mr-2 mt-2">Quantity: </div>
                        <input type="number" min="1" class="form-control mt-2 col" placeholder="Quantity" name="itemQty[]" :value="sale.itemQty">
                      </div>

                    </div>
                  </div>
                  <div class="submit">
                    <input class="btn btn-success mt-2" type="submit" name="submit" value="Submit">
                  </div>
              </form>
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
        // items: [{id:''}],
        // quantity:[{itemQty:''}]
      }
    },
  mounted() {
      this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      axios.post('/retrieveSales').then((response) => this.sales = response.data )
    }
  }
</script>
