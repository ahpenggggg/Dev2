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

    // dd($req->all());
    return redirect()->action('pagesController@dSales');
  }

  public function retrieveSales(){
    return Sales::all();
  }

  public function deleteSales(Request $req, $id) {
    $sales = Sales::find($id);
    $sales->delete();
    return redirect()->action('pagesController@dSales');
  }

  public function editSales(){
    $sales = Sales::find($id);
    $sales->update();
    return redirect()->action('SalesController@editSales');
  }

  
}
