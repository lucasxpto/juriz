<?php

declare(strict_types = 1);

namespace App\Services\Comunica\Facade;

use App\Services\Comunica\ComunicaService;
use Illuminate\Support\Facades\Facade;

/**
 * @see ComunicaService
 * @method static \Illuminate\Http\Client\Response getCommunications()
 */
class Comunica extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ComunicaService::class;
    }
}
