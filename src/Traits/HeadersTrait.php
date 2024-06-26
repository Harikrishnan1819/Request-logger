<?php

namespace Requestlogger\Requestlogger\Traits;

use Illuminate\Support\Facades\Http;

trait HeadersTrait
{

    private $baseURL = 'https://api.bugatlas.com/v1/';


    public function processApiResponse($endPoint, $payload)
    {
        return Http::withHeaders($this->getApiHeaders())->post($this->baseURL.$endPoint, $payload);
    }



    private function getApiHeaders()
    {
        return [
            'api_key' => config('bugatlas.api_key'),
            'secret_key' => config('bugatlas.secret_key'),
            'Content-Type' => 'application/json'
        ];
    }
}

