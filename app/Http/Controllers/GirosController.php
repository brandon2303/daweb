<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Giro;

class GirosController extends Controller
{
    protected function listar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        return $r = Giro::listarModel();
    }
}
