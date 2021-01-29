@extends('users.layouts.app')

@section('content')

<ul class="list-group">
    <li class="list-group-item">
        <h4 class="text-center">Galeria</h4>
    </li>
</ul>

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

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Gerenciar Galeria de Fotos</h3>
    </div>
</div>

<div class="panel-body">
    @if(Auth::user()->level >= 2)
    <form action="" action="{{url()->current()}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputFile">Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <label>Descrição: </label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="form-group">
            <label>Ver na galeria: </label>
            <select name="view-gallery" class="form-control">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Adicionar</button>
    </form>
    @else
    Você não tem permissão para criar uma tag.
    @endif
</div>
<div class="panel-footer" style="padding:0px">
    <div class="col-xs-12 col-sm-12">
        <div class="row">
            @foreach($fotos as $foto)
            <div class="col-xs-12 col-md-12" style="margin: 15px 0;">
                @if(Auth::user()->level >= 2)
                <div class="btn-group-vertical" role="group" aria-label="...">
                    <a class="btn btn-primary" onclick="editarFoto('{{$foto->id}}','{{$foto->foto}}','{{$foto->description}}','{{$foto->view}}')">
                        {{$foto->foto}} <br>
                        {{$foto->id}}
                        <img alt="" src="{{$foto->foto}}" style="width: 150px; height: 135px;">
                    </a>
                    <a class="btn btn-primary" onclick="editarFoto('{{$foto->id}}','{{$foto->foto}}','{{$foto->description}}','{{$foto->view}}')">Visualizar</a>
                    <a href="{{ url('painel/fotos/deletar/'.$foto->id) }}" class="btn btn-sm btn-danger">Deletar</a>
                </div>
                @else
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

{{ $fotos->links() }}

<script type="text/javascript">
    function editarFoto($id, $foto, $description, $view) {
        $('#id').val($id);
        $("#foto").attr("src", $foto);
        $('#link-foto').val($foto);
        $('#description').val($description);
        $('#description').val($description);
        $('#view').val($view);
        $('#editarCategoria').modal('toggle');
    }
</script>

<div class="modal fade bd-example-modal-lg" id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="{{url()->current().'/editar'}}" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title" id="myLargeModalLabel">Visualizar</h5>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <img alt="" id="foto" name="foto" src="" style="width: 100%; height: 600%;">
                    </div>
                    <div class="col-md-12">
                        <input style="width: 450px;" name="foto" type="text" id="link-foto" value="{{$foto->foto}}" readonly>
                        <a class="btn btn-success" onclick="copyClipboard()">Copiar link da imagem</a>
                    </div>
                    <script type="text/javascript">
                        function copyClipboard() {
                            /* Get the text field */
                            var copyText = document.getElementById("link-foto");

                            /* Select the text field */
                            copyText.select();
                            copyText.setSelectionRange(0, 99999); /* For mobile devices */

                            /* Copy the text inside the text field */
                            document.execCommand("copy");

                            /* Alert the copied text */
                            // alert("Copied the text: " + copyText.value);
                        }
                    </script>
                    <div class="form-group">
                        <label for="exampleInputFile">Mudar foto:</label>
                        <input type="file" name="modal-foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descrição:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Ver na galeria: </label>
                        <select name="view" id="view" class="form-control">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        @if(Auth::user()->level >= 2)
                        <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                        <a data-dismiss="modal" class="btn btn-sm btn-danger">Fechar</a>
                        @else
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection