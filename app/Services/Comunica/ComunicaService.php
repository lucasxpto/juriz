<?php

declare(strict_types = 1);

namespace App\Services\Comunica;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ComunicaService
{
    private PendingRequest $http;

    public function __construct()
    {
        $this->http = Http::baseUrl('https://comunicaapi.pje.jus.br/api/v1');
    }

    /**
     * @throws ConnectionException
     */
    public function getCommunications($url): Response
    {
        return $this->http->get('/comunicacao?' . $url);
    }
}
