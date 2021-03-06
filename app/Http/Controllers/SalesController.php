<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sales;
use Illuminate\Support\Facades\Input;

class SalesController extends Controller
{
  public function store(Request $req) {

    $req->validate([
      'itemQty' => 'required',
      'itemID' => 'required',
    ]);


    for ($i=0; $i < count($req['itemQty']) ; $i++ ) {
      $sales = new Sales;
      $sales->itemQty  = $req['itemQty'][$i];
      $sales->itemID = $req['itemID'][$i];
      $sales->save();
    };

    return redirect()->action('pagesController@dSales');
    // dd($req->all());
    // return view('pages.displaySales');
  }

  public function show(){
    return Sales::all();
  }

  public function destroy(Request $req, $id) {
    $sales = Sales::find($id);
    $sales->delete();
    return redirect()->action('pagesController@dSales');
  }

  public function update(Request $req, $id){
    $req->validate([
      'itemQty' => 'required',
      'itemID' => 'required',
    ]);

    $sales = Sales::find($id);
    $sales->update($req->all());

    // return redirect()->action('pagesController@dSales');

    // $sales->itemQty  = $req->itemQty;
    // $sales->itemID = $req->itemID;
  }
}
