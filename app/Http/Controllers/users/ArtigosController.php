<?php

namespace App\Http\Controllers\Users;

// Controller da model Posts
use App\Posts;

use App\Categorias;
use App\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage;

class ArtigosController extends Controller
{
    public function index($filtro = null)
    {
        switch ($filtro) {
            case 'desativados':
                $artigos = Posts::onlyTrashed()->orderby('id', 'asc')->paginate(10);
                break;
            case 'ativos':
                $artigos = Posts::orderby('id', 'asc')->paginate(10);
                break;
            case 'destaque':
                $artigos = Posts::where('spotlight', 1)->orderby('id', 'asc')->paginate(10);
                break;
            default:
                $artigos = Posts::orderby('id', 'asc')->paginate(10);
                break;
        }
        $tags = Tags::all();
        $categorias = Categorias::all();
        return view('users.artigos.index', compact('artigos', 'categorias', 'tags'));
    }

    public function create()
    {
        $categorias = Categorias::all();
        $tags = Tags::all();
        return view('users.artigos.create', compact('categorias', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'categorias_id' => 'required',
            'content' => 'required',
            'tag' => 'required',
        ]);

        $categorias = Categorias::all();
        $tags = Tags::all();

        $data_upl = date('Y-m-d_H-i-s');

        $post = new Posts;
        $post->titulo = $request->input('titulo');
        $post->caption = $request->input('caption');
        $post->categorias_id = $request->input('categorias_id');
        $post->content = $request->input('content');
        if(!empty($request->file('foto'))){
            Storage::disk('upl_foto')->put('foto_' . $data_upl . '.png', file_get_contents($request->file('foto')));
            $post->foto = url('uploads/posts/' . 'foto_' . $data_upl . '.png');
        }
        $post->slug = Str::slug($request->titulo);
        $post->users_id = Auth::id();
        $post->spotlight = $request->input('spotlight');
        $post->save();

        $post->tags()->attach($request->input('tag'));

        return view('users.artigos.create', compact('categorias', 'tags'))->with('msg', 'Artigo adicionado com sucesso!');
    }

    public function edit($id)
    {
        $categorias = Categorias::all();
        $tags = Tags::all();
        $artigos = Posts::findorfail($id);

        return view('users.artigos.edit', compact('artigos', 'tags', 'categorias'));
    }

    public function update(Request $info, $id)
    {
        $info->validate([
            'titulo' => 'required',
            'categorias_id' => 'required',
            'content' => 'required',
            'tag' => 'required',
        ]);


        $categorias = Categorias::all();
        $tags = Tags::all();

        $data_upl = date('Y-m-d_H-i-s');

        $post = Posts::findorfail($id);
        $post->titulo = $info['titulo'];
        $post->caption = $info['caption'];
        $post->categorias_id = $info['categorias_id'];
        $post->content = $info['content'];
        $result = substr($post->foto, -28);
        if (empty($info->file('foto') == false)) {
            Storage::disk('upl_foto')->delete($result);
            Storage::disk('upl_foto')->put('foto_' . $data_upl . '.png', file_get_contents($info->file('foto')));
            $post->foto = url('uploads/posts/' . 'foto_' . $data_upl . '.png');
        }
        $post->slug = Str::slug($info['titulo']);
        $post->spotlight = $info['spotlight'];

        $post->update();

        $post->tags()->sync($info['tag']);

        $artigos = Posts::all();

        return redirect()->route('index.artigo');
    }

    public function destroy($id)
    {
        $post = Posts::findorfail($id);
        $post->delete();

        return redirect()->back()->with('msg', 'Artigo excluído com sucesso!');
    }

    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('msg', '$Artigo restaurado com sucesso!');
    }

    public function kill($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $result = substr($post->foto, -28);
        Storage::disk('upl_foto')->delete($result);
        $post->forceDelete();

        return redirect()->back()->with('msg', '$Artigo deletado com sucesso!');
    }
}
