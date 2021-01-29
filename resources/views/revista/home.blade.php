@extends('revista.app')

@section('title', 'Home')

@section('home', 'active')

@section('content')

<?php
$titulo = "Revista Viver São José";
?>

<!-- <h1><?php    ?></h1> -->


<iframe src="{{ asset('turn/views/index.html') }}" style="width: 100%; height: 550px; overflow: hidden; position: relative; margin-top: -22px; margin-bottom: 10px;" title=""></iframe>

<div class="col-xs-12 col-sm-12">
    <div class="col-xs-12 col-lg-4"></div>
    <div class="col-xs-12 col-lg-4">
        <a class="col-xs-12 col-lg-12 btn btn-danger" href="/revista/viversj" target="_blank">Abrir revista</a>
    </div>
    <div class="col-xs-12 col-lg-4"></div>
</div>

<div class="col-xs-12 col-sm-12 spotlight-content">
    <h2 class="spotlight">Destaques</h2>

    <div class="row">
        @foreach($spotlight as $spot)
        <div class="col-xs-12 col-md-4" style="margin: 15px 0;">
            <a href="{{route('viewPost.add',$spot->id)}}">
                @if($spot->foto != null)
                <img alt="" src="{{$spot->foto}}" style="height: 300px; width: 100%; display: block;">
                @else
                <img style="height: 300px; width: 100%; display: block;" src="http://10.14.1.21:8177/uploads/posts/foto_2021-01-29_14-20-35.png" alt="">
                @endif
                <b style="color: #f00; font-weight: bold;">{{$spot->categorias->name}} | </b>
                <strong style="color: #000; font-weight: bold;">{{$spot->created_at->diffForHumans()}}</strong> <br>
                <a href="{{route('viewPost.add',$spot->id)}}" class="title-recent-post">{{$spot->titulo}}</a>
            </a>
        </div>
        @endforeach
    </div>
</div>

<div class="col-xs-12 col-sm-12 spotlight-content">
    <h2 class="spotlight">Artigos recentes</h2>
    <div style="width: 85%; margin-right: auto; margin-left: auto;">

        @foreach($recent as $post)
        <div class="col-xs-12 col-lg-3" style="margin: 15px 0;">
            <a href="{{route('viewPost.add',$post->id)}}">
                @if($post->foto != null)
                <img alt="" src="{{$post->foto}}" data-holder-rendered="true" style="height: 250px; width: 100%; display: block;">
                @else
                <img style="height: 250px; width: 100%; display: block;" src="http://10.14.1.21:8177/uploads/posts/foto_2021-01-29_14-20-35.png" alt="">
                @endif
                <div class="img-desc">
                    <b style="color: #f00; font-weight: bold;">{{$post->categorias->name}} | <strong class="desc-spotlight-post">{{$post->created_at->diffForHumans()}}</strong></b>
                    <br>
                    <a href="{{route('viewPost.add',$post->id)}}" class="title-spotlight-post">
                        <?php
                        $texto = substr($post->titulo, 0, strrpos(substr($post->titulo, 0, 60), ' ')) . '...';
                        echo $texto;
                        ?>
                    </a>
                </div>
            </a>
        </div>
        @endforeach
        <div class="text-left"><a class="btn btn-danger" href="/revista/listar-artigos/todos">Ver mais</a></div>
        
    </div>
</div>

@endsection