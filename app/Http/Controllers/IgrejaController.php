<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblConfiguracoes;

class IgrejaController extends Controller
{
    public function index($url){
        //$configuracao = TblConfiguracoes::where('url','=',$url)->get();
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $eventos_fixos = \DB::table('tbl_eventos_fixos')
            ->where('id_igreja','=',$igreja->id)
            ->get();
        return view('layouts.template'.$igreja->id_template.'.index', compact('igreja','modulos','eventos_fixos'));
    }
    public function eventos($url){
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        return view('layouts.template'.$igreja->id_template.'.eventos', compact('igreja','modulos'));
    }
    public function ministros($url){
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        return view('layouts.template'.$igreja->id_template.'.ministros', compact('igreja','modulos'));
    }
    public function noticias($url){
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $noticias = \DB::table('tbl_noticias')
            ->where('id_igreja','=',$igreja->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('layouts.template'.$igreja->id_template.'.noticias', compact('igreja','modulos','noticias'));
    }
    public function sermoes($url){
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        return view('layouts.template'.$igreja->id_template.'.sermoes', compact('igreja','modulos'));
    }
    public function contato($url){
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        return view('layouts.template'.$igreja->id_template.'.contato', compact('igreja','modulos'));
    }
    public function apresentacao($url){
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        return view('layouts.template'.$igreja->id_template.'.apresentacao', compact('igreja','modulos'));
    }
    public function eventosfixos($url){
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $eventos_fixos = \DB::table('tbl_eventos_fixos')
            ->where('id_igreja','=',$igreja->id)
            ->get();
        return view('layouts.template'.$igreja->id_template.'.eventosfixos', compact('igreja','modulos','eventos_fixos'));
    }
}
