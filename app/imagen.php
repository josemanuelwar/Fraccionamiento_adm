<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class imagen extends Model
{
    //
    protected $table="imagens";

    public function Insertar($data)
    {
        $id = DB::table('imagens')->insertGetId($data);
        return $id;
    }

    public function Actulizar($id_imagen,$data)
    {
        $update = DB::table('imagens')->where('ID_IMAGEN',$id_imagen)->update($data);
        return $update;
        
    }
}
