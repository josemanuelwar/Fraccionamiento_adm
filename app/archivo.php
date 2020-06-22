<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class archivo extends Model
{
        public function Select($id)
        {
            $archivos=DB::table('archivos')->where("ID_FRACT_ARCHIVO",$id)->get();
            return $archivos;
        }
        
        public function Guardar($data)
        {
            $archi = DB::table('archivos')->insert($data);
            return $archi;
        }
}
