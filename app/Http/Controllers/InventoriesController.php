<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Inventory;
use Illuminate\Support\Facades\Input;

class InventoriesController extends Controller
{

    public function store(Request $req)
    {
          $req->validate([
          'inventoryName' => 'required',
          'itemID' => 'required',
          'inventoryPrice' => 'required',
          'inventoryDesc' => 'required',
          'inventoryAmount' => 'required',
        ]);

        for ($i=0; $i < count($req['itemID']) ; $i++ ) {
          $inventories = new Inventory;
          $inventories->itemID = $req['itemID'][$i];
          $inventories->inventoryName = $req['inventoryName'][$i];
          $inventories->inventoryPrice = $req['inventoryPrice'][$i];
          $inventories->inventoryDesc = $req['inventoryDesc'][$i];
          $inventories->inventoryAmount = $req['inventoryAmount'][$i];
          $inventories->save();
        };

        // dd($req->all());
        return redirect()->action('pagesController@displayInventory');
    }

    public function retrieveInv() {
      return Inventory::all();
    }

    public function deleteInventory(Request $req, $id){
      $inventories = Inventory::find($id);
      $inventories->delete();
      return redirect()->action('pagesController@displayInventory');
    }
}
