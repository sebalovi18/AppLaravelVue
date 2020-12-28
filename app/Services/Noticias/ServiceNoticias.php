<?php

namespace App\Services\Noticias;

use Illuminate\Http\Client\Factory;

class ServiceNoticias
{
    public function __construct(Factory $http, $api_uri, $api_key)
    {
        $this->http = $http;
        $this->api_uri = $api_uri;
        $this->api_key = $api_key;
    }
    public function getNoticias()
    {
        $parameters = [
            'country' => 'ar',
            'apiKey' => $this->api_key
        ];
        return
            $this->http->get($this->api_uri, $parameters)->json();
    }
}
