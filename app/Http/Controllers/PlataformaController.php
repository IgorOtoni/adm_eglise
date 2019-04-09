<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblIgreja;
class PlataformaController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return view('eglise.index');
    }

    public function eglise()
    {
        //$igrejas = TblIgreja::all();
        $igrejas_e_configuracoes = \DB::table('tbl_igrejas')->leftJoin('tbl_configuracoes','tbl_igrejas.id','=','tbl_configuracoes.id_igreja')->paginate(6);
        //dd($igrejas_e_configuracoes);
        return view('eglise.igrejas', compact('igrejas_e_configuracoes'));
    }
}
