<?php

namespace App\Http\Controllers;

use App\Services\Noticias\ServiceNoticias;

class NoticiasController extends Controller
{
    public function __construct(ServiceNoticias $noticias)
    {
        $this->noticias = $noticias;
    }
    public function getNoticias()
    {
        $response = $this->noticias->getNoticias();
        return response($response, 200);
    }
}
