<?php

namespace App\Http\Controllers;

use App\Models\view_registry;
use Illuminate\Http\Request;

class viewRegistryController extends Controller
{
    public function getRegistry(){
        $registry = view_registry::all();
        return response()->json($registry);
        
    }
}
