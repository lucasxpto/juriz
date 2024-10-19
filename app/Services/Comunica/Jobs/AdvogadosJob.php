<?php

namespace App\Services\Comunica\Jobs;

use App\Models\Advogado;
use App\Models\Communication;
use App\Models\Lawyer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AdvogadosJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $advogados, public Communication $comunicacao)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->advogados as $advogado) {
            $novoAdvogado = Lawyer::updateOrCreate([
                'numero_oab' => $advogado['advogado']['numero_oab'],
                'uf_oab' => $advogado['advogado']['uf_oab'],
            ],[
                'nome' => $advogado['advogado']['nome'],
                'numero_oab' => $advogado['advogado']['numero_oab'],
                'uf_oab' => $advogado['advogado']['uf_oab'],
                'communication_id' => $this->comunicacao->id,
            ]);
            $this->comunicacao->lawyers()->attach($novoAdvogado->id);
        }
    }
}
