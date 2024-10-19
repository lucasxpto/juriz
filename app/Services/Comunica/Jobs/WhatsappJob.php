<?php

declare(strict_types = 1);

namespace App\Services\Comunica\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsappJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $number, protected $comunicacao)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // formatar a notificação para o padrão do whatsapp usando markdown

        $texto = "*{$this->comunicacao->sigla_tribunal} - {$this->comunicacao->numeroprocessocommascara}*\n";
        $texto .= "*Data de disponibilização:* {$this->comunicacao->data_disponibilizacao}\n";
        $texto .= "*Classe:* {$this->comunicacao->nome_classe}\n";
        $texto .= "*Tribunal:* {$this->comunicacao->nome_orgao}\n";
        $texto .= "*Tipo de Comunicação:* {$this->comunicacao->tipo_comunicacao}\n";
        $texto .= "*Tipo de Documento:* {$this->comunicacao->tipo_documento}\n";
        $texto .= "*Meio:* {$this->comunicacao->meio}\n";
        $texto .= "*Inteiro teor:* {$this->comunicacao->link}\n";

        $response = Http::withHeaders([
            'globalApikey' => 'yZ42RfLyfxAF2nHHm4Q6m7jam2ilT8pj3BmZpoFfc5Sig74xt8',
            'apikey'       => '2E5F7C17D5E4-4884-8813-A411759A3C23',
        ])->post('https://evolution-api.perta.io/message/sendText/ReciboOnline', [
            'number' => '55' . preg_replace('/[^0-9]/', '', $this->number),
            'text'   => $texto,
        ]);

        if ($response->successful()) {
            Log::info('Mensagem enviada com sucesso:: ' . $this->number);
        } else {
            Log::error('Erro ao enviar mensagem:: ' . $response->json());
        }
    }
}
