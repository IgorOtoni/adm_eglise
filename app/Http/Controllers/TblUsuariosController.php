<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class TblUsuariosController extends Controller
{
    public function index()
    {
        return view('usuarios.index');
    }

    public function tbl_usuarios(){
        $usuarios = User::orderBy('nome', 'ASC');
        return DataTables::of($usuarios)->addColumn('action',function($usuarios){
            return '<a href="/admin/usuarios/editarUsuario/'.$usuarios->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>'.'&nbsp'.
            '<label title="Status do Usuário" class="switch"><input onClick="switch_status(this)" name="'.$usuarios->nome.'" class="status" id="'.$usuarios->id.'" type="checkbox" '.(($usuarios->status == 1) ? "checked" : "").'><span class="slider"></span></label>';
        })
        ->make(true);
    }

    public function edit($id){
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function autoEdit(){
        $usuario = User::find(\Auth::user()->id);
        return view('usuarios.autoEdit', compact('usuario'));
    }

    public function switchStatus(Request $request){
        $usuario = User::find($request->id);
        ($usuario->status == 1) ? $usuario->status = 0 : $usuario->status = 1 ;
        $usuario->save();
    }

    public function store(Request $request){
        $usuario = new User();
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
                    'message' => 'Usuário ' . $usuario->nome . ' foi incluído(a) com sucesso!', 
                    'alert-type' => 'success'
                );

                return redirect()->route('usuarios')->with($notification);
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

    public function update(Request $request){
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

                return redirect()->route('usuarios')->with($notification);
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

    public function autoUpdate(Request $request){
        $usuario = User::find(\Auth::user()->id);
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
}
