<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class estado extends Model
{
    //
    protected $table='estados';

    public static function getEstados($id){
        $estados = DB::table('estados')
                    ->where('PAIS_ESSTADO',$id)
                    ->get();
        return $estados;
    }
}
