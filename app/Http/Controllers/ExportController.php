<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;

class ExportController extends Controller
{
    public function index()
    {
        $sales = Sales::paginate(5);

        return view('welcome', ['sales' => $sales]);
    }

    public function export($type)
    {
      return Excel::download(new SalesExport, 'Sales.' . $type);
    }
}
