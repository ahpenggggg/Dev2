<style lang="scss">
  @import 'resources/sass/app.scss';
</style>

<template lang="html">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card card-default">
          <div class="card-header">
            <font size="4">
            Inventory List
          </font>
          </div>

          <!--Inventory field-->

          <div class="card mb-1" >
            <div class="card-body" v-for="inv in inventories">
              <table style="width:100%">
                  <thead>
                    <tr>
                      <th>Name:</th>
                      <td colspan="5"> {{inv.inventoryName}}</td>
                      <tr>
                        <th width="10%">Item ID:</th>
                        <td width="23%">{{inv.itemID}}</td>
                        <th width="10%">Cost:</th>
                        <td width="23%">{{inv.inventoryPrice}}</td>
                        <th width="10%">Quantity:</th>
                        <td width="23%">{{inv.inventoryAmount}}</td>
                      </tr>
                      <tr>
                        <th colspan="6">Description:</th>
                      </tr>
                    </tr>
                  </thead>
                  <tbody>
                    <td colspan="6">{{inv.inventoryDesc}}</td>
                  </tbody>
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
        inventories:[],
      }
    },
      mounted() {
        axios.post('/retrieveInv').
        then((response) => this.inventories = response.data )
      }
  }
</script>
