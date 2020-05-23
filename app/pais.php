<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class pais extends Model
{
    protected $table='pais';


    public function Eliminar($id)
    {
        $el=DB::table('pais')->where('ID_PAIS', '=', $id)->delete();
        return $el;
    }


    
}
