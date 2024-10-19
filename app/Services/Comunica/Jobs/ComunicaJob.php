<?php

namespace App\Services\Comunica\Jobs;

use App\Models\Communication;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ComunicaJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $comunicacao, public User $user)
    {
        $novaComunicacao = Communication::updateOrCreate(['api_comunicacao_id' => $this->comunicacao['id']], [
            'user_id' => $this->user->id,
            'data_disponibilizacao' => $this->comunicacao['data_disponibilizacao'],
            'sigla_tribunal' => $this->comunicacao['siglaTribunal'],
            'tipo_comunicacao' => $this->comunicacao['tipoComunicacao'],
            'nome_orgao' => $this->comunicacao['nomeOrgao'],
            'texto' => $this->comunicacao['texto'],
            'numero_processo' => $this->comunicacao['numero_processo'],
            'meio' => $this->comunicacao['meio'],
            'link' => $this->comunicacao['link'],
            'tipo_documento' => $this->comunicacao['tipoDocumento'],
            'nome_classe' => $this->comunicacao['nomeClasse'],
            'codigo_classe' => $this->comunicacao['codigoClasse'],
            'numero_comunicacao' => $this->comunicacao['numeroComunicacao'],
            'ativo' => $this->comunicacao['ativo'],
            'hash' => $this->comunicacao['hash'],
            'status' => $this->comunicacao['status'],
            'motivo_cancelamento' => $this->comunicacao['motivo_cancelamento'],
            'data_cancelamento' => $this->comunicacao['data_cancelamento'],
            'data_envio' => $this->comunicacao['dataenvio'],
            'meiocompleto' => $this->comunicacao['meiocompleto'],
            'numeroprocessocommascara' => $this->comunicacao['numeroprocessocommascara'],
        ]);

        DestinatariosJob::dispatch($this->comunicacao['destinatarios'], $novaComunicacao);

        AdvogadosJob::dispatch($this->comunicacao['destinatarioadvogados'], $novaComunicacao);

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
