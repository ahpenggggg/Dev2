<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Inventory;
use Illuminate\Support\Facades\Input;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        // foreach ($req->all() as $all) {
        // $inventories = new Inventory;
        // // dd($req->all());
        // $inventories->itemID = $req['itemID[]'];
        // $inventories->inventoryName = $req['inventoryName[]'];
        // $inventories->inventoryPrice = $req['inventoryPrice[]'];
        // $inventories->inventoryDesc = $req['inventoryDesc[]'];
        // $inventories->inventoryAmount = $req['inventoryAmount[]'];
        // $inventories->save();
        // }

        // $inventories = new Inventory($req->all());
        // $inventories->save()->all();

        // dd($req->all());

        return redirect()->action('pagesController@displayInventory');
    }

    public function retrieveInv() {
      return Inventory::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
