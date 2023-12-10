<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QaController extends Controller
{
    public function show()
    {
        return view('Pages.qa');
    }
}
