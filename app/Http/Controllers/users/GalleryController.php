<?php

namespace App\Http\Controllers\Users;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class GalleryController extends Controller
{
    public function index(){
        $fotos = Gallery::paginate(25);
        return view('users.gallery.index', compact('fotos'));
    }

    public function store(Request $request){
        $request->validate([
            'description' => 'required|min:1',
        ]);

        
        $data_upl = date('Y-m-d_H-i-s');

        $foto = new Gallery;
        if(!empty($request->file('foto'))){
            Storage::disk('upl_foto')->put('foto_' . $data_upl . '.png', file_get_contents($request->file('foto')));
            $foto->foto = url('uploads/posts/' . 'foto_' . $data_upl . '.png');
        }
        $foto->description = $request->input('description');
        $foto->save();

        return back()->with('mensagem', 'Foto adicionada com sucesso!');
    }

    public function update(Request $request){
        $request->validate([
            'description' => 'required|min:1',
        ]);

        $foto = Gallery::find($request->input('id'));
        $foto->description = $request->input('description');
        $foto->view = $request->input('view');

        $data_upl = date('Y-m-d_H-i-s');
        if(!empty($request->file('modal-foto'))){
            Storage::disk('upl_foto')->put($request->input('foto'), file_get_contents($request->file('modal-foto')));
            $foto->foto = url('uploads/posts/' . $request->input('foto'));
        }

        $foto->save();

        return back()->with('mensagem', 'Foto Atualizada com suscesso!');
    }

    public function kill($id){
        $foto = Gallery::find($id);
        $result = substr($foto->foto, -28);
        Storage::disk('upl_foto')->delete($result);
        $foto->forceDelete();

        return redirect()->back()->with('mensagem', 'A foto foi excluída com sucesso!');
    }

}
