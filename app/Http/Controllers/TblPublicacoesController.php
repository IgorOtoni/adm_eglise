<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TblPublicacoesController extends Controller
{
    public function index()
    {
        return view('publicacoes.index');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
