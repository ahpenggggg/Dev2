<template lang="html">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
               <div class="card card-default">
                    <div class="card-header">Add/Remove Sales Record</div>

<!-- Add item field -->
                  <div class="card-body">
                    <button class="btn btn-success col-md-2" @click="addSale">
                      Create Item <br />
                    </button>
                    <form action="/Sales" method="post">
                    <input type="hidden" name="_token" :value="csrf">

                    <div class="form-inline" v-for="(item, index) of items">

                      <input class="form-control mt-2 col-5" placeholder="Item ID" name="itemID" maxlength="12"  v-model="item.itemID">

                      <button class="btn btn-success ml-1 mr-1 mt-2" @click.prevent="deleteSales(index)">
                        -
                      </button>
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
</template>

<script>
  export default {
    data () {
        return {
        items: [{id:''}],
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

      }
    },
    methods: {
      addSale() {
        this.items.push({id : ''});
      },
      deleteSales(index) {
        if (index = 1) {
          while (index >= 1) {
            this.items.splice(index, 1);
            break;
          }
        } else {
          null;
        }

      }
    }
  }
</script>
