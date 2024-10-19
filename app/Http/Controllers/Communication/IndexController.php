<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Communication;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Communication/Index', [
            'data' => auth()->user()->communications()->latest()->get(),
        ]);
    }
}
