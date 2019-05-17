<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblIgreja;
use App\TblIgrejasModulos;
use App\TblConfiguracoes;
class PlataformaController extends Controller
{
    public function index(){
        return view('eglise.index');
    }

    public function eglise()
    {
        //$igrejas = TblIgreja::all();
        $igrejas_e_configuracoes = \DB::table('tbl_igrejas')->leftJoin('tbl_configuracoes','tbl_igrejas.id','=','tbl_configuracoes.id_igreja')->paginate(6);
        //dd($igrejas_e_configuracoes);
        return view('eglise.igrejas', compact('igrejas_e_configuracoes'));
    }

    public function formulario(){
        return view('eglise.formulario');
    }

    public function cadastro(Request $request){
        $igreja = new TblIgreja();
        $igreja->nome = fistCharFromWord_toUpper($request->nome);        
        $igreja->cep = $request->cep;
        $igreja->num = $request->num;
        $igreja->rua = $request->rua;
        $igreja->cidade = $request->cidade;
        $igreja->complemento = $request->complemento;
        $igreja->bairro = $request->bairro;
        $igreja->estado = $request->estado;
        $igreja->telefone = $request->telefone;
        $igreja->email = $request->email;
        $igreja->logo = "vazio";

        $count = TblIgreja::where("nome", "=", $igreja->nome)->count();
        if($count == 0){
            $igreja->save();

            //convertendo imagem base64
            $img = $request->logo;

            \Image::make($request->logo)->save(public_path('storage/igrejas/').'logo-igreja-'.$igreja->id.'.'.strtolower($request->logo->getClientOriginalExtension()),90);

            $igreja->logo = 'logo-igreja-'.$igreja->id.'.'.strtolower($request->logo->getClientOriginalExtension());

            $igreja->save();
            $modulo = new TblIgrejasModulos();

            foreach ($request->modulos as $key => $value) {
                $data = [
                    'id_igreja' => $igreja->id,
                    'id_modulo' => $value
                ];
                $modulo->create($data);
            }

            $configuracao = new TblConfiguracoes();
            $configuracao->id_igreja = $igreja->id;
            $configuracao->cor = 'white';
            $configuracao->id_template = 1;
            $configuracao->save();

            $notification = array(
                'message' => 'Bem vindo(a) a plataforma Église!', 
                'alert-type' => 'success'
            );

            //return view('igrejas.index')->with($notification);
            return redirect()->route('plataforma.congregacoes')->with($notification);

        }else{

            $notification = array(
                'message' => 'Já existe uma igreja com esse nome, por favor escolha outro nome.', 
                'alert-type' => 'error'
            );

            return back()->with($notification);

        }
    }
}
