<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tags;

class TagsController extends Controller
{
    public function index(){
        return view('users.tags.index')->with("tags", Tags::paginate(10));
    }

    public function store(Request $request){
        $request->validate([
            'tags' => 'required|min:1',
        ]);
        $temp_tags = explode(",", $request->input('tags'));
        foreach($temp_tags as $key => $tag){
            $nova_tag = new Tags;
            $nova_tag->name = $tag;
            $nova_tag->slug = str_slug($tag);
            $nova_tag->save();
        }
        return back()->with('mensagem', 'Tags criadas com sucesso!');
    }

    public function update(Request $request){
        $request->validate([
            'tag' => 'required|min:1',
        ]);
        $tag = Tags::find($request->input('id'));
        $tag->name = $request->input('tag');
        $tag->save();

        return back()->with('mensagem', 'Tag editada com suscesso!');
    }

    public function destroy($id)
    {
        Tags::find($id)->delete();
        return back()->with('mensagem', 'Tag excluída com suscesso!');
    }
    
}
