<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pais;
use App\estado;
use App\municipios;
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

    public function Recuperarpais_ajax()
    {
        $pais = new pais();
        $p=$pais::all();
        return response()->json($p);
    }

    public function RecuperarEstado($id_pais)
    {
        $estado= new estado();
        $e=$estado::select('NOMBRE_ESTADO','ID_ESTADO')->where('PAIS_ESSTADO',$id_pais)->get();
        return response()->json($e);
    }

    public function RecuperandoMunicipios($id_estados)
    {
        $municipio=new municipios();
        $m=$municipio::select('ID_MUNICIPIO','NOMBRE_MUNICIPIO')->where('ESTADO_MUNICIPIO',$id_estados)->get();
        return response()->json($m);
    }
}
