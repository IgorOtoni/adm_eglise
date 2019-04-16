<?php

namespace App\Http\Controllers;

use Image;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\TblPerfil;
use App\TblBanner;
use App\TblModulo;
use App\TblGalerias;
use App\TblFotos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->id_perfil == 1){
            return view('home');
        }else{
            return view('usuario.home');
        }
    }

    // BANNER AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function banners()
    {
        if(\Auth::user()->id_perfil == 1){
            return view('home');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
            return view('usuario.banners', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_banners(){
        $perfil = TblPerfil::find(\Auth::user()->id_perfil);
        $banners = TblBanner::where('id_igreja','=',$perfil->id_igreja)->get();
        return DataTables::of($banners)->addColumn('action',function($banners){
            return '<a href="editarBanner/'.$banners->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>'.'&nbsp'.
            '<a href="excluirBanner/'.$banners->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
        })
        ->make(true);
    }

    public function editarBanner($id){
        $banner = TblBanner::find($id);
        $perfil = TblPerfil::find(\Auth::user()->id_perfil);
        $igreja = obter_dados_igreja_id($perfil->id_igreja);
        $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
        return view('usuario.editarbanner', compact('banner','igreja','modulos_igreja'));
    }

    public function atualizarBanner(Request $request){
        $banner = TblBanner::find($request->id);
        $banner->nome = $request->nome;
        $banner->ordem = $request->ordem;
        $banner->descricao = $request->descricao;if($request->link == 0){
            $banner->link = null;
        }if($request->link == 1){
            $modulo = TblModulo::find($request->modulo);
            $banner->link = $modulo->rota;
        }else if($request->link == 2){
            $banner->link = 'publicacao/'.$request->publicacao;
        }else if($request->link == 3){
            $banner->link = $request->url;
        }
        \Image::make($request->foto)->save(public_path('storage/banners/').'banner-'.$banner->id.'-'.$request->igreja.'.'.$request->foto->getClientOriginalExtension(),90);
        $banner->foto = 'banner-'.$banner->id.'-'.$request->igreja.'.'.$request->foto->getClientOriginalExtension();
        $banner->save();

        $notification = array(
            'message' => 'Banner ' . $banner->nome . ' foi alterado com sucesso!', 
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function incluirBanner(Request $request){
        $banner = new TblBanner();
        $banner->id_igreja = $request->igreja;
        $banner->nome = $request->nome;
        $banner->ordem = $request->ordem;
        $banner->descricao = $request->descricao;
        $banner->foto = "null";
        if($request->link == 0){
            $banner->link = null;
        }if($request->link == 1){
            $modulo = TblModulo::find($request->modulo);
            $banner->link = $modulo->rota;
        }else if($request->link == 2){
            $banner->link = 'publicacao/'.$request->publicacao;
        }else if($request->link == 3){
            $banner->link = $request->url;
        }
        $banner->save();

        \Image::make($request->foto)->save(public_path('storage/banners/').'banner-'.$banner->id.'-'.$request->igreja.'.'.$request->foto->getClientOriginalExtension(),90);
        $banner->foto = 'banner-'.$banner->id.'-'.$request->igreja.'.'.$request->foto->getClientOriginalExtension();
        $banner->save();

        $notification = array(
            'message' => 'Banner ' . $banner->nome . ' foi adicionado com sucesso!', 
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function excluirFotoBanner(Request $request){
        $foto = $request['foto'];
        $banner = TblBanner::find($request->id);
        $banner->foto = "vazio";
        $banner->save();
        File::delete(public_path().'/storage/banners/'.$foto);
        return \Response::json(['message' => 'File successfully delete'], 200);
    }

    public function excluirBanner($id){
        $banner = TblBanner::find($id);
        File::delete(public_path().'/storage/banners/'.$banner->foto);
        $banner->delete();

        $notification = array(
            'message' => 'Banner ' . $banner->nome . ' foi excluído com sucesso!', 
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    // GALERIA AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function galerias()
    {
        if(\Auth::user()->id_perfil == 1){
            return view('home');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
            return view('usuario.galerias', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_galerias(){
        $perfil = TblPerfil::find(\Auth::user()->id_perfil);
        $galeria = TblGalerias::where('id_igreja','=',$perfil->id_igreja)->get();
        return DataTables::of($galeria)->addColumn('action',function($galeria){
            return '<a href="editarGaleria/'.$galeria->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>'.'&nbsp'.
            '<a href="excluirGaleria/'.$galeria->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
        })
        ->make(true);
    }

    public function incluirGaleria(Request $request){
        $galeria = new TblGalerias();
        $galeria->id_igreja = $request->igreja;
        $galeria->nome = $request->nome;
        $galeria->descricao = $request->descricao;
        $galeria->data = muda_data($request->data);
        $galeria->save();

        foreach($request->fotos as $f_){
            $foto = new TblFotos();
            $foto->id_galeria = $galeria->id;
            $foto->foto = "vazio";
            $foto->save();

            \Image::make($f_)->save(public_path('storage/galerias/').'foto-'.$foto->id.'-'.$galeria->id.'-'.$request->igreja.'.'.$f_->getClientOriginalExtension(),90);
            $foto->foto = 'foto-'.$foto->id.'-'.$galeria->id.'-'.$request->igreja.'.'.$f_->getClientOriginalExtension();
            $foto->save();
        }
            
        $notification = array(
            'message' => 'Álbum ' . $galeria->nome . ' foi adicionado com sucesso!', 
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function excluirGaleria($id){
        $galeria = TblGalerias::find($id);
        $fotos = TblFotos::where("id_galeria","=",$galeria->id)->get();
        foreach($fotos as $foto){
            File::delete(public_path().'/storage/galerias/'.$foto->foto);
            $foto->delete();
        }
        $galeria->delete();

        $notification = array(
            'message' => 'Álbum ' . $galeria->nome . ' foi excluído com sucesso!', 
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function editarGaleria($id){
        $galeria = TblGalerias::find($id);
        $perfil = TblPerfil::find(\Auth::user()->id_perfil);
        $igreja = obter_dados_igreja_id($perfil->id_igreja);
        $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
        return view('usuario.editargaleria', compact('galeria','igreja','modulos_igreja'));
    }
    ////////////////////////////////////////////////////////////////////////////////////////
}
