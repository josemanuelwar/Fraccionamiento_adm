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

    public function GetPais($id_pais)
    {   
        $pai=new pais();

        $e=$pai::select('ID_PAIS','NOMBRE_PAIS')->where('ID_PAIS',$id_pais)->get();
        return response()->json($e);
    }

    public function actualizarpais(Request $request,$idpais)
    {
        //echo "hola";
        $p=new pais();
        $pas=$p::where('ID_PAIS', $idpais)->update(['NOMBRE_PAIS'=>$request->PAIS]);
        return response()->json($pas);
    }
    
    public function Eliminarpais($id_pais)
    {
        $pa=new pais();
        $e=$pa->Eliminar($id_pais);
        return response()->json($e);
    }

    public function EstadosView(){

        return View('Superadm.AgregarEstado');
    }

    public function GuardarEstado(Request $request)
    {
        $validador=\Validator::make($request->all(),[
            'id_pais'=>'required',
            'Estado'=>'required'
        ]);
        if($validador->fails()){
            response()->json("flase");
        }
        else
        {
            $Estado=new estado();
            $Estado->NOMBRE_ESTADO=$request->Estado;
            $Estado->PAIS_ESSTADO=$request->id_pais;
            $Estado->save();  
            return response()->json("true");

        }              
    }
    
    public function GetEstado($id_estado)
    {
       
        $estado=new estado();
        $est=$estado::select('ID_ESTADO','NOMBRE_ESTADO')->where('ID_ESTADO',$id_estado)->get();
        return response()->json($est);

    }
    public function updateEstado(Request $request,$id)
    {
        $estados=new estado();
        $estad=$estados::where('ID_ESTADO', $id)->update(['NOMBRE_ESTADO'=>$request->estado]);
        return response()->json($estad);
    }

    public function deleEstado($id_estado)
    {
       
        $estado=new estado();
        $esta=$estado->Eliminar($id_estado);
        return response()->json($esta);
    }
    

}