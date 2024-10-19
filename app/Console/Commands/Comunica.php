<?php

declare(strict_types = 1);

namespace App\Console\Commands;

use App\Services\Comunica\Jobs\ComunicaAdvogadosJob;
use Illuminate\Console\Command;

class Comunica extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:comunica';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comunicações Processuais PJ-e';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        ComunicaAdvogadosJob::dispatch();
    }
}
