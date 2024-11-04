<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class AlegacoesFinaisController extends Controller
{
    public function index()
    {
        return Inertia::render('Pecas/AlegacoesFinais/Index');
    }
}
