<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function item() {
      return view ('pages.addItem');
    }

  public function edit() {
      return view ('pages.editRecord');
  }

  public function dSales(){
      return view('pages.displaySales');
  }

  public function addInventory(){
      return view('pages.addInventory');
  }

  public function displayInventory(){
      return view('pages.displayInventory');
  }


}
