<?php

namespace App\Services\Comunica\Jobs;

use App\Models\Communication;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DestinatariosJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $destinatarios, public Communication $comunicacao)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->destinatarios as $destinatario) {
            $this->comunicacao->recipients()->create([
                'comunicacao_id' => $this->comunicacao->id,
                'nome' => $destinatario['nome'],
                'polo' => $destinatario['polo'],
            ]);
        }
    }
}
