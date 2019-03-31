<?php

namespace App\Http\Controllers;

class IgrejaController extends Controller
{
    public function index($url)
    {
        //$configuracao = TblConfiguracoes::where('url','=',$url)->get();
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $eventos_fixos = \DB::table('tbl_eventos_fixos')
            ->where('id_igreja', '=', $igreja->id)
            ->get();
        $eventos = \DB::table('tbl_eventos')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('dados_horario_inicio','DESC')
            ->limit(4)
            ->get();
        $noticias = \DB::table('tbl_noticias')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('created_at','DESC')
            ->limit(3)
            ->get();
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $galerias = \DB::table('tbl_galerias')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('data', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
        $fotos = array();
        foreach($galerias as $galeria){
            $fotos_ = \DB::table('tbl_fotos')
                ->where('id_galeria', '=', $galeria->id)
                ->orderBy('created_at', 'DESC')
                ->get();
            $fotos[$galeria->id] = $fotos_;
        }
        return view('layouts.template' . $igreja->id_template . '.index', compact('igreja', 'modulos', 'eventos_fixos', 'eventos', 'noticias', 'galerias', 'fotos'));
    }
    public function ministros($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        return view('layouts.template' . $igreja->id_template . '.ministros', compact('igreja', 'modulos'));
    }
    public function noticias($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $noticias = \DB::table('tbl_noticias')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('layouts.template' . $igreja->id_template . '.noticias', compact('igreja', 'modulos', 'noticias'));
    }
    public function sermoes($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $sermoes = \DB::table('tbl_sermoes')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('layouts.template' . $igreja->id_template . '.sermoes', compact('igreja', 'modulos', 'sermoes'));
    }
    public function contato($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        return view('layouts.template' . $igreja->id_template . '.contato', compact('igreja', 'modulos'));
    }
    public function apresentacao($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        return view('layouts.template' . $igreja->id_template . '.apresentacao', compact('igreja', 'modulos'));
    }
    public function eventosfixos($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $eventos_fixos = \DB::table('tbl_eventos_fixos')
            ->where('id_igreja', '=', $igreja->id)
            ->get();
        return view('layouts.template' . $igreja->id_template . '.eventosfixos', compact('igreja', 'modulos', 'eventos_fixos'));
    }
    public function eventos($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $eventos = \DB::table('tbl_eventos')
            ->where('id_igreja', '=', $igreja->id)
            ->where(function ($query) {
                $query->where('dados_horario_inicio', '>=', date('Y-m-d h:i:s', time()))
                    ->orWhere('dados_horario_fim', '>=', date('Y-m-d h:i:s', time()));
            })
            ->orderBy('dados_horario_inicio', 'DESC')
            ->get();
        return view('layouts.template' . $igreja->id_template . '.eventos', compact('igreja', 'modulos', 'eventos'));
    }
    public function login($url)
    {
        $igreja = obter_dados_igreja($url);
        return view('auth.login',compact('igreja'));
    }
    public function galeria($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $galerias = \DB::table('tbl_galerias')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('data', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->get();
        $fotos = array();
        foreach($galerias as $galeria){
            $fotos_ = \DB::table('tbl_fotos')
                ->where('id_galeria', '=', $galeria->id)
                ->orderBy('created_at', 'DESC')
                ->get();
            $fotos[$galeria->id] = $fotos_;
        }
        return view('layouts.template' . $igreja->id_template . '.galeria', compact('igreja', 'modulos', 'galerias', 'fotos'));
    }
    public function carrega_imagem($largura,$altura,$pasta,$arquivo){
        return view('exemplo2', compact('largura', 'altura', 'pasta', 'arquivo'));
    }
}
