@extends('revista.app')

@section('title', 'Todos os Artigos')

@section('todos', 'active')

@section('content')

<div class="col-xs-12 col-sm-12 spotlight-content">
    <h2 class="spotlight">Artigos</h2>
</div>

<div class="container">
    <!-- LISTAGEM DE ARTIGOS -->
    <div class="col-xs-12 col-sm-12">
        <div style="width:300px;" class="input-group pull-right">
            <!-- <input type="text" class="form-control" placeholder="Pesquisar..."> -->
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle col-md-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right col-md-12">
                    <li><a href="/listar-artigos/todos">Todos</a></li>
                    @foreach($categorias as $categoria)
                    <li><a href="/listar-artigos/<?php echo $categoria->id; ?>">{{$categoria->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @foreach($list_post as $post)
        <div class="col-xs-12 col-sm-12" style="border-left: #f00 solid 5px; border-bottom: #000 solid 1px; margin: 15px 0;">
            <a href="{{route('viewPost.add',$post->id)}}" style="color: #000; font-weight: bold;">
                <div class="col-xs-12 col-lg-5">
                    <h2 style="color: #000; font-weight: bold;">{{$post->titulo}}</h2>
                    <p><strong style="color: #f00; font-weight: bold;">{{$post->categorias->name}} </strong>| {{$post->created_at->diffForHumans()}}</p>
                </div>
                <div class="col-xs-12 col-lg-7">
                    <?php
                    $texto = substr($post->content, 0, strrpos(substr($post->content, 0, 800), ' ')) . ' [...]';
                    // echo $texto;
                    ?>
                    <p>
                        {!! $texto !!}
                    </p>
                </div>
            </a>
        </div>
        <br>
        @endforeach
        <div class="text-right">{{$list_post->links()}}</div>
    </div>
</div>
@endsection