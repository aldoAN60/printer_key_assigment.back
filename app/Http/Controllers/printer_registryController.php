<?php

namespace App\Http\Controllers;

use App\Models\printer_registry;
use App\Models\User;
use App\Models\view_registry;
use Illuminate\Http\Request;

class printer_registryController extends Controller
{
    public function create(Request $request){
        $registry = $request->all();
        $usuario = $registry[0]['email'];
        
        $id_user = User::where('email',$usuario)->first();
        
            if($id_user === null){
                $userRegistry = new User ([
                    'email' => $usuario,
                ]);
                $userRegistry->save();
                $id_user = User::where('email',$usuario)->first();
            }
            
            foreach ($registry as $reg) {
                $printerRegistry = new printer_registry([
                    'code' => $reg['code'],
                    'id_printer' => $reg['id_printer'],
                    'id_user' => $id_user['id_user'],
                ]);
                // Guarda el objeto en la base de datos
                $printerRegistry->save();
                }
        
        
        return response()->json('registro exitoso');
    }

    public function debug(){
        $id_user = User::where('email','asldkjiw')->first();
        dump($id_user);
        return $id_user;
    }

    public function duplicateCodes(){
        $codes = printer_registry::all();

        $codes = collect($codes)->map(function ($code){
            return $code['code'];
        });
        $codes = $codes->toArray();
        $codes = array_unique($codes);
        
        return response()->json($codes);
    }

    public function duplicateRegistry(){
        $registry = view_registry::all();
        $registry = collect($registry)->map(function($reg){
            return [
                'id_printer' => $reg['id_printer'],
                'email' => $reg['email']
            ];
        });
        return $registry;
    }

}
