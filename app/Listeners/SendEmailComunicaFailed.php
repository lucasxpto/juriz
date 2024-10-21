<?php

declare(strict_types = 1);

namespace App\Listeners;

use App\Events\ComunicaEventJobFailed;
use App\Mail\ComunicaEmailFailedJob;
use Illuminate\Support\Facades\Mail;

class SendEmailComunicaFailed
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ComunicaEventJobFailed $event): void
    {
        Mail::to('info@perta.io')->send(new ComunicaEmailFailedJob());
    }
}
