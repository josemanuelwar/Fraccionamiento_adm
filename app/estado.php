<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class estado extends Model
{
    //
    protected $table='estados';

    public function Eliminar($id)
    {
        $el=DB::table('estados')->where('ID_ESTADO', '=', $id)->delete();
        return $el;
    }
}
