<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinalStatementRequest;
use Inertia\Inertia;
use OpenAI\Laravel\Facades\OpenAI;

class FinalStatementController extends Controller
{
    const string assistantId = 'asst_3sabpJtkr0wwdqWGwHMHHUz5';

    public function index()
    {
        return Inertia::render('FinalStatement/Index');
    }

    public function store(StoreFinalStatementRequest $request)
    {
        $thread = auth()->user()->threads()->updateOrCreate(
            ['id' => $request->id],
            [
                'thread_id'    => 'dfsfsdfsd',
                'assistant_id' => self::assistantId,
                'last_message' => $request->message,
            ]
        );

        return to_route('final-statements.index', ['id' => $thread->id]);
    }

    //    public function store(StoreFinalStatementRequest $request)
    //    {
    //       $response = $this->createAndRun($request->message);
    //
    //       $run = $this->waitOnRun($response, $response->threadId);
    //
    //       $messages = [];
    //        if ($run->status === 'completed') {
    //            $messages = OpenAI::threads()->messages()->list($run->threadId);
    //        }
    //
    //        dd($messages);
    //    }

    private function waitOnRun($run, $threadId)
    {
        while ($run->status === 'queued' || $run->status === 'in_progress') {
            $run = OpenAI::threads()->runs()->retrieve($threadId, $run->id);
            sleep(1);
        }

        return $run;
    }

    private function createAndRun($message)
    {
        return OpenAI::threads()->createAndRun(
            [
                'assistant_id' => self::assistantId,
                'instructions' => 'Você só responde perguntas relacionadas ao direito brasileiro.',
                'thread'       => [
                    'messages' => [
                        [
                            'role'    => 'user',
                            'content' => $message,
                        ],
                    ],
                ],
            ]
        );
    }
}
