<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblConfiguracoes;

class IgrejaController extends Controller
{
    public function index($url){
        //$configuracao = TblConfiguracoes::where('url','=',$url)->get();
        $igreja = \DB::table('tbl_igrejas')
            ->select('tbl_igrejas.*', 'tbl_configuracoes.id as id_configuracao', 'tbl_configuracoes.url','tbl_configuracoes.id_template')
            ->leftJoin('tbl_configuracoes', 'tbl_igrejas.id', '=', 'tbl_configuracoes.id_igreja')
            ->where('url','=',$url)
            ->orderBy('nome', 'ASC')
            ->get();
        $igreja = $igreja[0];
        $modulos = \DB::table('tbl_igrejas_modulos')
            ->select('tbl_igrejas_modulos.id_modulo')
            ->where('id_igreja','=',$igreja->id)
            ->get();
        return view('layouts.template'.$igreja->id_template.'.index', compact('igreja','modulos'));
    }
    public function eventos($url){
        return view('igreja.eventos');
    }
    public function ministros($url){
        return view('igreja.ministros');
    }
    public function noticias($url){
        return view('igreja.noticias');
    }
    public function sermoes($url){
        return view('igreja.sermoes');
    }
}
