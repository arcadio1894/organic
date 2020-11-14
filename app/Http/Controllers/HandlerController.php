<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandlerController extends Controller
{
    public function error404()
    {
        return view('errors.404');
    }

    public function error405()
    {
        return view('errors.405');
    }

    public function error403()
    {
        return view('errors.403');
    }
}
