@extends('revista.app')

@section('title', 'Galeria de fotos')

@section('galeria', 'active')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body col-xs-12 col-sm-12">
                <h2 id="galeria-fotos" class="spotlight">Galeria de fotos</h2>
                <div class="col-xs-12 col-md-12">
                    @foreach($fotos as $foto)
                    @if($foto->view == 1)
                    <div class="col-xs-12 col-md-3">
                        <a target="_blank" href="{{$foto->foto}}"><img src="{{$foto->foto}}" alt="{{$foto->description}}" class="img-thumbnail gallery"></a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">{{$fotos->links()}}</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".gallery").hover(function() {
            $(this).addClass("expand")
            $(this).removeClass("img-thumbnail")
        }, function() {
            $(this).removeClass("expand")
            $(this).addClass("img-thumbnail")
        });
    });
</script>

@endsection