<?php

namespace App\Http\Controllers;

use DataTables;
use App\TblIgreja;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class TblIgrejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('igrejas.index');
    }

    public function tbl_igrejas(){
        $igrejas = TblIgreja::orderBy('nome', 'ASC');
        return DataTables::of($igrejas)->addColumn('action',function($igrejas){
            return '<a class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>'.'&nbsp'.
            '<a class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>'.'&nbsp'.
            '<div class="checkbox"><label>
              <input class="bt-status" type="checkbox" data-toggle="toggle">
            </label></div>';
        })
        ->make(true);
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
        $igreja = new TblIgreja();
        $igreja->nome = $request->nome;
        $igreja->cep = $request->cep;
        $igreja->num = $request->num;
        $igreja->cidade = $request->cidade;
        $igreja->complemento = $request->complemento;
        $igreja->bairro = $request->bairro;
        $igreja->estado = $request->estado;
        $igreja->save();
        return view('igrejas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tbl_Igreja  $tbl_Igreja
     * @return \Illuminate\Http\Response
     */
    public function show(Tbl_Igreja $tbl_Igreja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tbl_Igreja  $tbl_Igreja
     * @return \Illuminate\Http\Response
     */
    public function edit(Tbl_Igreja $tbl_Igreja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tbl_Igreja  $tbl_Igreja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tbl_Igreja $tbl_Igreja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tbl_Igreja  $tbl_Igreja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tbl_Igreja $tbl_Igreja)
    {
        //
    }
}
