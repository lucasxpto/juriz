<?php

declare(strict_types = 1);

namespace App\Services\Comunica\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ComunicaAdvogadosJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            ComunicaSyncJob::dispatch($user);
        }
    }
}
