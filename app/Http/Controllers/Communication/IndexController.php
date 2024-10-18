<?php

namespace App\Http\Controllers\Communication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Communication/Index');
    }
}
