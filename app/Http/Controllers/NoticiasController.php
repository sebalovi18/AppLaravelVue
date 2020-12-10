<?php

namespace App\Http\Controllers;

use App\Services\Noticias\ServiceNoticias;

class NoticiasController extends Controller
{
    public function __construct(ServiceNoticias $noticias)
    {
        $this->noticias = $noticias;
    }
    public function getNoticias(){
        return $this->noticias->getNoticias();
    }
}
