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
          <div class="card m-2" v-for="(inv, index) in inventories" :key="inv.id">
            <input type="hidden" name="_token" :value="csrf">
            <div class="card-body">
              <div class="card-title ml-1">
                <h5 class="float-left">Inventory # {{index + 1}}</h5>
                <button class="btn btn-danger float-right ml-2" type="button" name="deleteInventory" v-on:click="delInvRec(inv.id, index)">Delete</button>

                <button class="btn btn-primary float-right mb-2" type="button" name="editInv" v-on:click="editInvRec()" v-if="!edit">Edit</button>

                <button class="btn btn-success float-right mb-2" type="button" name="updateInv" v-on:click="updateInvRec(inv)" v-if="edit">Save</button>

                <button class="btn btn-secondary float-right mb-2 mr-2" type="button" name="cancelEdit" v-on:click="cancelEditInv()" v-if="edit">Cancel</button>

              </div>
              <table style="width:100%">
                  <thead>
                    <tr>
                      <th>Name:</th>
                      <td colspan="5">
                        <input type="text" v-model="editForm.inventoryName" v-if="edit">
                        <span v-else>{{inv.inventoryName}}</span>
                      </td>
                      <tr>
                        <th width="10%">Item ID:</th>
                        <td width="23%">
                          <input type="text" v-model="editForm.itemID" v-if="edit">
                          <span v-else>{{inv.itemID}}</span>
                        </td>
                        <th width="10%">Cost:</th>
                        <td width="23%">
                          <input type="text" v-model="editForm.inventoryPrice" v-if="edit">
                          <span v-else>{{inv.inventoryPrice}}</span>
                        </td>
                        <th width="10%">Quantity:</th>
                        <td width="23%">
                          <input type="text" v-model="editForm.inventoryAmount" v-if="edit">
                          <span v-else>{{inv.inventoryAmount}}</span>
                        </td>
                      </tr>
                      <tr>
                        <th colspan="6">Description:</th>
                      </tr>
                    </tr>
                  </thead>
                  <tbody>
                    <td colspan="6">
                      <input type="textarea" v-model="editForm.inventoryDesc" v-if="edit">
                      <span v-else>{{inv.inventoryDesc}}</span>
                    </td>
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
        edit: false,
        editForm:[{
          inventoryName:'',
          itemID:'',
          inventoryPrice:'',
          inventoryAmount:'',
          inventoryDesc:''
        }],
        inventories:[]
      }
    },
      mounted(id) {
        this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        axios.get('/inventories/' + id).then((response) => this.inventories = response.data )
      },
      methods: {
        delInvRec(id){
          if (confirm("Are you sure to delete this inventory?")) {
            axios.delete('/inventories/' + id).then((response) => alert('Deleted'))
            axios.get('/inventories/' + id).then((response) => this.inventories = response.data )
          }
        },
        editInvRec(){
          // window.location.href = 'editSales'
          this.edit = true
          this.editForm.inventoryName=this.inventories.inventoryName
          this.editForm.itemID=this.inventories.itemID
          this.editForm.inventoryPrice=this.inventories.inventoryPrice
          this.editForm.inventoryAmount=this.inventories.inventoryAmount
          this.editForm.inventoryDesc=this.inventories.inventoryDesc
        },
        updateInvRec(inv){
          axios.put('/inventories/' + inv.id, {
            inventoryName: this.editForm.inventoryName,
            itemID: this.editForm.itemID,
            inventoryPrice: this.editForm.inventoryPrice,
            inventoryAmount: this.editForm.inventoryAmount,
            inventoryDesc: this.editForm.inventoryDesc
          }).then((response) => alert('Updated'))
          this.edit = false
          window.location.href ='displayInventory'
        },
        cancelEditInv(){
          this.edit = false
          this.editForm.inventoryName=''
          this.editForm.itemID=''
          this.editForm.inventoryPrice=''
          this.editForm.inventoryAmount=''
          this.editForm.inventoryDesc=''
        }
      }
  }
</script>
