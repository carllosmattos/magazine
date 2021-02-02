@extends('revista.app')

@section('title', 'Galeria de arte')

@section('galeria', 'active')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body col-xs-12 col-sm-12">
                <h2 id="galeria-arte" class="spotlight">Galeria de arte</h2>
                <p>
                    Em meio à pandemia, sobressai a necessidade de mudança na concepção de qualidade de ensino que tenha como único
                    critério a formação científica do médico e não o bom desenvolvimento e a adaptação biopsicossocial do estudante.
                    Estratégias de enfrentamento de problemas mentais gerados pelo estresse e pela ansiedade no momento de pandemia
                    devem ser construídas para gerar um fator de proteção. É evidente que a saúde mental e o funcionamento psicológico
                    ideal dos estudantes de Medicina são importantes para o treinamento de médicos eficazes. Atravessar esse momento
                    de pandemia pela Covid-19 exigiu uma estratégia de coping para ajudar os alunos a vivenciar e extravasar seus medos,
                    sendo a arte a melhor forma de expressão, além de mais bela, deixando como parte do legado deste momento histórico
                    para as gerações futuras.
                </p>

                <!-- ########################################### -->
                <div style="margin-bottom: 30px;" class="col-xs-12 col-md-12">
                    <div class="col-xs-12 col-md-6">
                        <a href="{{URL::asset('uploads/posts/foto_2021-02-01_10-33-06.png')}}" target="_blank">
                            <img src="{{URL::asset('uploads/posts/foto_2021-02-01_10-33-06.png')}}" alt="Espilicute" class="img-thumbnail gallery">
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <h4 style="color: #000; font-weight: bold;">Uma vereda de senescer</h4>
                        A alvorada do ser <br>
                        Celebrada por todos <br>
                        O novo acaba de acontecer <br>
                        Logo caímos no engodo <br>
                        O epílogo é além <br>
                        Desenvolver em ascendência <br>
                        Meus iguais não têm declínio <br>
                        E se não produzir um líneo? <br>
                        Se, no frenesi, intermitência? <br>
                        Se repulsa ao olhar de outrem? <br>
                        Caso caia em sujeição <br>
                        O cárcere o espera <br>
                        O crepúsculo, pequena quimera <br>
                        Frente uma vida sem elação
                    </div>
                </div>
                <div align="center">
                    <strong style="color: red;">Bruno Fales</strong><br>
                    <span>Aluno de Medicina da Unichristus</span>
                </div>
                <!-- ########################################### -->

                <!-- ########################################### -->
                <div class="col-xs-12 col-md-12">
                    <hr>
                </div>
                <div class="col-xs-12 col-md-12">
                    <div class="col-xs-12 col-md-8">
                        <h4 style="color: #000; font-weight: bold;">Lírios de Luz</h4>
                        <p align="center">Ao Hospital São José</p> <br>
                        <div class="col-xs-12 col-md-6">
                            <p>
                                Como se enviada por anjos, ergue-se a <br>
                                Casa de Isolamento. <br>
                                Ali, a tuberculose, o sarampo, a crupe… <br>
                                ganham tratamento. <br>
                                À feição de milagres, vai aniquilando todo <br>
                                mal infeccioso. <br>
                                Já não se vê à beira do leito da meningite <br>
                                algo tão pavoroso.
                            </p>
                            <p>
                                Tem braços de bondosa criatura, adota <br>
                                abatidos enfermos: <br>
                                Homens, mulheres, guris… febris, <br>
                                sobreviventes do ermo. <br>
                                Alcança o nome de santo porque fez o que <br>
                                fez, e é o que é: <br>
                                Padroeiro dos operários, dos imigrantes, <br>
                                dos pais - São José.
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <p>
                                O artesão com sua fina adaga desbasta <br>
                                crostas, úlceras, pus. <br>
                                Dia a dia livra doentes da urna e familiares <br>
                                de maiores dores. <br>
                                Angaria empenhos dos Lenhosos braços <br>
                                de fiéis servidores.
                            </p>
                            <p>
                                Ensina a cura e não mensura os lírios e <br>
                                nardos que tanto reluz. <br>
                                Enchem-se de esperanças todos os que <br>
                                percorrem suas rampas. <br>
                                É imortal pois a eternidade vem da luz que <br>
                                há tempo estampa.
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <a href="{{URL::asset('uploads/posts/foto_2021-02-01_10-39-30.png')}}" target="_blank">
                            <img src="{{URL::asset('uploads/posts/foto_2021-02-01_10-39-30.png')}}" alt="Espilicute" class="img-thumbnail gallery">
                        </a>
                    </div>
                </div>
                <div align="center">
                    <strong style="color: red;">Jesus Irajacy Costa</strong><br>
                    <span>Médico e escritor</span>
                </div>
                <div class="col-xs-12 col-md-12">
                    <hr>
                </div>
                <!-- ########################################### -->

                <!-- ########################################### -->
                <div class="col-xs-12 col-md-12">
                    <div class="col-xs-12 col-md-6">
                        <a href="{{URL::asset('uploads/posts/foto_2021-02-01_10-32-32.png')}}" target="_blank">
                            <img src="{{URL::asset('uploads/posts/foto_2021-02-01_10-32-32.png')}}" alt="Espilicute" class="img-thumbnail gallery">
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-2">
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <a href="{{URL::asset('uploads/posts/foto_2021-02-01_10-32-10.png')}}" target="_blank">
                            <img src="{{URL::asset('uploads/posts/foto_2021-02-01_10-32-10.png')}}" alt="Espilicute" class="img-thumbnail gallery">
                        </a>
                    </div>
                    <div align="center">
                        <strong style="color: red;">Glauco Mariano Sobreira</strong><br>
                        <span>Médico do Hospital São José</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12">
                    <hr>
                </div>
                <!-- ########################################### -->
                <!-- ########################################### -->
                <div class="col-xs-12 col-md-12">
                    <div class="col-xs-12 col-md-6">
                        <a href="{{URL::asset('uploads/posts/foto_2021-02-01_10-39-53.png')}}" target="_blank">
                            <img src="{{URL::asset('uploads/posts/foto_2021-02-01_10-39-53.png')}}" alt="Espilicute" class="img-thumbnail gallery">
                        </a>
                        <div align="center">
                            <strong style="color: red;">Iana Lima Fernandes</strong><br>
                            <span>Aluna de Medicina da Unichristus</span>
                        </div>
                    </div>
                </div>
                <!-- ########################################### -->
            </div>
        </div>
    </div>
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