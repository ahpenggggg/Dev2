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
      'itemID' => 'required',
    ]);

    $sales = new Sales;
    $sales->itemID = Input::get('itemID');
    $sales->save();

    return Input::all();
  }
}
