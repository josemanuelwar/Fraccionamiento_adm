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


    //funcion para agregar municipios
    public function AgegarMunicipios() {
        $paises = pais::getPaises();
        return view('Superadm.AgregarMunicipio', array(
            'paises'=>$paises
        ));

    }

    //funcion que trae los estados en la vista de agregar municipios
    public function TraerEstados(Request $request) {
        $validador=\Validator::make($request->all(),[
            'id_pais'=>'required',
        ]);
        if($validador->fails()){
            response()->json("flase");
        }
        else {
            $estados = estado::getEstados($request->id_pais);
            return response()->json([
                'estados'=>$estados

            ]);
        }
    }

    //funcion para guardar los municipios
    public function GuardarMunicipio(Request $request) {
        $validador=\Validator::make($request->all(),[
            'id_estado'=>'required',
            'municipio'=>'required'
        ]);
        if($validador->fails()){
            response()->json("flase");
        }
        else {

            $municipios = municipios::GuardarMunicipios($request->id_estado, $request->municipio);
            return response()->json([
                'municipios'=>$municipios
            ]);
        }
    }

    //funcion para traer todos los municipios
    public function TraerMunicipios() {
        $municipios = municipios::getMunicipios();
        return response()->json($municipios);
    }
    


    //funcion para traer los municipios de los modales
    public function MunicipioGet(Request $request) {
        $municipios = municipios::TraerMun($request->id_municipio);
        return response()->json([
            'municipios'=>$municipios
        ]);
    }

    //actualizar el municipio
    public function ActualizarMunicipio(Request $request) {
        $municipios = municipios::ActualizarMuni($request->id_muni, $request->Municipio_nombre);
        return response()->json([
            'municipios'=>1
        ]);
    }

    //funcion para eliminar el municipio
    public function EliminarMuni(Request $request) {
        $municipio = municipios::EliminarMun($request->id);

        if($municipio != null) {

            return response()->json([
                'municipios'=>1
            ]);
        }else {
            return response()->json([
                'municipios'=>2
            ]);
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