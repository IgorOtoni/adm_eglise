<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblIgreja;
class PlataformaController extends Controller
{
    public function __construct()
    {
        
    }

    public function eglise()
    {
        $igrejas = TblIgreja::all();
        return view('eglise.index', compact('igrejas'));
    }
}
