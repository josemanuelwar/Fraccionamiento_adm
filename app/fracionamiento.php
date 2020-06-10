<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class fracionamiento extends Model
{
    //
    protected $table='fracionamientos';

    protected $fillable=['ID_FRAC','NOMBRE_FRAC','MUNICIPIO_FRAC','ADMIN_FRAC'];


    public function GetIDfracion($data)
    {
        $id = DB::table('fracionamientos')->insertGetId($data);
        return $id;
    }

    public function Imagefrac($adm)
    {
        $imagen = DB::table('fracionamientos')
                    ->join('imagens','fracionamientos.ID_FRAC','=','imagens.ID_FRAC_IMG')
                    ->where('fracionamientos.ADMIN_FRAC',$adm)
                    ->select('fracionamientos.ID_FRAC','fracionamientos.NOMBRE_FRAC','imagens.ID_IMAGEN','imagens.NOMBRE_IMG','imagens.URL_IMG','imagens.EXTENCION_IMG')
                    ->get();
        return $imagen;
    }
}
