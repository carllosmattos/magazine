@extends('revista.app')

@section('title', 'Sobre nós')

@section('institucional', 'active')

@section('content')

<div class="container">
    <div class="col-xs-12 col-sm-12 jumbotron">
        <h2 class="spotlight">Sobre a revista Viver São José</h2>
        <p>
            A Revista Viver São José nasce do desejo de
            registrar as múltiplas experiências vividas
            no Hospital São José de Doenças Infecciosas
            (HSJ) ao longo dos seus 50 anos de história.
            A proposta da publicação é promover o
            resgate dessa trajetória, mas sempre com o
            olhar voltado aos desafios do presente e suas
            implicações para o nosso futuro.
        </p>

        <p>
            Por meio de artigos, análises, entrevistas e
            reportagens, a pesquisa acadêmica surge como
            uma protagonista na revista, um reflexo direto
            da relação estreita que a unidade hospitalar
            tem com a ciência. Nesta primeira edição, o
            debate sobre a pandemia de Covid-19 norteia
            as nossas pautas.
        </p>

        <p>
            Toda essa qualificação teórica, porém, chega
            ao nosso leitor através da simplicidade, outra
            marca importante do HSJ. Elegemos expressões
            do linguajar cearense para dar nome às nossas
            seções, deixando evidente a nossa vontade de
            dialogar com o público sem rodeios.
        </p>

        <p>
            Aproveite o nosso conteúdo!
        </p>
    </div>
</div>
<hr>

<div class="container jumbotron">
    <h2 class="spotlight">Expediente</h2>
    <div class="col-xs-12 col-sm-6">
        <h3 class="spotlight-title">HOSPITAL SÃO JOSÉ</h3>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Diretor Geral</b>
                <p>Edson Buhamra Abreu</p>
            </li>
            <li class="list-group-item">
                <b>Diretora Técnica</b>
                <p>Tânia Mara Silva Coelho</p>
            </li>
            <li class="list-group-item">
                <b>Diretora Clínica</b>
                <p>Christiane Takeda</p>
            </li>
            <li class="list-group-item">
                <b>Diretor Administrativo-Financeiro</b>
                <p>Nadirlan F. Fontinele</p>
            </li>
        </ul>
    </div>
    <div class="col-xs-12 col-sm-6">
        <h3 class="spotlight-title">REVISTA VIVER SÃO JOSÉ</h3>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Editora científica</b>
                <p>Melissa Medeiros</p>
            </li>
            <li class="list-group-item">
                <b>Editor de conteúdo</b>
                <p>Renato Abê</p>
            </li>
            <li class="list-group-item">
                <b>Designer gráfico</b>
                <p>Jeorge Farias</p>
            </li>
            <li class="list-group-item">
                <b>Fotos</b>
                <p>Tatiana Fontes(Governo do Ceará) e Acervo Jornal O POVO</p>
            </li>
        </ul>
    </div>
</div>

<div class="container">
    <h2 class="spotlight">Corpo editorial</h2>
    <div class="col-md-12">
        <div class="col-md-4">
            Érico Antônio Gomes de Arruda <br>
            Lisandra Serra Damasceno <br>
            Ricardo Coelho Reis <br>
            Terezinha do Menino Jesus Silva
        </div>
        <div class="col-md-4">
            Lara Gurgel Fernandes Távora <br>
            Ana Cláudia Lima <br>
            Isabel Cristina Veras
        </div>
        <div class="col-md-4">
            Andrea Pinheiro Morares Brandão <br>
            Jesus Irajacy Fernandes da Costa <br>
            Eder Janes Cavalcante Guerra
        </div>
    </div>
</div>

<hr>
<div class="container ideals ideals-large spotlight-content">
    <div class="row jumbotron-blank">
        <div class="col-xs-6 col-lg-4">
            <h2 class="spotlight-title">Missão</h2>
            <p>Cuidar de pessoas portadoras de doenças infecciosas com excelência e geração de conhecimento.</p>
        </div>
        <!--/.col-xs-6.col-lg-4-->
        <div class="col-xs-6 col-lg-4">
            <h2 class="spotlight-title">Visão</h2>
            <p>Resultado centrado no cidadão; Humanização do atendimento; Valorização das pessoas; Transparência; Conhecimento e inovação</p>
        </div>
        <!--/.col-xs-6.col-lg-4-->
        <div class="col-xs-6 col-lg-4">
            <h2 class="spotlight-title">Valores</h2>
            <p>Ser reconhecido pela sociedade e comunidade científica por sua excelência no cuidado, prevenção, ensino e pesquisa de doenças infecciosas. </p>
        </div>
        <!--/.col-xs-6.col-lg-4-->
    </div>
</div>
<div class="container ideals ideals-min">
    <div class="row jumbotron-blank">
        <div class="col-xs-12 col-lg-4">
            <b class="spotlight-title">Missão</b>
            <div class="ideals-content">Cuidar de pessoas portadoras de doenças infecciosas com excelência e geração de conhecimento.</div>
            <b class="spotlight-title">Visão</b>
            <div class="ideals-content">Resultado centrado no cidadão; Humanização do atendimento; Valorização das pessoas; Transparência; Conhecimento e inovação</div>
            <b class="spotlight-title">Valores</b>
            <div class="ideals-content">Ser reconhecido pela sociedade e comunidade científica por sua excelência no cuidado, prevenção, ensino e pesquisa de doenças infecciosas. </div>
        </div>
    </div>
</div>



@endsection