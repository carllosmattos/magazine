<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;

/**Models */
use App\User;
use Auth;

class UserController extends Controller
{
    public function index($filtro = null){
        switch($filtro){
            case 'desativados':
                $user = User::onlyTrashed()->orderby('name', 'asc')->get();
            break;
            default:
                $user = User::orderby('name', 'asc')->get();
            break;
        }
        return view('users.user.index')->with('users', $user);
    }

    public function create(){
        return view('users.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'descricao' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->descricao = 'Descrição';
        $user->level = $request->input('level');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return view('users.user.create')->with('msg', 'Usuário adicionado com sucesso!');
    }

    public function destroy($id){
        User::find($id)->delete();
        return back()->with('msg', 'Usuário deletado com sucesso!');
    }

    public function config(){
        return view('users.user.config');
    }

    public function config_update(Request $request){
        switch ($request->input('tipo')){
            case 'avatar';
                $request->validate([
                    'avatar' => 'required',
                ]);
                Storage::disk('upl_avatar')->put('avatar_'.Auth::user()->id.'.png', file_get_contents($request->file('avatar')));
                $user = Auth::user();
                $user->avatar = url('assets/avatar/'.'avatar_'.Auth::user()->id.'.png');
                $user->save();
                return back()->with('msg', 'Avatar alterado com sucesso!');
            break;

            case 'n.e.d';
                $user = Auth::user();
                if(!is_null($request->input('nome'))){
                    $user->name = $request->input('nome');
                }
                if(!is_null($request->input('email'))){
                    $user->email = $request->input('email');
                }
                if(!is_null($request->input('descricao'))){
                    $user->descricao = $request->input('descricao');
                }
                $user->save();

                return back()->with('msg', 'Alteração realizada com sucesso!');
            break;

            case 'senha';
                $request->validate([
                    'senha_atual' => 'required|string|min:6',
                    'password' => 'required|string|min:6|confirmed',
                ]);

                if(password_verify($request->input('senha_atual'), Auth::user()->password)){
                    $user = Auth::user();
                    $user->password = bcrypt($request->input('password'));
                    $user->save();

                    return back()->with('msg', 'Senha atualizada com sucesso!');
                }else{
                    return back()->with('erro', 'Senha atual não é compatível.');
                }

            break;

        }
    }
}
