<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorias;

class CategoriasController extends Controller
{
    public function index(){
        return view('users.categorias.index')->with('categorias', Categorias::all());
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categorias|min:1',            
            'cor' => 'required|min:1',
        ]);
        $categoria = new Categorias;
        $categoria->name = $request->input('name');
        $categoria->cor = $request->input('cor');
        $categoria->slug = str_slug($request->input('name'));
        $categoria->save();
        
        return back()->with('mensagem', 'Categoria criada com sucesso!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',            
            'cor' => 'required|min:1',
        ]);
        $categoria = Categorias::find($request->input('id'));
        $categoria->name = $request->input('name');
        $categoria->cor = $request->input('cor');
        $categoria->slug = str_slug($request->input('name'));
        $categoria->save();

        return back()->with('mensagem', 'Categoria editada com sucesso!');
    }

    public function destroy($id){
        Categorias::find($id)->delete();
 
        return back()->with('mensagem', 'Categoria excluída com sucesso!');
    }
}
