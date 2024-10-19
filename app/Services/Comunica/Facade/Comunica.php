<?php

namespace App\Services\Comunica\Facade;

use App\Services\Comunica\ComunicaService;
use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\Comunica\ComunicaService
 * @method static \Illuminate\Http\Client\Response getCommunications()
 */
class Comunica extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ComunicaService::class;
    }
}
