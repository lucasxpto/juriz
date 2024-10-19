<?php

namespace App\Services\Comunica;

use App\Models\User;
use App\Services\Comunica\Resource\Comunica;
use App\Services\Comunica\Resource\ComunicacaoEntitie;
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

    public function getCommunications($url): Response
    {
        return $this->http->get('/comunicacao?' . $url);
    }
}
