<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function principal() {
        return view('administrador.principal');
    }

    public function Registro_de_fracionamientos()
    {
        # code...
        return view('administrador.Registrofracionamientos');
    }
}
