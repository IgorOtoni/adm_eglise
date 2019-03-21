<?php

namespace App\Http\Controllers;
use Image;
use DataTables;
use App\TblIgreja;
use App\TblIgrejasModulos;
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
            return '<a href="igrejas/editarIgreja/'.$igrejas->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>'.'&nbsp'.
            //'<a class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>'.'&nbsp'.
            '<label title="Status da Igreja" class="switch"><input onClick="switch_status(this)" name="'.$igrejas->nome.'" class="status" id="'.$igrejas->id.'" type="checkbox" '.(($igrejas->status == 1) ? "checked" : "").'><span class="slider"></span></label>';
        })
        ->make(true);
    }

    public function switchStatus(Request $request){
        $igreja = TblIgreja::find($request->id);
        ($igreja->status == 1) ? $igreja->status = 0 : $igreja->status = 1 ;
        $igreja->save();
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
        $igreja->rua = $request->rua;
        $igreja->cidade = $request->cidade;
        $igreja->complemento = $request->complemento;
        $igreja->bairro = $request->bairro;
        $igreja->estado = $request->estado;
        $igreja->telefone = $request->telefone;

        //convertendo imagem base64
        $img = $request->logo;

        //dd($request->logo->getClientOriginalExtension());
        //$igreja->logo = Image::make($img)->encode('data-url');

        \Image::make($request->logo)->save(public_path('img/igrejas/').$igreja->nome.'.'.$request->logo->getClientOriginalExtension(),90);

        //$igreja->logo =  public_path('img/igrejas/').$igreja->nome.'.'.$request->logo->getClientOriginalExtension();
        $igreja->logo = $igreja->nome.'.'.$request->logo->getClientOriginalExtension();

        $igreja->save();
        $modulo = new TblIgrejasModulos();

        foreach ($request->modulos as $key => $value) {
            $data = [
                'id_igreja' => $igreja->id,
                'id_modulo' => $value
            ];
            $modulo->create($data);
        }

        $notification = array(
            'message' => $igreja->nome . ' foi incluído(a) com sucesso!', 
            'alert-type' => 'success'
        );

        //return view('igrejas.index')->with($notification);
        return redirect()->route('igrejas')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tbl_Igreja  $tbl_Igreja
     * @return \Illuminate\Http\Response
     */
    public function show(Tbl_Igreja $tbl_Igreja)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tbl_Igreja  $tbl_Igreja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $igreja = TblIgreja::findOrfail($id);
        $modulos_igreja = TblIgrejasModulos::where('id_igreja', '=', $id)->get();
        return view('igrejas.edit', compact('igreja','modulos_igreja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tbl_Igreja  $tbl_Igreja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $igreja = TblIgreja::find($request->id);
        $igreja->nome = $request->nome;
        $igreja->cep = $request->cep;
        $igreja->num = $request->num;
        $igreja->rua = $request->rua;
        $igreja->cidade = $request->cidade;
        $igreja->complemento = $request->complemento;
        $igreja->bairro = $request->bairro;
        $igreja->estado = $request->estado;
        $igreja->telefone = $request->telefone;

        if($request->logo){
            //convertendo imagem base64
            $img = $request->logo;
            \Image::make($request->logo)->save(public_path('img/igrejas/').$igreja->nome.'.'.$request->logo->getClientOriginalExtension(),90);
            $igreja->logo = $igreja->nome.'.'.$request->logo->getClientOriginalExtension();
        }

        $igreja->save();

        TblIgrejasModulos::where('id_igreja', '=',  $request->id)->delete();

        $modulo = new TblIgrejasModulos();

        foreach ($request->modulos as $key => $value) {
            $data = [
                'id_igreja' => $igreja->id,
                'id_modulo' => $value
            ];
            $modulo->create($data);
        }

        $notification = array(
            'message' => $igreja->nome . ' foi atualizado(a) com sucesso!', 
            'alert-type' => 'success'
        );

        return redirect()->route('igrejas')->with($notification);
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
