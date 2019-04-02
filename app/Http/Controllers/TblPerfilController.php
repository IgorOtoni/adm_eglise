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
            return '<a class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>'.'&nbsp'.
            //'<a class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>'.'&nbsp'.
            '<label title="Status do Perfil" class="switch"><input onClick="switch_status(this)" name="'.$perfis->nome.'" class="status" id="'.$perfis->id.'" type="checkbox" '.(($perfis->status == 1) ? "checked" : "").'><span class="slider"></span></label>';;
        })
        ->make(true);
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
