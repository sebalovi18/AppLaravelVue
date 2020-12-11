<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model
{
    use SoftDeletes;

    protected $fillable = ['n_mesa,fecha'];

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class)->withTimestamps();
    }
    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withTimestamps();
    }
}
