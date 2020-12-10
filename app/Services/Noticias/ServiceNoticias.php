<?php

namespace App\Services\Noticias;

use Illuminate\Http\Client\Factory;

class ServiceNoticias
{
    public function __construct(Factory $http)
    {
        $this->http = $http;
    }
    public function getNoticias()
    {
        $parameters = [
            'country'=>'ar',
            'apiKey'=>env('NEWS_API_KEY')
        ];
        return $this->http->get('https://newsapi.org/v2/top-headlines' , $parameters)->json();
    }
}