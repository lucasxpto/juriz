<?php

declare(strict_types = 1);

namespace App\Services\Comunica\Jobs;

use App\Events\ComunicaEventJobFailed;
use App\Models\User;
use App\Services\Comunica\Facade\Comunica;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ComunicaSyncJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public int $page = 1)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $queryString = http_build_query([
            'pagina'                     => $this->page,
            'itensPorPagina'             => 10,
            'numeroOab'                  => $this->user->numero_oab,
            'ufOab'                      => $this->user->uf_oab,
            'dataDisponibilizacaoInicio' => now()->format('Y-m-d'),
        ]);

        $response = Comunica::getCommunications($queryString);

        $communications = $response->json();

        if (empty($communications['items'])) {
            return;
        }

        foreach ($communications['items'] as $communication) {
            ComunicaJob::dispatch($communication, $this->user);
        }

        ComunicaSyncJob::dispatch($this->user, $this->page + 1);
    }

    public function failed(): void
    {
        event(new ComunicaEventJobFailed());
    }
}
