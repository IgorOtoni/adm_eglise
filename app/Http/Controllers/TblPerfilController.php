<?php

namespace App\Http\Controllers;

use DataTables;
use App\TblPerfil;
use Illuminate\Http\Request;

class TblPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perfis.index');
    }

    public function tbl_perfis()
    {
        $perfis = TblPerfil::orderBy('nome', 'ASC');
        return DataTables::of($perfis)->addColumn('action',function($perfis){
            return '<form class="form-inline" method="post" action="perfis/carregarPermissoes">'.
            '<a class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>'.'&nbsp'.
            '<input type="hidden" name="id" value="'.$perfis->id.'">'.
            '<button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-cog"></i></button>'.'&nbsp'.
            '<label title="Status do Perfil" class="switch"><input onClick="switch_status(this)" name="'.$perfis->nome.'" class="status" id="'.$perfis->id.'" type="checkbox" '.(($perfis->status == 1) ? "checked" : "").'><span class="slider"></span></label>'.
            '</form>';
        })
        ->make(true);
    }

    public function carregarPermissoes($id){
        $perfil = \DB::table('tbl_perfis')
            ->select('tbl_perfis.*')
            ->where('tbl_perfis.id','=',$id)
            ->get();
        $perfil = $perfil[0];
        $modulos = \DB::table('tbl_modulos')
            ->select(\DB::raw('distinct tbl_modulos.*'))
            ->leftJoin('tbl_igrejas_modulos', 'tbl_modulos.id', '=', 'tbl_igrejas_modulos.id_modulo')
            ->leftJoin('tbl_perfis_modulos_permissoes', 'tbl_igrejas_modulos.id', '=', 'tbl_perfis_modulos_permissoes.id_modulo_igreja')
            ->leftJoin('tbl_perfis', 'tbl_perfis_modulos_permissoes.id_perfil', '=', 'tbl_perfis.id')
            ->where('tbl_perfis.id','=',$id)
            //->groupBy('tbl_modulos.id')
            ->orderBy('nome', 'ASC')
            ->get();
        $permissoes = array();
        foreach($modulos as $modulo){
            $permissoes_ativas = \DB::table('tbl_permissoes')
                ->select('tbl_permissoes.*')
                ->leftJoin('tbl_perfis_modulos_permissoes', 'tbl_permissoes.id', '=', 'tbl_perfis_modulos_permissoes.id_permissao')
                ->leftJoin('tbl_igrejas_modulos', 'tbl_perfis_modulos_permissoes.id_modulo_igreja', '=', 'tbl_igrejas_modulos.id')
                ->where('tbl_igrejas_modulos.id_modulo','=',$modulo->id)
                ->where('tbl_perfis_modulos_permissoes.id_perfil','=',$id)
                ->get();
            $permissoes[$modulo->id]['ativas'] = $permissoes_ativas;
            $permissoes_todas = \DB::table('tbl_permissoes')
                ->select('tbl_permissoes.*')
                ->leftJoin('tbl_modulos_permissoes', 'tbl_modulos_permissoes.id_permissao', '=', 'tbl_permissoes.id')
                ->leftJoin('tbl_modulos', 'tbl_modulos.id', '=', 'tbl_modulos_permissoes.id_modulo')
                ->where('tbl_modulos.id','=',$modulo->id)
                ->orderBy('nome', 'ASC')
                ->get();
            $permissoes[$modulo->id]['todas'] = $permissoes_todas;
        }
        return view('perfis.permissoes', compact('perfil','modulos', 'permissoes'));
    }

    public function switchStatus(Request $request){
        $perfil = TblPerfil::find($request->id);
        ($perfil->status == 1) ? $perfil->status = 0 : $perfil->status = 1 ;
        $perfil->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
