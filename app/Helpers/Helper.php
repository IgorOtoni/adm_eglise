<?php
/**
* change first char from word to upper
*
* @param $string
*/

function fistCharFromWord_toUpper($string)
{
    $st = '';
    $splitString = explode(' ', $string);
    foreach($splitString as $str){
        $first_letter = mb_strtoupper(mb_substr($str, 0, 1, "UTF-8"), "UTF-8");
        $str =  mb_substr($str, 1, mb_strlen($str, "UTF-8"), "UTF-8");
        $st = $st.' '.$first_letter.$str;
    }
    return $st;   
}
function obter_dados_igreja($url){
    $igreja = \DB::table('tbl_igrejas')
        ->select('tbl_igrejas.*', 'tbl_configuracoes.id as id_configuracao', 'tbl_configuracoes.url','tbl_configuracoes.id_template','tbl_configuracoes.texto_apresentativo','tbl_configuracoes.facebook','tbl_configuracoes.youtube','tbl_configuracoes.twitter')
        ->leftJoin('tbl_configuracoes', 'tbl_igrejas.id', '=', 'tbl_configuracoes.id_igreja')
        ->where('url','=',$url)
        ->orderBy('nome', 'ASC')
        ->get();
    return $igreja[0];
}
function obter_modulos_igreja($igreja){
    $modulos = \DB::table('tbl_igrejas_modulos')
        ->select('tbl_igrejas_modulos.id_modulo')
        ->where('id_igreja','=',$igreja->id)
        ->get();
    return $modulos;
}
function obter_menus_configuracao($id){
    $menus = \DB::table('tbl_menus')
        ->where('id_configuracao', '=', $id)
        ->orderBy('ordem', 'ASC')
        ->get();
    $submenus = array();
    foreach($menus as $menu){
        $submenus_ = \DB::table('tbl_sub_menus')
            ->where('id_menu', '=', $menu->id)
            ->orderBy('ordem', 'ASC')
            ->get();
        if($submenus_ != null && count($submenus_) > 0) $submenus[$menu->id] = $submenus_;
    }
    $subsubmenus = array();
    foreach($submenus as $submenu__){
        foreach($submenu__ as $submenu){
            $subsubmenus_ = \DB::table('tbl_sub_sub_menus')
                ->where('id_submenu', '=', $submenu->id)
                ->orderBy('ordem', 'ASC')
                ->get();
            if($subsubmenus_ != null && count($subsubmenus_) > 0) $subsubmenus[$submenu->id] = $subsubmenus_;
        }
    }
    return array($menus, $submenus, $subsubmenus);
}
function muda_cep($cep){
    return str_replace(".", "", str_replace("-", "", $cep));
}