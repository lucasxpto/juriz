<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinalStatementRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use OpenAI\Laravel\Facades\OpenAI;

class FinalStatementController extends Controller
{
    const string assistantId = 'asst_3sabpJtkr0wwdqWGwHMHHUz5';

    public function index()
    {
        return Inertia::render('FinalStatement/Index');
    }

    //    public function store(StoreFinalStatementRequest $request)
    //    {
    //        $thread = auth()->user()->threads()->updateOrCreate(
    //            ['id' => $request->id],
    //            [
    //                'thread_id'    => 'dfsfsdfsd',
    //                'assistant_id' => self::assistantId,
    //                'last_message' => $request->message,
    //            ]
    //        );
    //
    //        return to_route('final-statements.index', ['id' => $thread->id]);
    //    }

    public function store(Request $request)
    {
        $response = $this->createAndRun($request->message);

        $run = $this->waitOnRun($response, $response->threadId);

        $messages = [];

        if ($run->status === 'completed') {
            $messages = OpenAI::threads()->messages()->list($run->threadId);
        }
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
                'instructions' => 'Ainda estamos na fase de testes, analisando a melhor forma de interação com o usuário. Por favor, seja paciente. Os dados agora são fictícios.',
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
}