<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinalStatementRequest;
use Inertia\Inertia;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;

class FinalStatementController extends Controller
{
    const string assistantId = 'asst_3sabpJtkr0wwdqWGwHMHHUz5';

    public function index()
    {
        return Inertia::render('FinalStatement/Index');
    }

    public function show()
    {
        return Inertia::render('FinalStatement/Show');
    }

    public function store(StoreFinalStatementRequest $request)
    {
        $attachments = $this->prepareAttachments($request->file_ids);

        $prompt = $this->buildPrompt($request);

        $response = $this->createAndRun($prompt, $attachments);

        $run = $this->waitOnRun($response, $response->threadId);

        if ($run->status === 'completed') {
            $messages = OpenAI::threads()->messages()->list($run->threadId);
            $document = $messages->data[0]->content[0]->text->value;
        } else {
            $document = 'Erro: O processamento não foi concluído. Status: ' . $run->status;
            if ($run->lastError) {
                $document .= ' Erro: ' . $run->lastError->message;
            }
        }

        return Inertia::render('FinalStatement/Show', [
            'document' => $document,
        ]);
    }

    private function waitOnRun($run, $threadId)
    {
        while ($run->status === 'queued' || $run->status === 'in_progress') {
            $run = OpenAI::threads()->runs()->retrieve($threadId, $run->id);
            sleep(1);
        }

        return $run;
    }

    private function createAndRun($message, $attachments = [])
    {
        return OpenAI::threads()->createAndRun(
            [
                'assistant_id' => self::assistantId,
                'instructions' => 'Você é um assistente de escritório de advocacia. Você recebe um texto e precisa analisar e corrigir o texto para que ele seja mais claro e compreensível.',
                'thread'       => [
                    'messages' => [
                        [
                            'role'        => 'user',
                            'content'     => $message,
                            'attachments' => $attachments,
                        ],
                    ],
                ],
            ]
        );
    }

    // files upload
    public function uploadFiles(Request $request)
    {
        $path = $request->file('file')->store('uploads');

        $filePath = storage_path('app/private/' . $path);

        try {
            $fileResponse = OpenAI::files()->upload([
                'file'    => fopen($filePath, 'r'),
                'purpose' => 'assistants',
            ]);

            // Retorna o ID do arquivo da OpenAI
            return response()->json([
                'success' => true,
                'file_id' => $fileResponse['id'],
                'message' => 'File uploaded and sent to OpenAI successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send file to OpenAI: ' . $e->getMessage(),
            ], 500);
        }
    }

    private function buildPrompt($request)
    {
        $prompt = "Você é um assistente especializado em documentos jurídicos brasileiros.
        Gere uma peça de Alegações Finais em formato markdown usando as seguintes informações:

        DADOS DO PROCESSO:
        Endereçamento: {$request->enderecamento}
        Número do Processo: {$request->numero_processo}
        Nome do Acusado: {$request->nome_do_acusado}

        DOCUMENTOS ANEXADOS:
        - Inquérito Policial
        - Denúncia
        - Resposta à Acusação
        - Recebimento da Denúncia
        - Alegações Finais do MP

        DINÂMICA DOS FATOS:
        {$request->dinamica_fatos}

        PRELIMINAR DE MÉRITO:
        {$request->preliminar_merito}

        TESES PRELIMINARES LEVANTADAS:" .
        $this->formatarTesesPreliminares($request->teses_preliminares_merito) . "

        MÉRITO PROCESSUAL:
        {$request->merito_processual}

        TESES DE MÉRITO LEVANTADAS:" .
        $this->formatarTesesMerito($request->teses_merito_processual) . '

        REQUERIMENTOS:
        ' . $this->formatarRequerimentos($request->requerimentos) . '

        ADVOGADOS SUBSCRITORES:
        ' . $this->formatarAdvogados($request->advogados) . '

        Por favor, gere um documento em markdown seguindo a estrutura formal de peças jurídicas brasileiras,
        incorporando todas as informações fornecidas de maneira coesa e fundamentada.';

        return $prompt;
    }

    private function formatarTesesPreliminares($teses)
    {
        $tesesSelecionadas = [];

        foreach ($teses as $tese => $selecionada) {
            if ($selecionada) {
                $tesesSelecionadas[] = '- ' . str_replace('_', ' ', ucfirst($tese));
            }
        }

        return empty($tesesSelecionadas) ? "\nNenhuma tese preliminar selecionada." : "\n" . implode("\n", $tesesSelecionadas);
    }

    private function formatarTesesMerito($teses)
    {
        $tesesSelecionadas = [];

        foreach ($teses as $tese => $selecionada) {
            if ($selecionada) {
                $tesesSelecionadas[] = '- ' . str_replace('_', ' ', ucfirst($tese));
            }
        }

        return empty($tesesSelecionadas) ? "\nNenhuma tese de mérito selecionada." : "\n" . implode("\n", $tesesSelecionadas);
    }

    private function formatarRequerimentos($requerimentos)
    {
        return implode("\n", array_map(function ($req) {
            return "- {$req['value']}";
        }, $requerimentos));
    }

    private function formatarAdvogados($advogados)
    {
        return implode("\n", array_map(function ($adv) {
            return "- {$adv['nome']} - OAB: {$adv['oab']}";
        }, $advogados));
    }

    private function prepareAttachments(array $fileIds): array
    {
        $attachments = [];

        foreach ($fileIds as $fileId) {
            if (! $fileId) {
                continue;
            }
            $attachments[] = [
                'file_id' => $fileId,
                'tools'   => [['type' => 'file_search']],
            ];
        }

        return $attachments;
    }
}
