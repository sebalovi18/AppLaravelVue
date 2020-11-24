<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NoticiasController extends Controller
{
    public function getNoticias(){
        return Http::get('https://newsapi.org/v2/top-headlines?country=ar&apiKey='. env('NEWS_API_KEY') )
                        ->throw()
                        ->json();
    }
}
