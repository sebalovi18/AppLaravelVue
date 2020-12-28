<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto_registro extends Model
{
    //A modo de prueba este model
    use SoftDeletes;
    protected $table="producto_registro";
}
