<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Models\paisModel;
use Illuminate\Support\Facades\Log;

class paisController extends Controller
{
    public function ajaxRequestPais()
    {
        return view("/dashboard");
    }
    public function guardarPais(Request $req)
    {
        $pais = new paisModel();
        $pais->nombre_estado=$req->nombre_pais;
        $pais->estatus_pais=1;
        
        if(($pais->save())==TRUE){
            return 1;
        }else{
            return 0;
        }
       

        // return ($preceiv.' '.$apreceiv.' '.'AjAX');
        // $data = $req->validate([
        //     'nombre_pais'=>'required',
        //     'abreviacion_pais'=>'required'
        // ]);

        // $GuardarPais = paisModel::create($data);

        // $pais = new paisModel();
        // $pais->nombre_pais = $req->nombre;
        // $pais->abreviatura_pais = $req->abreviatura;
        // $pais->estatus_pais = 0;

        // if ($pais->save()) {
        //     return "1";
        // } else {
        //     return "0";
        // }

        // ESTE CODIGO SIRVE PARA VER SI SE RECIBEN LOS PARAMETROS
        // $input = $req->all();
        // Log::info($input);
        // return response()->json(['success' => 'Got Simple Ajax Request.']);
        //AQUI TERMINA    

    }
}
