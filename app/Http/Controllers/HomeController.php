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
use App\TblEventosFixos;
use App\TblEventos;
use App\TblNoticias;
use App\TblMenu;
use App\TblSubMenu;
use App\TblSubSubMenu;
use App\TblConfiguracoes;
use App\TblSermoes;
use App\TblPublicacaoFotos;
use App\TblPublicacoes;
use App\User;
use App\TblPerfisIgrejasModulos;
use App\TblIgrejasModulos;
use App\TblPerfisPermissoes;
use Carbon\Carbon;
use Calendar;

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

    // FUNCOES ÚTEIS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function modulos_igreja($id){
        $modulos['data'] = \DB::table('tbl_modulos')
            ->select('tbl_modulos.*')
            ->leftJoin('tbl_igrejas_modulos', 'tbl_igrejas_modulos.id_modulo', '=', 'tbl_modulos.id')
            ->where('tbl_igrejas_modulos.id_igreja','=',$id)
            ->get();
        return json_encode($modulos);
    }
    ///////////////////////////////////////////////////////////////////////////////////////

    // BANNER AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function banners()
    {
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.banners', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_banners(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $banners = TblBanner::where('id_igreja','=',$perfil->id_igreja)->get();
            return DataTables::of($banners)->addColumn('action',function($banners){
                $btn_editar = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg'), \Config::get('constants.permissoes.alterar'))[2] == true){
                    $btn_editar = '<a href="editarBanner/'.$banners->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                }
                $btn_excluir = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg'), \Config::get('constants.permissoes.desativar'))[2] == true){
                    $btn_excluir = '<a href="excluirBanner/'.$banners->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                }
                return $btn_editar.'&nbsp'.$btn_excluir;
            })->editColumn('created_at', function($banners) {
                if($banners->created_at != null)
                    return Carbon::parse($banners->created_at)->format('d/m/Y');
                else
                    return null;
            })->editColumn('updated_at', function($banners) {
                if($banners->updated_at != null){
                    $upd = Carbon::parse($banners->updated_at)->diffForHumans();
                    return $upd;
                }else
                    return null;
            })
            ->make(true);
        }
    }

    public function editarBanner($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $banner = TblBanner::find($id);
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.editarbanner', compact('banner','igreja','modulos_igreja'));
        }else{ return view('error'); }
    }

    public function atualizarBanner(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg'), \Config::get('constants.permissoes.alterar'))[2] == true){
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
            \Image::make($request->foto)->save(public_path('storage/banners/').'banner-'.$banner->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension()),90);
            $banner->foto = 'banner-'.$banner->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension());
            $banner->save();

            $notification = array(
                'message' => 'Banner ' . $banner->nome . ' foi alterado com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.banners')->with($notification);
        }else{ return view('error'); }
    }

    public function incluirBanner(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg'), \Config::get('constants.permissoes.incluir'))[2] == true){
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

            \Image::make($request->foto)->save(public_path('storage/banners/').'banner-'.$banner->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension()),90);
            $banner->foto = 'banner-'.$banner->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension());
            $banner->save();

            $notification = array(
                'message' => 'Banner ' . $banner->nome . ' foi adicionado com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.banners')->with($notification);
        }else{ return view('error'); }
    }

    public function excluirFotoBanner(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $foto = $request['foto'];
            $banner = TblBanner::find($request->id);
            $banner->foto = "vazio";
            $banner->save();
            File::delete(public_path().'/storage/banners/'.$foto);
            return \Response::json(['message' => 'File successfully delete'], 200);
        }else{ return view('error'); }
    }

    public function excluirBanner($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.bannersg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $banner = TblBanner::find($id);
            File::delete(public_path().'/storage/banners/'.$banner->foto);
            $banner->delete();

            $notification = array(
                'message' => 'Banner ' . $banner->nome . ' foi excluído com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.banners')->with($notification);
        }else{ return view('error'); }
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    // GALERIA AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function galerias()
    {
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.galerias', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_galerias(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $galeria = TblGalerias::where('id_igreja','=',$perfil->id_igreja)->get();
            return DataTables::of($galeria)->addColumn('action',function($galeria){
                $btn_editar = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg'), \Config::get('constants.permissoes.alterar'))[2] == true){
                    $btn_editar = '<a href="editarGaleria/'.$galeria->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                }
                $btn_excluir = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg'), \Config::get('constants.permissoes.desativar'))[2] == true){
                    $btn_excluir = '<a href="excluirGaleria/'.$galeria->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                }
                return $btn_editar.'&nbsp'.$btn_excluir;
            })->editColumn('data', function($galeria) {
                if($galeria->data != null)
                    return Carbon::parse($galeria->data)->format('d/m/Y');
                else
                    return null;
            })->editColumn('created_at', function($galeria) {
                if($galeria->created_at != null)
                    return Carbon::parse($galeria->created_at)->format('d/m/Y');
                else
                    return null;
            })->editColumn('updated_at', function($galeria) {
                if($galeria->updated_at != null){
                    $upd = Carbon::parse($galeria->updated_at)->diffForHumans();
                    return $upd;
                }else
                    return null;
            })
            ->make(true);
        }
    }

    public function incluirGaleria(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $galeria = new TblGalerias();
            $galeria->id_igreja = $request->igreja;
            $galeria->nome = $request->nome;
            $galeria->descricao = $request->descricao;
            $galeria->data = muda_data($request->data);
            $galeria->save();

            foreach($request->fotos as $foto){
                $foto = new TblFotos();
                $foto->id_galeria = $galeria->id;
                $foto->foto = "vazio";
                $foto->save();

                \Image::make($foto)->save(public_path('storage/galerias/').'foto-'.$foto->id.'-'.$galeria->id.'-'.$request->igreja.'.'.$foto->getClientOriginalExtension(),90);
                $foto->foto = 'foto-'.$foto->id.'-'.$galeria->id.'-'.$request->igreja.'.'.$foto->getClientOriginalExtension();
                $foto->save();
            }
                
            $notification = array(
                'message' => 'Álbum ' . $galeria->nome . ' foi adicionado com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.galerias')->with($notification);
        }else{ return view('error'); }
    }

    public function excluirGaleria($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg'), \Config::get('constants.permissoes.desativar'))[2] == true){
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

            return redirect()->route('usuario.galerias')->with($notification);
        }else{ return view('error'); }
    }

    public function editarGaleria($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $galeria = TblGalerias::find($id);
            $fotos = TblFotos::where('id_galeria','=',$galeria->id)->get();
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.editargaleria', compact('galeria','fotos','igreja','modulos_igreja'));
        }else{ return view('error'); }
    }

    public function atualizarGaleria(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $galeria = TblGalerias::find($request->id);
            $galeria->nome = $request->nome;
            $galeria->descricao = $request->descricao;
            $galeria->data = muda_data($request->data);
            $galeria->save();

            if($request->fotos) foreach($request->fotos as $foto){
                $foto = new TblFotos();
                $foto->id_galeria = $galeria->id;
                $foto->foto = "vazio";
                $foto->save();

                \Image::make($foto)->save(public_path('storage/galerias/').'foto-'.$foto->id.'-'.$galeria->id.'-'.$request->igreja.'.'.$foto->getClientOriginalExtension(),90);
                $foto->foto = 'foto-'.$foto->id.'-'.$galeria->id.'-'.$request->igreja.'.'.$foto->getClientOriginalExtension();
                $foto->save();
            }
                
            $notification = array(
                'message' => 'Álbum ' . $galeria->nome . ' foi alterado com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.galerias')->with($notification);
        }else{ return view('error'); }
    }

    public function excluirFotoGaleria(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.galeriasg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $foto = TblFotos::find($request->id);
            $foto->delete();
            File::delete(public_path().'/storage/galerias/'.$request['foto']);
            return \Response::json(['message' => 'File successfully delete'], 200);
        }else{ return view('error'); }
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    // EVENTOS FIXO AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function eventosfixos()
    {
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
            return view('usuario.eventosfixos', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_eventosfixos(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $eventofixo = TblEventosFixos::where('id_igreja','=',$perfil->id_igreja)->get();
            return DataTables::of($eventofixo)->addColumn('action',function($eventofixo){
                $btn_editar = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg'), \Config::get('constants.permissoes.alterar'))[2] == true){
                    $btn_editar = '<a href="editarEventoFixo/'.$eventofixo->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                }
                $btn_excluir = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg'), \Config::get('constants.permissoes.desativar'))[2] == true){
                    $btn_excluir = '<a href="excluirEventoFixo/'.$eventofixo->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                }
                return $btn_editar.'&nbsp'.$btn_excluir;
            })->editColumn('created_at', function($eventofixo) {
                if($eventofixo->created_at != null)
                    return Carbon::parse($eventofixo->created_at)->format('d/m/Y');
                else
                    return null;
            })->editColumn('updated_at', function($eventofixo) {
                if($eventofixo->updated_at != null){
                    $upd = Carbon::parse($eventofixo->updated_at)->diffForHumans();
                    return $upd;
                }else
                    return null;
            })
            ->make(true);
        }
    }

    public function incluirEventoFixo(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $eventofixo = new TblEventosFixos();
            $eventofixo->id_igreja = $request->igreja;
            $eventofixo->nome = $request->nome;
            $eventofixo->dados_horario_local = $request->dados_horario_local;
            $eventofixo->descricao = $request->descricao;
            $eventofixo->save();

            if($request->foto){
                \Image::make($request->foto)->save(public_path('storage/eventos/').'evento-'.$eventofixo->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension()),90);
                $eventofixo->foto = 'evento-'.$eventofixo->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension());
                $eventofixo->save();
            }

            $notification = array(
                'message' => 'Evento fixo "' . $eventofixo->nome . '" foi adicionado com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.eventosfixos')->with($notification);
        }else{ return view('error'); }
    }

    public function editarEventoFixo($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $eventofixo = TblEventosFixos::find($id);
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.editareventofixo', compact('eventofixo','igreja','modulos_igreja'));
        }else{ return view('error'); }
    }

    public function atualizarEventoFixo(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $eventofixo = TblEventosFixos::find($request->id);
            $eventofixo->nome = $request->nome;
            $eventofixo->dados_horario_local = $request->dados_horario_local;
            $eventofixo->descricao = $request->descricao;
            $eventofixo->save();

            if($request->foto){
                \Image::make($request->foto)->save(public_path('storage/eventos/').'evento-'.$eventofixo->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension()),90);
                $eventofixo->foto = 'evento-'.$eventofixo->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension());
                $eventofixo->save();
            }

            $notification = array(
                'message' => 'Evento fixo "' . $eventofixo->nome . '" foi alterado com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.eventosfixos')->with($notification);
        }else{ return view('error'); }
    }

    public function excluirFotoEventoFixo(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $foto = $request['foto'];
            $eventofixo = TblEventosFixos::find($request->id);
            $eventofixo->foto = null;
            $eventofixo->save();
            File::delete(public_path().'/storage/eventos/'.$foto);
            return \Response::json(['message' => 'File successfully delete'], 200);
        }else{ return view('error'); }
    }

    public function excluirEventoFixo($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosfixosg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $eventofixo = TblEventosFixos::find($id);
            if($eventofixo->foto != null) File::delete(public_path().'/storage/eventos/'.$eventofixo->foto);
            $eventofixo->delete();

            $notification = array(
                'message' => 'Evento fixo "' . $eventofixo->nome . '" foi excluído com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.eventosfixos')->with($notification);
        }else{ return view('error'); }
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    // NOTÍCIA AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function noticias()
    {
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.noticias', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_noticias(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $noticia = TblNoticias::where('id_igreja','=',$perfil->id_igreja)->get();
            return DataTables::of($noticia)->addColumn('action',function($noticia){
                $btn_editar = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg'), \Config::get('constants.permissoes.alterar'))[2] == true){
                    $btn_editar = '<a href="editarNoticia/'.$noticia->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                }
                $btn_excluir = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg'), \Config::get('constants.permissoes.desativar'))[2] == true){
                    $btn_excluir = '<a href="excluirNoticia/'.$noticia->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                }
                return $btn_editar.'&nbsp'.$btn_excluir;
            })->editColumn('created_at', function($noticia) {
                if($noticia->created_at != null)
                    return Carbon::parse($noticia->created_at)->format('d/m/Y');
                else
                    return null;
            })->editColumn('updated_at', function($noticia) {
                if($noticia->updated_at != null){
                    $upd = Carbon::parse($noticia->updated_at)->diffForHumans();
                    return $upd;
                }else
                    return null;
            })
            ->make(true);
        }
    }

    public function incluirNoticia(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $noticia = new TblNoticias();
            $noticia->id_igreja = $request->igreja;
            $noticia->nome = $request->nome;
            $noticia->descricao = $request->descricao;
            $noticia->save();

            if($request->foto){
                \Image::make($request->foto)->save(public_path('storage/noticias/').'noticia-'.$noticia->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension()),90);
                $noticia->foto = 'noticia-'.$noticia->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension());
                $noticia->save();
            }

            $notification = array(
                'message' => 'Notícia "' . $noticia->nome . '" foi publicada com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.noticias')->with($notification);
        }else{ return view('error'); }
    }

    public function editarNoticia($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $noticia = TblNoticias::find($id);
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.editarnoticia', compact('noticia','igreja','modulos_igreja'));
        }else{ return view('error'); }
    }

    public function atualizarNoticia(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $noticia = TblNoticias::find($request->id);
            $noticia->nome = $request->nome;
            $noticia->descricao = $request->descricao;
            $noticia->save();

            if($request->foto){
                \Image::make($request->foto)->save(public_path('storage/noticias/').'noticia-'.$noticia->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension()),90);
                $noticia->foto = 'noticia-'.$noticia->id.'-'.$request->igreja.'.'.strtolower($request->foto->getClientOriginalExtension());
                $noticia->save();
            }

            $notification = array(
                'message' => 'Notícia "' . $noticia->nome . '" foi atualizada com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.noticias')->with($notification);
        }else{ return view('error'); }
    }

    public function excluirFotoNoticia(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $foto = $request['foto'];
            $noticia = TblNoticias::find($request->id);
            $noticia->foto = null;
            $noticia->save();
            File::delete(public_path().'/storage/noticias/'.$foto);
            return \Response::json(['message' => 'File successfully delete'], 200);
        }else{ return view('error'); }
    }

    public function excluirNoticia($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.noticiasg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $noticia = TblNoticias::find($id);
            if($noticia->foto != null) File::delete(public_path().'/storage/noticias/'.$noticia->foto);
            $noticia->delete();

            $notification = array(
                'message' => 'Notícia "' . $noticia->nome . '" foi excluída com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.noticias')->with($notification);
        }else{ return view('error'); }
    }
    ////////////////////////////////////////////////////////////////////////////////////////
    
    // SERMÕES AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function sermoes(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.sermoesg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.sermoes', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_sermoes(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.sermoesg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $sermao = TblSermoes::where('id_igreja','=',$perfil->id_igreja)->get();
            return DataTables::of($sermao)->addColumn('action',function($sermao){
                $btn_editar = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.sermoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
                    $btn_editar = '<a href="editarSermao/'.$sermao->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                }
                $btn_excluir = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.sermoesg'), \Config::get('constants.permissoes.desativar'))[2] == true){
                    $btn_excluir = '<a href="excluirSermao/'.$sermao->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                }
                return $btn_editar.'&nbsp'.$btn_excluir;
            })->editColumn('created_at', function($sermao) {
                if($sermao->created_at != null)
                    return Carbon::parse($sermao->created_at)->format('d/m/Y');
                else
                    return null;
            })->editColumn('updated_at', function($sermao) {
                if($sermao->updated_at != null){
                    $upd = Carbon::parse($sermao->updated_at)->diffForHumans();
                    return $upd;
                }else
                    return null;
            })
            ->make(true);
        }
    }

    public function incluirSermao(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.sermoesg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $sermao = new TblSermoes();
            $sermao->id_igreja = $request->igreja;
            $sermao->nome = $request->nome;
            $sermao->link = $request->link;
            $sermao->descricao = $request->descricao;
            $sermao->save();

            $notification = array(
                'message' => 'Sermão "' . $sermao->nome . '" foi adicionado com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.sermoes')->with($notification);
        }else{ return view('error'); }
    }

    public function editarSermao($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.sermoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $sermao = TblSermoes::find($id);
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.editarsermao', compact('sermao','igreja','modulos_igreja'));
        }else{ return view('error'); }
    }

    public function atualizarSermao(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.sermoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $sermao = TblSermoes::find($request->id);
            $sermao->nome = $request->nome;
            $sermao->link = $request->link;
            $sermao->descricao = $request->descricao;
            $sermao->save();

            $notification = array(
                'message' => 'Sermão "' . $sermao->nome . '" foi alterado com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.sermoes')->with($notification);
        }else{ return view('error'); }
    }

    public function excluirSermao($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.sermoesg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $sermao = TblSermoes::find($id);
            $sermao->delete();

            $notification = array(
                'message' => 'Sermão "' . $sermao->nome . '" foi excluído com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.sermoes')->with($notification);
        }else{ return view('error'); }
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    // CONFIGURACOES AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function configuracoes(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            $retorno = obter_menus_configuracao($igreja->id_configuracao);
            $menus = $retorno[0];
            $submenus = $retorno[1];
            $subsubmenus = $retorno[2];
            return view('usuario.configuracoes', compact('igreja','modulos_igreja','menus','submenus','subsubmenus'));
        }
    }

    public function adicionarMenu(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $menu = new TblMenu();
            $menu->id_configuracao = $request->id_configuracao;
            $menu->nome = $request->nome;
            $menu->ordem = $request->ordem;
            if($request->link == 1){
                $modulo = TblModulo::find($request->modulo);
                $menu->link = $modulo->rota;
            }else if($request->link == 2){
                $menu->link = 'publicacao/'.$request->publicacao;
            }else if($request->link == 3){
                $menu->link = 'evento/'.$request->evento;
            }else if($request->link == 4){
                $menu->link = 'eventofixo/'.$request->eventofixo;
            }else if($request->link == 5){
                $menu->link = 'noticia/'.$request->noticia;
            }else if($request->link == 6){
                $menu->link = $request->url;
            }
            $menu->save();

            $notification = array(
                'message' => 'Menu ' . $menu->nome . ' foi adicionado com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function editarMenu(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $menu = TblMenu::find($request->id);
            $menu->nome = $request->nome;
            $menu->ordem = $request->ordem;
            if($request->link == 0){
                $menu->link = null;
            }else if($request->link == 1){
                $modulo = TblModulo::find($request->modulo);
                $menu->link = $modulo->rota;
            }else if($request->link == 2){
                $menu->link = 'publicacao/'.$request->publicacao;
            }else if($request->link == 3){
                $menu->link = 'evento/'.$request->evento;
            }else if($request->link == 4){
                $menu->link = 'eventofixo/'.$request->eventofixo;
            }else if($request->link == 5){
                $menu->link = 'noticia/'.$request->noticia;
            }else if($request->link == 6){
                $menu->link = $request->url;
            }
            $menu->save();

            $notification = array(
                'message' => 'Menu ' . $menu->nome . ' foi alterado com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function excluirMenu($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $sub_menus = \DB::table('tbl_sub_menus')
                ->select('tbl_sub_menus.id')
                ->where('tbl_sub_menus.id_menu','=',$id)
                ->get();

            foreach($sub_menus as $sub_menu){
                $sub_sub_menus = \DB::table('tbl_sub_sub_menus')
                    ->select('tbl_sub_sub_menus.id')
                    ->where('tbl_sub_sub_menus.id_submenu','=',$id)
                    ->get();

                foreach($sub_sub_menus as $sub_sub_menu){
                    TblSubSubMenu::where('id', $sub_sub_menu->id)->delete();
                }

                TblSubMenu::where('id', $sub_menu->id)->delete();
            }

            $menu = TblMenu::find($id);
            TblMenu::where('id', $id)->delete();

            $notification = array(
                'message' => 'Menu ' . $menu->nome . ' foi excluído com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function adicionarSubMenu(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $submenu = new TblSubMenu();
            $submenu->id_menu = $request->id_menu;
            $submenu->nome = $request->nome;
            $submenu->ordem = $request->ordem;
            if($request->link == 1){
                $modulo = TblModulo::find($request->modulo);
                $submenu->link = $modulo->rota;
            }else if($request->link == 2){
                $submenu->link = 'publicacao/'.$request->publicacao;
            }else if($request->link == 3){
                $submenu->link = 'evento/'.$request->evento;
            }else if($request->link == 4){
                $submenu->link = 'eventofixo/'.$request->eventofixo;
            }else if($request->link == 5){
                $submenu->link = 'noticia/'.$request->noticia;
            }else if($request->link == 6){
                $submenu->link = $request->url;
            }
            $submenu->save();

            $notification = array(
                'message' => 'Submenu ' . $submenu->nome . ' foi adicionado com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function editarSubMenu(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $submenu = TblSubMenu::find($request->id);
            $submenu->id_menu = $request->id_menu;
            $submenu->nome = $request->nome;
            $submenu->ordem = $request->ordem;
            if($request->link == 0){
                $submenu->link = null;
            }else if($request->link == 1){
                $modulo = TblModulo::find($request->modulo);
                $submenu->link = $modulo->rota;
            }else if($request->link == 2){
                $submenu->link = 'publicacao/'.$request->publicacao;
            }else if($request->link == 3){
                $submenu->link = 'evento/'.$request->evento;
            }else if($request->link == 4){
                $submenu->link = 'evento/'.$request->eventofixo;
            }else if($request->link == 5){
                $submenu->link = 'noticia/'.$request->noticia;
            }else if($request->link == 6){
                $submenu->link = $request->url;
            }
            $submenu->save();

            $notification = array(
                'message' => 'Submenu ' . $submenu->nome . ' foi alterado com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function excluirSubMenu($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $sub_sub_menus = \DB::table('tbl_sub_sub_menus')
                ->select('tbl_sub_sub_menus.id')
                ->where('tbl_sub_sub_menus.id_submenu','=',$id)
                ->get();

            foreach($sub_sub_menus as $sub_sub_menu){
                TblSubSubMenu::where('id', $sub_sub_menu->id)->delete();
            }

            $submenu = TblSubMenu::find($id);
            TblSubMenu::where('id', $id)->delete();

            $notification = array(
                'message' => 'Submenu ' . $submenu->nome . ' foi excluído com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function adicionarSubSubMenu(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $subsubmenu = new TblSubSubMenu();
            $subsubmenu->id_submenu = $request->id_submenu;
            $subsubmenu->nome = $request->nome;
            $subsubmenu->ordem = $request->ordem;
            if($request->link == 1){
                $modulo = TblModulo::find($request->modulo);
                $subsubmenu->link = $modulo->rota;
            }else if($request->link == 2){
                $subsubmenu->link = 'publicacao/'.$request->publicacao;
            }else if($request->link == 3){
                $subsubmenu->link = 'evento/'.$request->evento;
            }else if($request->link == 4){
                $subsubmenu->link = 'eventofixo/'.$request->eventofixo;
            }else if($request->link == 5){
                $subsubmenu->link = 'noticia/'.$request->noticia;
            }else if($request->link == 6){
                $subsubmenu->link = $request->url;
            }
            $subsubmenu->save();

            $notification = array(
                'message' => 'Sub-Submenu ' . $subsubmenu->nome . ' foi adicionado com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function editarSubSubMenu(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $subsubmenu = new TblSubSubMenu();
            $subsubmenu->id_submenu = $request->id_submenu;
            $subsubmenu->nome = $request->nome;
            $subsubmenu->ordem = $request->ordem;
            if($request->link == 0){
                $submenu->link = null;
            }if($request->link == 1){
                $modulo = TblModulo::find($request->modulo);
                $subsubmenu->link = $modulo->rota;
            }else if($request->link == 2){
                $subsubmenu->link = 'publicacao/'.$request->publicacao;
            }else if($request->link == 3){
                $subsubmenu->link = 'evento/'.$request->evento;
            }else if($request->link == 4){
                $subsubmenu->link = 'eventofixo/'.$request->eventofixo;
            }else if($request->link == 5){
                $subsubmenu->link = 'noticia/'.$request->noticia;
            }else if($request->link == 6){
                $subsubmenu->link = $request->url;
            }
            $subsubmenu->save();

            $notification = array(
                'message' => 'Sub-Submenu ' . $subsubmenu->nome . ' foi alterado com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function excluirSubSubMenu($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $subsubmenu = TblSubSubMenu::find($id);
            TblSubSubMenu::where('id', $id)->delete();

            $notification = array(
                'message' => 'Sub-Submenu ' . $subsubmenu->nome . ' foi excluído com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }

    public function salvarConfiguracoes(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.configuracoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $configuracao = TblConfiguracoes::find($request->id);
            $configuracao->id_template = $request->id_template;
            $configuracao->cor = $request->cor;

            $configuracao->save();

            $notification = array(
                'message' => 'Configurações da congregação alteradas com sucesso!', 
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{ return view('error'); }
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    // EVENTOS AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function eventos(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.eventosg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);

            $eventos = [];
            $data = TblEventos::where('id_igreja','=',$igreja->id)->get();
            if($data->count()) {
                foreach ($data as $key => $value) {
                    $eventos[] = Calendar::event(
                        $value->nome,
                        false,
                        $value->dados_horario_inicio,
                        $value->dados_horario_fim,
                        null,
                        // Add color and link on event
                        [
                            'color' => cor_aleatoria(),
                            'url' => '/usuario/editarEvento/'.$value->id,
                        ]
                    );
                }
            }
            $calendar = Calendar::addEvents($eventos);

            return view('usuario.eventos', compact('igreja','modulos_igreja','calendar'));
        }
    }

    public function incluirEvento(Request $request){
        dd($request->all());
    }
    ////////////////////////////////////////////////////////////////////////////////////////
    
    // PUBLICAÇÕES AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function publicacoes(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.publicacoesg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
            return view('usuario.publicacoes', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_publicacoes(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.publicacoesg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $publicacoes = TblPublicacoes::where('id_igreja','=',$perfil->id_igreja)->get();
            return DataTables::of($publicacoes)->addColumn('action',function($publicacoes){
                $btn_editar = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.publicacoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
                    $btn_editar = '<a href="editarPublicacao/'.$publicacoes->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                }
                $btn_excluir = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.publicacoesg'), \Config::get('constants.permissoes.desativar'))[2] == true){
                    $btn_excluir = '<a href="excluirPublicacao/'.$publicacoes->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                }
                return $btn_editar.'&nbsp'.$btn_excluir;
            })
            ->make(true);
        }
    }

    public function incluirPublicacao(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.publicacoesg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $publicacao = new TblPublicacoes();
            $publicacao->id_igreja = $request->igreja;
            $publicacao->nome = $request->nome;
            $publicacao->html = $request->html;
            $publicacao->save();

            foreach($request->galeria as $f_){
                $foto = new TblPublicacaoFotos();
                $foto->id_publicacao = $publicacao->id;
                $foto->foto = "vazio";
                $foto->save();

                \Image::make($f_)->save(public_path('storage/galerias-publicacoes/').'foto-'.$foto->id.'-'.$publicacao->id.'-'.$request->igreja.'.'.$f_->getClientOriginalExtension(),90);
                $foto->foto = 'foto-'.$foto->id.'-'.$publicacao->id.'-'.$request->igreja.'.'.$f_->getClientOriginalExtension();
                $foto->save();
            }
                
            $notification = array(
                'message' => 'Publicação "' . $publicacao->nome . '" foi adicionada com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.publicacoes')->with($notification);
        }else{ return view('error'); }
    }

    public function editarPublicacao($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.publicacoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $publicacao = TblPublicacoes::find($id);
            $fotos = TblPublicacaoFotos::where('id_publicacao','=',$publicacao->id)->get();
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.editarpublicacao', compact('publicacao','fotos','igreja','modulos_igreja'));
        }else{ return view('error'); }
    }

    public function atualizarPublicacao(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.publicacoesg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $publicacao = TblPublicacoes::find($request->id);
            $publicacao->nome = $request->nome;
            $publicacao->html = $request->html;
            $publicacao->save();

            if($request->galeria) foreach($request->galeria as $f_){
                $foto = new TblPublicacaoFotos();
                $foto->id_publicacao = $publicacao->id;
                $foto->foto = "vazio";
                $foto->save();

                \Image::make($f_)->save(public_path('storage/galerias-publicacoes/').'foto-'.$foto->id.'-'.$publicacao->id.'-'.$request->igreja.'.'.$f_->getClientOriginalExtension(),90);
                $foto->foto = 'foto-'.$foto->id.'-'.$publicacao->id.'-'.$request->igreja.'.'.$f_->getClientOriginalExtension();
                $foto->save();
            }
                
            $notification = array(
                'message' => 'Publicação "' . $publicacao->nome . '" foi adicionada com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.publicacoes')->with($notification);
        }else{ return view('error'); }
    }

    public function excluirPublicacao($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.publicacoesg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $publicacao = TblPublicacoes::find($id);
            $fotos = TblPublicacaoFotos::where("id_publicacao","=",$publicacao->id)->get();
            foreach($fotos as $foto){
                File::delete(public_path().'/storage/galerias-publicacoes/'.$foto->foto);
                $foto->delete();
            }
            $publicacao->delete();

            $notification = array(
                'message' => 'Publicação "' . $publicacao->nome . '" foi excluída com sucesso!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.publicacoes')->with($notification);
        }else{ return view('error'); }
    }

    public function excluirFotoPublicacao(Request $request){
        $foto = TblPublicacaoFotos::find($request->id);
        $foto->delete();
        File::delete(public_path().'/storage/galerias-publicacoes/'.$request['foto']);
        return \Response::json(['message' => 'File successfully delete'], 200);
    }
    ////////////////////////////////////////////////////////////////////////////////////////
    
    // CONTA AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function conta(){
        $usuario = User::find(\Auth::user()->id);
        return view('usuario.conta', compact('usuario'));
    }

    public function atualizarConta(Request $request){
        $usuario = User::find(\Auth::user()->id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        
        $count = \DB::table('users')
            ->select('users.email')
            ->where('users.id','<>',$usuario->id)
            ->where('users.email','=',$usuario->email)
            ->count();
        if($count == 0){
            if(empty($request->senha) || $request->senha == $request->senhac){
                if(!empty($request->senha)) $usuario->password = bcrypt($request->senha);

                $usuario->save();

                $notification = array(
                    'message' => 'Sua conta foi alterada com sucesso!', 
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'Falha na confirmação das senhas.', 
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Esse email já está sendo utilizado.', 
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    // USUÁRIOS AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function usuarios(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
            return view('usuario.usuarios', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_usuarios(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $usuarios = \DB::table('users')
                ->select('users.*')
                ->leftJoin('tbl_perfis','users.id_perfil','=','tbl_perfis.id')
                ->where('tbl_perfis.id_igreja','=',$perfil->id_igreja)
                ->get();
            return DataTables::of($usuarios)->addColumn('action',function($usuarios){
                $btn_editar = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg'), \Config::get('constants.permissoes.alterar'))[2] == true){
                    $btn_editar = '<a href="editarUsuario/'.$usuarios->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                }
                $btn_excluir = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg'), \Config::get('constants.permissoes.desativar'))[2] == true){
                    $btn_excluir = '<label title="Status do Usuário" class="switch"><input onClick="switch_status(this)" name="'.$usuarios->nome.'" class="status" id="'.$usuarios->id.'" type="checkbox" '.(($usuarios->status == 1) ? "checked" : "").'><span class="slider"></span></label>';
                }
                return $btn_editar.'&nbsp'.$btn_excluir;
            })->editColumn('created_at', function($usuarios) {
                if($usuarios->created_at != null)
                    return Carbon::parse($usuarios->created_at)->format('d/m/Y');
                else
                    return null;
            })->editColumn('updated_at', function($usuarios) {
                if($usuarios->updated_at != null){
                    $upd = Carbon::parse($usuarios->updated_at)->diffForHumans();
                    return $upd;
                }else
                    return null;
            })->addColumn('perfil',function($usuarios){
                return (TblPerfil::find($usuarios->id_perfil))->nome;
            })
            ->make(true);
        }
    }

    public function switchStatusUsuario(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $usuario = User::find($request->id);
            ($usuario->status == 1) ? $usuario->status = 0 : $usuario->status = 1 ;
            $usuario->save();
        }else{ return view('error'); }
    }

    public function incluirUsuario(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $usuario = new User();
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->id_perfil = $request->perfil;
            
            $count = \DB::table('users')
                ->select('users.email')
                ->where('users.id','<>',$usuario->id)
                ->where('users.email','=',$usuario->email)
                ->count();
            if($count == 0){
                if(!empty($request->senha) && $request->senha == $request->senhac){
                    $usuario->password = bcrypt($request->senha);

                    $usuario->save();

                    $notification = array(
                        'message' => 'Usuário ' . $usuario->nome . ' foi incluído(a) com sucesso!', 
                        'alert-type' => 'success'
                    );

                    return redirect()->route('usuario.usuarios')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Falha na confirmação das senhas.', 
                        'alert-type' => 'error'
                    );

                    return redirect()->back()->with($notification);
                }
            }else{
                $notification = array(
                    'message' => 'Esse email já está sendo utilizado.', 
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            }
        }else{ return view('error'); }
    }

    public function editarUsuario($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $usuario = User::find($id);
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            return view('usuario.editarusuario', compact('usuario','igreja','modulos_igreja'));
        }else{ return view('error'); }
    }

    public function atualizarUsuario(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $usuario = User::find($request->id);
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->id_perfil = $request->perfil;
            
            $count = \DB::table('users')
                ->select('users.email')
                ->where('users.id','<>',$usuario->id)
                ->where('users.email','=',$usuario->email)
                ->count();
            if($count == 0){
                if(empty($request->senha) || $request->senha == $request->senhac){
                    if(!empty($request->senha)) $usuario->password = bcrypt($request->senha);

                    $usuario->save();

                    $notification = array(
                        'message' => 'Usuário ' . $usuario->nome . ' foi aletrado(a) com sucesso!', 
                        'alert-type' => 'success'
                    );

                    return redirect()->route('usuario.usuarios')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Falha na confirmação das senhas.', 
                        'alert-type' => 'error'
                    );

                    return redirect()->back()->with($notification);
                }
            }else{
                $notification = array(
                    'message' => 'Esse email já está sendo utilizado.', 
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            }
        }else{ return view('error'); }
    }

    /*public function excluirUsuario(){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.usuariosg'), \Config::get('constants.permissoes.desativar'))[2] == true){

        }else{ return view('error'); }
    }*/
    ////////////////////////////////////////////////////////////////////////////////////////

    // PERFIS AREA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function perfis(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
            return view('usuario.perfis', compact('igreja','modulos_igreja'));
        }
    }

    public function tbl_perfis(){
        if( valida_modulo(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg')) == false){
            return view('error');
        }else{
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $perfis = TblPerfil::where('id_igreja','=',$perfil->id_igreja)->get();
            return DataTables::of($perfis)->addColumn('action',function($perfis){
                $btn_editar = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.alterar'))[2] == true){
                    $btn_editar = '<a href="editarPerfil/'.$perfis->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>'.'&nbsp'.
                    '<a href="carregarPermissoesPerfil/'.$perfis->id.'" class="btn btn-xs btn-warning"><i class="fa fa-cog"></i></button></a>';
                }
                $btn_excluir = '';
                if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.desativar'))[2] == true){
                    $btn_excluir = '<label title="Status do Perfil" class="switch"><input onClick="switch_status(this)" name="'.$perfis->nome.'" class="status" id="'.$perfis->id.'" type="checkbox" '.(($perfis->status == 1) ? "checked" : "").'><span class="slider"></span></label>';
                }
                return $btn_editar.'&nbsp'.$btn_excluir;
            })->editColumn('created_at', function($perfis) {
                if($perfis->created_at != null)
                    return Carbon::parse($perfis->created_at)->format('d/m/Y');
                else
                    return null;
            })->editColumn('updated_at', function($perfis) {
                if($perfis->updated_at != null){
                    $upd = Carbon::parse($perfis->updated_at)->diffForHumans();
                    return $upd;
                }else
                    return null;
            })
            ->make(true);
        }
    }

    public function switchStatusPerfil(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            $perfil = TblPerfil::find($request->id);
            ($perfil->status == 1) ? $perfil->status = 0 : $perfil->status = 1 ;
            $perfil->save();
        }else{ return view('error'); }
    }

    public function incluirPerfil(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.incluir'))[2] == true){
            $perfil = new TblPerfil();
            $perfil->nome = $request->nome;
            $perfil->descricao = $request->descricao;
            $perfil->id_igreja = $request->igreja;

            $count = TblPerfil::where("nome", "=", $perfil->nome)->where("id_igreja", "=", $perfil->id_igreja)->count();
            if($count == 0){
                $perfil->save();
                $perfil_modulo = new TblPerfisIgrejasModulos();

                foreach ($request->modulos as $key => $value) {
                    $modulo_igreja = TblIgrejasModulos::where('id_modulo', '=', $value)->where('id_igreja', '=', $perfil->id_igreja)->get();
                    $modulo_igreja = $modulo_igreja[0];

                    $data = [
                        'id_perfil' => $perfil->id,
                        'id_modulo_igreja' => $modulo_igreja->id,
                    ];
                    $perfil_modulo->create($data);
                }

                $notification = array(
                    'message' => $perfil->nome . ' foi incluído(a) com sucesso!', 
                    'alert-type' => 'success'
                );

                return redirect()->route('usuario.perfis')->with($notification);
            }else{
                $notification = array(
                    'message' => 'O nome informado já está na base de dados!', 
                    'alert-type' => 'error'
                );

                return back()->with($notification);
            }
        }else{ return view('error'); }
    }

    public function editarPerfil($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $usuario = User::find($id);
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_gerenciais_igreja($igreja);
            $perfil = TblPerfil::find($id);
            $modulos = obter_modulos_perfil($perfil);
            return view('usuario.editarperfil', compact('usuario','igreja','modulos_igreja','perfil','modulos'));
        }else{ return view('error'); }
    }

    public function atualizarPerfil(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $perfil = TblPerfil::find($request->id);
            $perfil->nome = $request->nome;
            $perfil->descricao = $request->descricao;

            $count = TblPerfil::where("nome", "=", $perfil->nome)->where("id_igreja", "=", $perfil->id_igreja)->where("id","<>",$perfil->id)->count();
            if($count == 0){
                $perfil->save();

                $modulos_do_perfil = TblPerfisIgrejasModulos::where("id_perfil","=",$perfil->id)->get();
                if(count($modulos_do_perfil) > 0) foreach($modulos_do_perfil as $modulo_perfil){
                    TblPerfisPermissoes::where("id_perfil_igreja_modulo","=",$modulo_perfil->id)->delete();
                }
                TblPerfisIgrejasModulos::where("id_perfil","=",$perfil->id)->delete();

                $perfil_modulo = new TblPerfisIgrejasModulos();

                foreach ($request->modulos as $key => $value) {
                    $modulo_igreja = TblIgrejasModulos::where('id_modulo', '=', $value)->where('id_igreja', '=', $perfil->id_igreja)->get();
                    $modulo_igreja = $modulo_igreja[0];

                    $data = [
                        'id_perfil' => $perfil->id,
                        'id_modulo_igreja' => $modulo_igreja->id,
                    ];
                    $perfil_modulo->create($data);
                }

                $notification = array(
                    'message' => $perfil->nome . ' foi incluído(a) com sucesso!', 
                    'alert-type' => 'success'
                );

                return redirect()->route('usuario.perfis')->with($notification);
            }else{
                $notification = array(
                    'message' => 'O nome informado já está na base de dados!', 
                    'alert-type' => 'error'
                );

                return back()->with($notification);
            }
        }else{ return view('error'); }
    }

    public function carregarPermissoesPerfil($id){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            $perfil = TblPerfil::find(\Auth::user()->id_perfil);
            $igreja = obter_dados_igreja_id($perfil->id_igreja);
            $modulos_igreja = obter_modulos_apresentativos_igreja($igreja);
            $perfil = \DB::table('tbl_perfis')
                ->select('tbl_perfis.*')
                ->where('tbl_perfis.id','=',$id)
                ->get();
            $perfil = $perfil[0];
            $modulos = \DB::table('tbl_modulos')
                ->select('tbl_modulos.*', 'tbl_perfis_igrejas_modulos.id as id_perfis_igrejas_modulos')
                ->leftJoin('tbl_igrejas_modulos', 'tbl_modulos.id', '=', 'tbl_igrejas_modulos.id_modulo')
                ->leftJoin('tbl_perfis_igrejas_modulos', 'tbl_igrejas_modulos.id', '=', 'tbl_perfis_igrejas_modulos.id_modulo_igreja')
                ->leftJoin('tbl_perfis', 'tbl_perfis_igrejas_modulos.id_perfil', '=', 'tbl_perfis.id')
                ->where('tbl_perfis.id','=',$id)
                //->groupBy('tbl_modulos.id')
                ->orderBy('nome', 'ASC')
                ->get();
            $permissoes = array();
            foreach($modulos as $modulo){
                $permissoes_ativas = \DB::table('tbl_permissoes')
                    ->select('tbl_permissoes.*')
                    ->leftJoin('tbl_perfis_permissoes', 'tbl_permissoes.id', '=', 'tbl_perfis_permissoes.id_permissao')
                    ->leftJoin('tbl_perfis_igrejas_modulos', 'tbl_perfis_permissoes.id_perfil_igreja_modulo', '=', 'tbl_perfis_igrejas_modulos.id')
                    ->leftJoin('tbl_igrejas_modulos', 'tbl_perfis_igrejas_modulos.id_modulo_igreja', '=', 'tbl_igrejas_modulos.id')
                    ->where('tbl_igrejas_modulos.id_modulo','=',$modulo->id)
                    ->where('tbl_perfis_igrejas_modulos.id_perfil','=',$id)
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
            return view('usuario.permissoesperfil', compact('igreja','modulos_igreja','perfil','modulos','permissoes'));
        }else{ return view('error'); }
    }

    public function atualizarPermissoesPerfil(Request $request){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.alterar'))[2] == true){
            unset($request["_token"]);
            $id_perfil = $request["id_perfil"];
            unset($request["id_perfil"]);
            foreach ($request->all() as $id_perfil_modulo_igreja => $permissao) {
                TblPerfisPermissoes::where('id_perfil_igreja_modulo', '=', $id_perfil_modulo_igreja)->delete();
                foreach($permissao as $posicao => $id_permissao){
                    $perfil_permissao = new TblPerfisPermissoes();

                    $data = [
                        'id_perfil_igreja_modulo' => $id_perfil_modulo_igreja,
                        'id_permissao' => $id_permissao,
                    ];

                    $perfil_permissao->create($data);
                }
            }

            $perfil = \DB::table('tbl_perfis')
                ->select('tbl_perfis.*')
                ->where('tbl_perfis.id','=',$id_perfil)
                ->get();
            $perfil = $perfil[0];

            $notification = array(
                'message' => $perfil->nome . ' teve suas permissões alteradas!', 
                'alert-type' => 'success'
            );

            return redirect()->route('usuario.perfis')->with($notification);
        }else{ return view('error'); }
    }

    /*public function excluirPerfil(){
        if( valida_permissao(\Auth::user()->id_perfil, \Config::get('constants.modulos.perfisg'), \Config::get('constants.permissoes.desativar'))[2] == true){
            
        }else{ return view('error'); }
    }*/
    ////////////////////////////////////////////////////////////////////////////////////////
}
