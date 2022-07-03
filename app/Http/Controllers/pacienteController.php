<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pacienteModel;

class pacienteController extends Controller
{
    function buscarPaciente(Request $req){
        $paciente=pacienteModel::all();
        
    }
}
