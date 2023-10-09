<?php

namespace App\Http\Controllers;

use App\Models\printer;
use Illuminate\Http\Request;


class printersController extends Controller
{
    public function getPrinters(){
        $printers = printer::all();
        return response()->json($printers);
    }
}
