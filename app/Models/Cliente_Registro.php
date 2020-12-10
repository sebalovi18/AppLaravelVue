<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente_Registro extends Model
{
    //A modo de prueba este model
    use SoftDeletes;
    protected $table="cliente_registro";
}
//borrar