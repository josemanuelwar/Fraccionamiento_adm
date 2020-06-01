<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class municipios extends Model
{
    //
    protected $table='municipios';

    public static function GuardarMunicipios($id_estado,$municipio) {
        $municipios = DB::table('municipios')
                        ->insert([
                            'NOMBRE_MUNICIPIO'=> $municipio,
                            'ESTADO_MUNICIPIO' => $id_estado,
                        ]);
        return $municipios;
    }

    public static function getMunicipios($id_estado) {
        $municipios = DB::table('municipios')
                    ->where('ESTADO_MUNICIPIO',$id_estado)
                    ->get();
        return $municipios;
    }

    public static function TraerMun($id) {
        $municipios = DB::table('municipios')
                    ->where('ID_MUNICIPIO',$id)
                    ->get();
        return $municipios;
    }

    public static function ActualizarMuni($id, $nombre) {
        $municipios = DB::table('municipios')
                ->where('ID_MUNICIPIO',$id)
                ->update([
                    'NOMBRE_MUNICIPIO'=>$nombre
                    ]);
        return $municipios;
    }

    public static function EliminarMun($id) {

        $municipios = DB::table('municipios')
                            ->where('ID_MUNICIPIO', '=', $id)
                            ->delete();
    
        return $municipios;
    }
}
