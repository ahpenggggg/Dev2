<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{
  public function index()
  {
    return view('items');
  }

  public function exportCSV()
  {
    return Excel::download(new ListExport, 'list.csv');
  }
}
