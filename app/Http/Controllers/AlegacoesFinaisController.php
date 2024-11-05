<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlegacaoFinalRequest;
use Inertia\Inertia;

class AlegacoesFinaisController extends Controller
{
    public function index()
    {
        return Inertia::render('Pecas/AlegacoesFinais/Index');
    }

    public function store(StoreAlegacaoFinalRequest $request)
    {
        dd($request->validate());
    }
}
