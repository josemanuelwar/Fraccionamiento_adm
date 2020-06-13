<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\pais;
use App\estado;
use App\municipios;
use App\User;
use App\fracionamiento;
use App\imagen;
class AdministradorController extends Controller
{
    public function principal() {
        if(Auth::check()){
            $id=Auth::id();
            $fracio=new fracionamiento();
            $resutdo=$fracio->Imagefrac($id);
            return view('administrador.principal',compact('resutdo'));
        }
    }

    public function Registro_de_fracionamientos()
    {
        $paises = pais::getPaises();
        return view('administrador.Registrofracionamientos', array(
            'paises'=>$paises
        ));
        // return view('administrador.Registrofracionamientos');
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

    public function AgregarFracionamiento(Request $request)
    {
        if(Auth::check()){
            $validador=\Validator::make($request->all(),[
                'nombre_frac' => 'required',
                'municipio' => 'required'
            ]);
            
            $fra=new fracionamiento();

            $data = array('NOMBRE_FRAC' =>$request->nombre_frac,
                            'MUNICIPIO_FRAC' => $request->municipio,
                            'ADMIN_FRAC'=>Auth::id(),
                            'ACTIVO_FRAC'=>'1');
            $idfra=$fra->GetIDfracion($data);
            if($idfra > 0){
                if($request->hasFile("imagen")){
                    $file = $request->file('imagen');
                    $nombre = time().$file->getClientOriginalName();
                    $archivo = \File::get($file);
                    $extencion=$file->getClientOriginalExtension(); 
                    
                    if($extencion == "jpg" || $extencion == "png" || $extencion=="jpeg”"){
                        $archivo1 = base64_encode($archivo);

                        $dato = array('NOMBRE_IMG' =>$nombre ,
                                    'URL_IMG'  => $archivo1,
                                    'ID_FRAC_IMG' => $idfra,
                                'EXTENCION_IMG'=>$extencion);
                        $img= new imagen();

                        $image=$img->Insertar($dato);
                    }
                    if($image > 0){
                        return response()->json(true);
                    }else{
                        return response()->json(false);
                    }    
                }    
            }else{
                return response()->json(false);
            }
        }
        
    }

/** cargamos la vista de editar fracionamiento 
 * pasando los prarmetros a la vista cono array de Fracionamiento
 * array de pasis
 */
    public function Editar_fracionamiento($id_frac)
    {
        $fra=new fracionamiento();
        $resultado=$fra->fracimg($id_frac);
        $pais = new pais();
        $p=$pais::all();
        $data = array('resultado' => $resultado ,'pais' => $p);
        return view("administrador.EditarFrac",$data);
    }
    /** Actilizamos al Fraccionamiento
     * resivimos los parametros @id del fracionamientos
     * el @id de la imagen al fracionamiento
     * el @nombre y @municipio
     */
    public function Actulizarfarcionamiento(Request $request)
    {
        if(Auth::check())
        {
            $request->validate([
                    'nombre' => 'required|max:60|min:4',
                    'municipio'=>'required|max:10|min:1|integer',
                    'id_imagen'=>'required|max:10|min:1|integer',
                    //'id_fracionamiento'=>'required|max:10|min:1|integer'
                ]);

            if($request->hasFile("imagen"))
            {
                    $file = $request->file('imagen');
                    $nombre = time().$file->getClientOriginalName();
                    $archivo = \File::get($file);
                    $extencion=$file->getClientOriginalExtension();
                    if($extencion == "jpg" || $extencion == "png" || $extencion=="jpeg”")
                    {
                        $archivo1 = base64_encode($archivo);
                        $id = $request->id_imagen;
                        $dato = array('NOMBRE_IMG' => $nombre, 'URL_IMG' => $archivo1 );
                        $act=new imagen();
                        $actualizar=$act->Actulizar($id,$dato);
                    }         
            }
                $datas = array('NOMBRE_FRAC' =>$request->nombre ,'MUNICIPIO_FRAC' => $request->municipio );
                $fra=new fracionamiento();
                $resultado=$fra->ActulizarFracionamiento($request->id_fracionamiento,$datas);
                if($resultado > 0 || $actualizar > 0)
                {
                    return redirect("/");
                }else
                {
                    echo "Error al actulizar";
                }
            
        }                        
    }
    /** eliminamos el fracionamientos pero solo cambiamos su estatus de activo('1') a no activo('0')
     *  @param($id) parametro resivimos el id del fraccionamiento
    */
    public function eliminarfracionamiento($id)
    {
        $data = array('ACTIVO_FRAC' => '0', );
        $fra=new fracionamiento();
        $resultado=$fra->ActulizarFracionamiento($id,$data);
        return redirect("/");        
    }
}
