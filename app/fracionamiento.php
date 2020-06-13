<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class fracionamiento extends Model
{
    //
    protected $table='fracionamientos';

    protected $fillable=['ID_FRAC','NOMBRE_FRAC','MUNICIPIO_FRAC','ADMIN_FRAC'];

    /** insertamos los fracionamientos */
    public function GetIDfracion($data)
    {
        $id = DB::table('fracionamientos')->insertGetId($data);
        return $id;
    }
    /** motramos todos los fracionamientos que tiene el usuario
     * @param($id) del administrador
     */
    public function Imagefrac($adm)
    {
        $imagen = DB::table('fracionamientos')
                    ->join('imagens','fracionamientos.ID_FRAC','=','imagens.ID_FRAC_IMG')
                    ->where('fracionamientos.ADMIN_FRAC',$adm)
                    ->where('fracionamientos.ACTIVO_FRAC',1)
                    ->select('fracionamientos.ID_FRAC','fracionamientos.NOMBRE_FRAC','imagens.ID_IMAGEN','imagens.NOMBRE_IMG','imagens.URL_IMG','imagens.EXTENCION_IMG')
                    ->get();
        return $imagen;
    }
    /** taremos los datos del fracionamiento y todo sus relaciones que tiene que  ver para ediatr
     * @param( $id_frac) id del fracionamiento
     */
    public function fracimg($id_frac)
    {
        $imagen = DB::table('fracionamientos')
                    ->join('imagens','fracionamientos.ID_FRAC','=','imagens.ID_FRAC_IMG')
                    ->join('municipios','fracionamientos.MUNICIPIO_FRAC','=','municipios.ID_MUNICIPIO')
                    ->join('estados','municipios.ESTADO_MUNICIPIO','=','estados.ID_ESTADO')
                    ->join('pais','pais.ID_PAIS','=','estados.PAIS_ESSTADO')
                    ->where('fracionamientos.ID_FRAC',$id_frac)
                    ->where('fracionamientos.ACTIVO_FRAC',1)
                    ->select('fracionamientos.ID_FRAC','fracionamientos.NOMBRE_FRAC','imagens.ID_IMAGEN',
                            'municipios.ID_MUNICIPIO','municipios.NOMBRE_MUNICIPIO','estados.ID_ESTADO','estados.NOMBRE_ESTADO','pais.ID_PAIS','pais.NOMBRE_PAIS')
                    ->get();
        return $imagen;
    }
/** funcion para actualizar el fracionamiento
 *  @param($id, $data) resive el id del fracionaminto y un arreglo
 */
    public function ActulizarFracionamiento($id,$data)
    {
         $update = DB::table('fracionamientos')->where('ID_FRAC',$id)->update($data);
         return $update;
    }

}
