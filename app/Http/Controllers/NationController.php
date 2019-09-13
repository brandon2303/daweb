<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Nation;
use Carbon\Carbon;

class NationController extends Controller
{
    public function listar()
    {
        return $r = Nation::all();
    }

}
