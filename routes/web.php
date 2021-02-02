<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'BlogController@index');
Route::get('/institucional', 'BlogController@about')->name('institucional.add');
Route::get('/listar-artigos/{filtro?}', 'BlogController@listPost')->name('listar-artigos.add');
Route::get('/artigo/{id}', 'BlogController@viewPost')->name('viewPost.add');
Route::get('/viversj', 'BlogController@viewMagazine')->name('viewMagazine.add');
Route::get('/galeria-fotos', 'BlogController@photoViewer')->name('photoViewer.add');
Route::get('/galeria-arte', 'BlogController@artViewer')->name('artViewer.add');
Route::get('/regras', 'BlogController@rules');



// Route::get('/revista/home', 'BlogController@index');
// Route::get('/revista/institucional', 'BlogController@about')->name('institucional.add');
// Route::get('/revista/listar-artigos/{filtro?}', 'BlogController@listPost')->name('listar-artigos.add');
// Route::get('/revista/artigo/{id}', 'BlogController@viewPost')->name('viewPost.add');
// Route::get('/revista/viversj', 'BlogController@viewMagazine')->name('viewMagazine.add');
// Route::get('/revista/galeria-fotos', 'BlogController@photoViewer')->name('photoViewer.add');
// Route::get('/revista/galeria-arte', 'BlogController@artViewer')->name('artViewer.add');
// Route::get('/revista/regras', 'BlogController@rules');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ROTAS PARA DESLOGAR E ENVIAR PARA VIEW DE LOGIN
Route::get('/auth/login', 'Auth\LoginController@logout');

Route::middleware(['auth'])->prefix('painel')->group(function(){
    Route::get('/', 'users\PanelsController@index');

    //Routes - Todos os usuários de level: 0(Leitor)
    Route::middleware(['level:0'])->group(function(){
        Route::get('/configuracoes', 'users\UserController@config');
        Route::post('/configuracoes', 'users\UserController@config_update');
    });

    //Routes - Todos os usuários de level: 1(Revisor)
    Route::middleware(['level:1'])->group(function(){
        Route::get('/categorias', 'users\CategoriasController@index');
        Route::get('/tags', 'users\TagsController@index');

        Route::get('/criar-artigo', 'users\ArtigosController@create');
        Route::post('/criar-artigo', 'users\ArtigosController@store');

        Route::get('/listar-artigos/{filtro?}', 'users\ArtigosController@index')->name('index.artigo');
        Route::get('/artigo/editar/{id}', 'users\ArtigosController@edit')->name('artigo.edit');
        Route::post('/artigo/editar/{id}', 'users\ArtigosController@update')->name('artigo.postEdit');
        Route::get('/artigo/restaurar/{id}', 'users\ArtigosController@restore')->name('artigo.postRestore');
        Route::get('/artigo/deletar/{id}', 'users\ArtigosController@kill')->name('artigo.postKill');

        Route::get('/deletar-artigo/{id}', 'users\ArtigosController@destroy')->name('artigo.destroy');

        Route::get('/fotos', 'users\GalleryController@index');
        Route::post('/fotos', 'users\GalleryController@store');
        Route::post('/fotos/editar', 'users\GalleryController@update');
        Route::get('/fotos/deletar/{id}', 'users\GalleryController@kill')->name('foto.postKill');

    });

    //Routes - Todos os usuários de level: 2(Admin)
    Route::middleware(['level:2'])->group(function(){
        Route::get('/criar-usuario', 'users\UserController@create');
        Route::post('/criar-usuario', 'users\UserController@store');

        Route::get('/listar-usuarios/{filtro?}', 'users\UserController@index');

        Route::get('/deletar-usuario/{id}', 'users\UserController@destroy');

        Route::post('/categorias', 'users\CategoriasController@store');
        Route::post('/categorias/editar', 'users\CategoriasController@update');
        Route::get('/categorias/deletar/{id}', 'users\CategoriasController@destroy');

        Route::post('/tags', 'users\TagsController@store');
        Route::post('/tags/editar', 'users\TagsController@update');
        Route::get('/tags/deletar/{id}', 'users\TagsController@destroy');

    });
});
