<?php

namespace App\Http\Controllers;

class IgrejaController extends Controller
{
    public function index($url)
    {
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
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        return view('layouts.template' . $igreja->id_template . '.index', compact('igreja', 'modulos', 'eventos_fixos', 'eventos', 'noticias', 'galerias', 'fotos', 'menus', 'submenus', 'subsubmenus'));
    }
    public function ministros($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        return view('layouts.template' . $igreja->id_template . '.ministros', compact('igreja', 'modulos', 'menus', 'submenus', 'subsubmenus'));
    }
    public function noticias($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $noticias = \DB::table('tbl_noticias')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(3);
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        return view('layouts.template' . $igreja->id_template . '.noticias', compact('igreja', 'modulos', 'noticias', 'menus', 'submenus', 'subsubmenus'));
    }
    public function sermoes($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        $sermoes = \DB::table('tbl_sermoes')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('layouts.template' . $igreja->id_template . '.sermoes', compact('igreja', 'modulos', 'sermoes', 'menus', 'submenus', 'subsubmenus'));
    }
    public function contato($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        return view('layouts.template' . $igreja->id_template . '.contato', compact('igreja', 'modulos', 'menus', 'submenus', 'subsubmenus'));
    }
    public function apresentacao($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        return view('layouts.template' . $igreja->id_template . '.apresentacao', compact('igreja', 'modulos', 'menus', 'submenus', 'subsubmenus'));
    }
    public function eventosfixos($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        if($igreja->id_template == 2){
            $eventos_fixos = \DB::table('tbl_eventos_fixos')
                ->where('id_igreja', '=', $igreja->id)
                ->get();
        }else if($igreja->id_template == 1){
            $eventos_fixos = \DB::table('tbl_eventos_fixos')
                ->where('id_igreja', '=', $igreja->id)
                ->paginate(3);
        }else{
            $eventos_fixos = \DB::table('tbl_eventos_fixos')
                ->where('id_igreja', '=', $igreja->id)
                ->paginate(4);
        }
        return view('layouts.template' . $igreja->id_template . '.eventosfixos', compact('igreja', 'modulos', 'eventos_fixos', 'menus', 'submenus', 'subsubmenus'));
    }
    public function eventos($url)
    {
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        if($igreja->id_template != 2){
            $eventos = \DB::table('tbl_eventos')
                ->where('id_igreja', '=', $igreja->id)
                ->where(function ($query) {
                    $query->where('dados_horario_inicio', '>=', date('Y-m-d h:i:s', time()))
                        ->orWhere('dados_horario_fim', '>=', date('Y-m-d h:i:s', time()));
                })
                ->orderBy('dados_horario_inicio', 'DESC')
                ->paginate(4);
        }else{
            $eventos = \DB::table('tbl_eventos')
                ->where('id_igreja', '=', $igreja->id)
                ->where(function ($query) {
                    $query->where('dados_horario_inicio', '>=', date('Y-m-d h:i:s', time()))
                        ->orWhere('dados_horario_fim', '>=', date('Y-m-d h:i:s', time()));
                })
                ->orderBy('dados_horario_inicio', 'DESC')
                ->get();
        }
        return view('layouts.template' . $igreja->id_template . '.eventos', compact('igreja', 'modulos', 'eventos', 'menus', 'submenus', 'subsubmenus'));
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
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        $galerias = \DB::table('tbl_galerias')
            ->where('id_igreja', '=', $igreja->id)
            ->orderBy('data', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        $fotos = array();
        foreach($galerias as $galeria){
            $fotos_ = \DB::table('tbl_fotos')
                ->where('id_galeria', '=', $galeria->id)
                ->orderBy('created_at', 'DESC')
                ->get();
            $fotos[$galeria->id] = $fotos_;
        }
        return view('layouts.template' . $igreja->id_template . '.galeria', compact('igreja', 'modulos', 'galerias', 'fotos', 'menus', 'submenus', 'subsubmenus'));
    }
    public function publicacao($url,$id){
        $igreja = obter_dados_igreja($url);
        $modulos = obter_modulos_igreja($igreja);
        $retorno = obter_menus_configuracao($igreja->id_configuracao);
        $menus = $retorno[0];
        $submenus = $retorno[1];
        $subsubmenus = $retorno[2];
        $publicacao = \DB::table('tbl_publicacoes')
            ->where('id_igreja', '=', $igreja->id)
            ->where('id', '=', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $publicacao = $publicacao[0];
        return view('layouts.template' . $igreja->id_template . '.publicacao', compact('igreja', 'modulos', 'publicacao', 'menus', 'submenus', 'subsubmenus'));
    }
    public function carrega_imagem($largura,$altura,$pasta,$arquivo){
        return view('exemplo2', compact('largura', 'altura', 'pasta', 'arquivo'));
    }
}
