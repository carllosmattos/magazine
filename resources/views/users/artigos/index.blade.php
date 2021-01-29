@extends('users.layouts.app')

@section('content')
<ul class="list-group">
    <li class="list-group-item">
        <h4 class="text-center">Artigos</h4>
    </li>
</ul>

<div class="row">
    <div class="col-md-12">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('mensagem'))
        <div class="alert alert-success">{{session('mensagem')}}</div>
        @endif

        @if(isset($msg))
        <div class="alert alert-success">
            {!! $msg !!}
        </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">Lista de Artigos</div>
            @if(Auth::user()->level >= 2)
            <div class="panel-body">

                <a href="{!! url('/painel/criar-artigo') !!}">+ Adicionar Artigo</a>

                <div style="width:300px;" class="input-group pull-right">
                    <!-- <input type="text" class="form-control" placeholder="Pesquisar..."> -->
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle col-md-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtros <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right col-md-12">
                            <li><a href="{!! url('/painel/listar-artigos/ativos') !!}">Ativos</a></li>
                            <li><a href="{!! url('/painel/listar-artigos/desativados') !!}">Desativados</a></li>
                            <li><a href="{!! url('/painel/listar-artigos/destaque') !!}">Destaque</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @else
            Você não tem permissão para criar uma artigo.
            @endif
            <div class="panel-footer" style="padding:0px">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>foto</th>
                        <th>Data</th>
                        <th>Autor</th>
                        <th></th>
                    </tr>
                    @foreach($artigos as $artigo)
                    <tr>
                        <td>{{$artigo->id}}</td>
                        <td>
                            <?php
                            $texto = substr($artigo->titulo, 0, strrpos(substr($artigo->titulo, 0, 30), ' ')) . '...';
                            echo $texto;
                            ?>
                        </td>
                        <td>{{$artigo->categorias->name}}</td>
                        <td><img class="img-fluid" style="width: 80px;" src="{{ asset($artigo->foto) }}"></td>
                        <td>{{$artigo->created_at}}</td>
                        <td>{{$artigo->users->name}}</td>
                        <td>
                            @if(Auth::user()->level >= 2)
                            @if(!$artigo->deleted_at)
                                <a href="{{ route('artigo.edit', $artigo->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="{{route('artigo.destroy', $artigo->id)}}" class="btn btn-sm btn-danger">Dasativar</a>
                            @else
                                <a href="{{ route('artigo.postRestore', $artigo->id) }}" class="btn btn-sm btn-primary">Restaurar</a>
                                <a href="{{ route('artigo.postKill', $artigo->id) }}" class="btn btn-sm btn-danger">Deletar</a>
                            @endif
                            @else
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{ $artigos->links() }}
        </div>
    </div>
</div>
@endsection