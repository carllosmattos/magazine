@extends('users.layouts.app')

@section('content')
<ul class="list-group">
    <li class="list-group-item">
        <h4 class="text-center">Criar Artigo</h4>
    </li>
    <li class="list-group-item">
        <a href="{!! url('/painel') !!}">Painel</a> -> Criar Artigo
    </li>
</ul>

@if(isset($msg))
<div class="alert alert-success">
    {!! $msg !!}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="" action="{{ route('artigo.edit', $artigos->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Titulo: </label>
                        <input type="text" class="form-control" name="titulo" value="{{$artigos->titulo}}">
                    </div>
                    <div class="form-group">
                        <label>Subtítulo: </label>
                        <textarea class="ckeditor" name="caption" id="caption" rows="10" cols="110">{{$artigos->caption}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Categoria: </label>
                        <select class="form-control" name="categorias_id">
                            @foreach($categorias as $result)
                            <option value="{{$result->id}}" @if($artigos->categorias_id == $result->id) selected @endif>{{$result->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select Tags -->
                    <label>Selecione as Tags: </label>
                    <div class="form-group checkbox">
                        @foreach($tags as $tag)
                        <label style="margin-left: 20px;">
                            <input name="tag[]" type="checkbox" value="{{$tag->id}}" @foreach($artigos->tags as $value)
                            @if($value->id == $tag->id)
                            checked
                            @endif
                            @endforeach
                            >
                            {{$tag->name}}
                        </label>
                        @endforeach
                    </div>
                    <!-- Select Tags -->

                    <div class="form-group">
                        <label>Texto: </label>
                        <textarea class="ckeditor" name="content" id="content" rows="10" cols="110">{{$artigos->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <input type="file" name="foto" class="form-control" value="{{$artigos->foto}}">
                    </div>
                    <div class="form-group">
                        <label>Artigo destaque: </label>
                        <select class="form-control" name="spotlight">
                            <option value="1" @if($artigos->spotlight == 1) selected @endif>Sim</option>
                            <option value="0" @if($artigos->spotlight == 0) selected @endif>Não</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
    @endsection