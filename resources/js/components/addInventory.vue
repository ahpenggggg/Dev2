<template lang="html">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card card-default">
          <div class="card-header">Add Inventory</div>

          <!--Inventory field-->
          <div class="card mb-1" >
            <div class="card-body">

                <form action="/inventories" method="post">
                <input type="hidden" name="_token" :value="csrf">

                  <div class="form-group"v-for="(inventory, index) of inventories">
                    <div class="card-title ml-1">
                      <h5 class="float-left">Inventory #{{index + 1}}</h5>
                      <button class="btn btn-succes float-right mb-3" type="button" name="removeItem" @click="deleteInventory">x</button>
                    </div>

                    <input class="form-control col-xs-3" placeholder="Inventory Name" name="inventoryName" maxlength="25" v-model="inventory.invName">

                    <div class="form-inline">
                      <input class="form-control mt-2 col" placeholder="Inventory ID" name="itemID" maxlength="12" v-model="inventory.itemID">

                      <input class="form-control mt-2 ml-1 col-lg-1" placeholder="Price" name="inventoryPrice" maxlength="7" v-model="inventory.invPrice">

                      <input class="form-control mt-2 ml-1 col-lg-1" name="inventoryAmount" placeholder="Amount" maxlength="4" v-model="inventory.invAmt">
                    </div>

                    <textarea class="form-control col-xs-3 mt-2" name="inventoryDesc" rows="2" placeholder="Description" v-model="inventory.invDesc"></textarea>

                  </div>

                  <div class="submit">
                    <button class="btn btn-success m-2" @click.prevent="addInventory">Create Product <br /> </button>

                    <input class="btn btn-success m-2 float-right" type="submit" name="submit" value="Submit">

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
      inventories: [{
        invID: '',
        invName: '',
        invPrice: '',
        invAmt:'',
        invDesc:''
      }],
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
  },
  methods: {
    addInventory(){
      this.inventories.push({
        invID:'',
        invName:'',
        invPrice:'',
        invAmt:'',
        invDesc:''
      });
    },
    deleteInventory(index) {
      if (index = 1) {
        while (index >= 1) {
          this.inventories.splice(index, 1);
          break;
        }
      } else {
          null;
      }

    }
  }
}
</script>
