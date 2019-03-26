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
        return view('layouts.template'.$igreja->id_template.'.index', compact('igreja','modulos'));
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
        return view('layouts.template'.$igreja->id_template.'.noticias', compact('igreja','modulos'));
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
}
