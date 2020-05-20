<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pais;
use App\estado;
use App\municipios;
class SuperAdminController extends Controller
{
    public function index(){
        return View('Superadm.AgregarPAESMU');
    }

    public function Guardar_pais_ajax(Request $request)
    {
        $validador=\Validator::make($request->all(),[
            'pais'=>'required'
        ]);
        if($validador->fails()){
            response()->json("flase");
        }
        else
        {
            $pai=new pais();
            $pai->NOMBRE_PAIS=$request->pais;
            $pai->save();  
            return response()->json(true);

        }
    }

}