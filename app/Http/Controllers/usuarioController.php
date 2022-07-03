<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarioModel;

class usuarioController extends Controller
{
    public function ajaxRequestUsuario()
    {
        return view("/login");
    }

    public function AjaxbuscarUsuario(Request $req)
    {
        $usuario = new usuarioModel();
        $u = $usuario->correo = $req->correo;
        $c = $usuario->contrasena = $req->contrasena;
        $resultado_query = usuarioModel::where('correo', '=', $u)
            ->where('contrasena', '=', $c)->first()->toArray();

        $correo = $resultado_query['correo'];
        $contrasena = $resultado_query['contrasena'];
        $mod = $resultado_query['tipo_usuario'];
        // if($resultado_query == NULL){
        //     return "vacio";

        // }else{
        //     return "registro valores";
        // }

        // return $resultado_query;
        if ($u == $correo) {
            if ($c === $contrasena) {
                // ESTADO 1 - USUARIO Y CONTRASENA EXITOSO
                if ($mod == "admin") {
                    return "user_sucss";
                }
                if ($mod == "doctor") {
                    return "user_sucss";
                }
            } else {
                // ERROR 3 - CONTRASEÑA INCORRECTA
                return "pass_err";
            }
        } else {
            // CEI = CORREO ELECTRONICO INEXISTENTE
            return "wrong_email";
        }
    }
}
