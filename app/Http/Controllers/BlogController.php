<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Categorias;
use App\Gallery;

class BlogController extends Controller
{
    public function index(Posts $post)
    {
        $categorias = Categorias::all();
        $spotlight = $post->where('spotlight', 1)->orderby('created_at', 'asc')->take(3)->get();
        $recent = $post->orderby('created_at', 'asc')->paginate(8);
        return view('revista/home', compact('recent', 'spotlight', 'categorias'));
    }

    public function about()
    {
        return view('revista/institucional');
    }

    public function listPost(Posts $post, $filtro = null)
    {
        $categorias = Categorias::all();
        $spotlight = $post->where('spotlight', 1)->orderby('created_at', 'asc')->take(3)->get();

        foreach ($categorias as $categoria) {
            switch ($filtro) {
                case $categoria->id;
                    $list_post = $post->where('categorias_id', $categoria->id)->orderby('created_at', 'asc')->paginate(10);
                    break;
                case 'todos';
                    $list_post = $post->orderby('created_at', 'asc')->paginate(10);
                    break;
            }
        };
        // $list_post = $post->orderby('created_at', 'desc')->paginate(10);
        return view('revista/listar-artigos', compact('spotlight', 'list_post', 'categorias'));
    }

    public function viewPost($id)
    {
        $categorias = Categorias::all();
        $artigos = Posts::find($id);

        foreach ($categorias as $cat) {
            if ($artigos->categorias_id == $cat->id) {
                $related = Posts::where('categorias_id', $cat->id)->paginate(3);
            }
        }


        return view('revista/artigo', compact('artigos', 'categorias', 'related'));
    }

    public function viewMagazine()
    {
        return view('revista/viversj');
    }

    public function artViewer()
    {
        $fotos = Gallery::paginate(20);
        return view('revista/galeria-arte');
    }

    public function photoViewer()
    {
        $fotos = Gallery::paginate(20);
        return view('revista/galeria-fotos', compact('fotos'));
    }

    public function rules()
    {
        return view('revista/regras');
    }
}
