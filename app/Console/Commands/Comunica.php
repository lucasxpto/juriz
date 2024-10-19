<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Comunica extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:comunica';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comunicações Processuais PJ-e';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        $queryString = http_build_query([
            'pagina' => 1,
            'itensPorPagina' => 10,
            'numeroOab' => '249650',
            'ufOab' => 'SP',
            'dataDisponibilizacao' => '2024-10-18',
        ]);

        $r = \App\Services\Comunica\Facade\Comunica::getCommunications($queryString);

        dd($r->json());
    }
}
