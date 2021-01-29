@extends('revista.app')

@section('title', $artigos->titulo)

@section('todos', 'active')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body col-xs-12 col-sm-12">

                <h2 class="spotlight">{{$artigos->titulo}} </h2>
                <div class="col-xs-12 col-md-12">
                    <div>
                        <div class="caption">
                            <b style="color: #f00; font-weight: bold;">{{$artigos->categorias->name}} | <strong style="color: #000; font-weight: bold">{{$artigos->created_at->diffForHumans()}}</strong></b>
                        </div>
                        @if($artigos->foto != null)
                        <img class="post-thumb" src="{{$artigos->foto}}" data-holder-rendered="true" style="height: 600px; width: 100%; display: block;">
                        @else
                        @endif
                        <div class="post-content" style="padding: 0 20px; word-wrap: break-word;">
                            <p>{!!$artigos->caption!!} </p>
                            <p>{!!$artigos->content!!}</p>
                        </div>
                    </div>
                </div>

                <!-- LISTAGEM DE ARTIGOS -->
                <div class="col-xs-12 col-sm-12">
                    <h2 class="spotlight">Artigos Relacionados</h2>
                    @foreach($related as $rel)
                    <div class="col-xs-12 col-sm-12" style="border-left: #f00 solid 5px; border-bottom: #000 solid 1px; margin: 15px 0;">
                        <a href="{{route('viewPost.add',$rel->id)}}" style="color: #000; font-weight: bold;">
                            <div class="col-xs-12 col-lg-5">
                                <h2 class="title-rel" style="color: #000; font-weight: bold;">{{$rel->titulo}}</h2>
                                <p><strong style="color: #f00; font-weight: bold;">{{$rel->categorias->name}} </strong>| {{$rel->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="col-xs-12 col-lg-7">
                                <?php
                                $texto = substr($rel->content, 0, strrpos(substr($rel->content, 0, 400), ' ')) . ' [...]';
                                // echo $texto;
                                ?>
                                <p>
                                    {!! $texto !!}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="text-right">{{$related->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection