<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FinalStatementController extends Controller
{
    const string assistent_id = 'asst_3sabpJtkr0wwdqWGwHMHHUz5';

    public function index()
    {
        return Inertia::render('FinalStatement/Index');
    }
}
