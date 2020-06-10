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
}
