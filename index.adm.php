<? 
  require_once "public/validador_acesso.php";
?>
<?
    ini_set('display_errors', 0 );
    error_reporting(0);
?>
<?php
    $erro = $_GET["erro"];
    if($erro == 1){
        echo "<script>alert('Ops! Ocorreu um erro inseperado! Por favor tente novamente mais tarde!')</script>";
    }
?>
<?php
    $reload = $_GET["reload"];
    if($reload == true){
        header('Location: recarregar_pagina.php');
    }
?>
<?
    //abrindo o arquivo
	$arquivo_vpc = fopen('public/valida_primeiro_comentario.hd', 'a');
	$linhas_vpc = file("public/valida_primeiro_comentario.hd");
	$linhas_texto_vpc = file_get_contents('public/valida_primeiro_comentario.hd');
	if($linhas_texto_vpc != 'foi_comentado' && $linhas_texto_vpc != 'foi_comentado_2'){
        unset($linhas_vpc[1]);
        $arquivo_vpc = fopen("public/valida_primeiro_comentario.hd", "w");
        $linhas_vpc = file("public/valida_primeiro_comentario.hd");
        fwrite($arquivo_vpc, 'nao_foi_comentado');
        fclose($arquivo_vpc);
    }
    if($linhas_texto_vpc === 'foi_comentado'){
        $chamado_dados_validador = 'abc';
    }else if($linhas_texto_vpc === 'nao_foi_comentado'){
        $chamado_dados_validador = 'default';
    }
?>
<?php
    //abrindo o arquivo
	$arquivo_adm = fopen('public/adm_validador.hd', 'a');
	$linhas_file_adm = file("public/adm_validador.hd");
	unset($linhas_file_adm[1]);
    $arquivo_adm = fopen("public/adm_validador.hd", "w");
	$linhas_file_adm = file("public/adm_validador.hd");
	fwrite($arquivo_adm, 'adm');
	fclose($arquivo_adm);
?>
<?php
    //abrindo o arquivo
	$arquivo = fopen('public/dados_hd.hd', 'a');
	$linhas = file("public/dados_hd.hd");
	$linhas_texto = file_get_contents("public/dados.hd");
	if($linhas_texto === ''){
        unset($linhas[1]);
        $arquivo = fopen("public/dados_hd.hd", "w");
        $linhas = file("public/dados_hd.hd");
        fclose($arquivo);
    }
?>
<?php
    //abrindo o arquivo
	$arquivo = fopen('public/valida_segundo_comentario.hd', 'a');
	$linhas = file("public/valida_segundo_comentario.hd");
	$linhas_texto = file_get_contents('public/valida_segundo_comentario.hd');
	$linhas_dados = file("public/dados.hd");
	if(isset($linhas_dados[1]) == false){
        unset($linhas[1]);
        $arquivo = fopen("public/valida_segundo_comentario.hd", "w");
        $linhas = file("public/valida_segundo_comentario.hd");
        fwrite($arquivo, 'nao_foi_comentado');
        fclose($arquivo);
    }
?>
<?php
    //abrindo o arquivo
	$arquivo = fopen('public/valida_segundo_comentario.hd', 'a');
	$linhas = file("public/valida_segundo_comentario.hd");
	$linhas_texto = file_get_contents('public/valida_segundo_comentario.hd');
	$linhas_dados = file("public/dados.hd");
	if($linhas_dados[1] != ''){
        unset($linhas[1]);
        $arquivo = fopen("public/valida_segundo_comentario.hd", "w");
        $linhas = file("public/valida_segundo_comentario.hd");
        fwrite($arquivo, 'foi_comentado');
        fclose($arquivo);
    }
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rosana Monteiro | ADM</title>
        <!-- Estilo CSS -->
        <link rel="stylesheet" href="css/estilo.css" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Fontawesome CSS -->
        <script src="https://kit.fontawesome.com/ed736b9c69.js" crossorigin="anonymous"></script>

        <!--Favicon-->
        <link rel="icon" href="img/icon.png" />

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"
        ></script>

        <!--Media-->
        <style>
            .btn-excluir{
                opacity: 0.5 !important;
            }
            .btn-excluir:hover {
                opacity: 1 !important;
            }
            .ul-tratamos li:hover{
                cursor: pointer !important;
            }
            @media (min-width: 992px) and (max-width: 1199.98px){
                .h3-img-fundo-home-inicial{
                    margin-bottom: 1px;
                    font-size: 2.6em;
                }

                .b-img-fundo-home-inicial{
                    font-size: 1.4em;
                }            
            }
            @media (min-width: 768px) and (max-width: 991.98px){
            }
            @media (min-width: 576px) and (max-width: 767.98px){
                #caixa-comentario{
                    width: 100% !important;
                }
                .div-img-fundo-home-inicial{
                    background-position-y: -10px;
                    height: 350px !important;
                }

                .h3-img-fundo-home-inicial{
                    margin-bottom: 1px;
                    font-size: 2em;
                }

                .b-img-fundo-home-inicial{
                    font-size: 1.4em;
                }
            }
            @media (min-width: 576px){
                .div-img-fundo-home-inicial{
                    background-position-y: 0px;
                    height: 500px;
                }
                .card{
                    width: 50%;
                }
                .card-img{
                    height: 380px;
                }
            }
            @media (max-width: 576px){
                #caixa-comentario{
                    width: 100% !important;
                }
                .div-img-fundo-home-inicial{
                    background-position-y: -10px;
                    height: 200px;
                }

                .h3-img-fundo-home-inicial{
                    margin-bottom: 1px;
                    font-size: 1.4em;
                }

                .b-img-fundo-home-inicial{
                    font-size: 1.4em;
                }

                .card-body{
                    height: 200px;
                }

                .card-img-bottom{
                    height: 200px;
                }

                .container{
                    padding: 0px;
                    margin: 0px;
                }

                #div-pai-card-oline{
                    display: block !important;
                }

                .h3-tabela-home{
                    font-size: 2.4em;
                    text-align: center !important;
                }

                .p-tabela-home{
                    text-align: justify !important;
                }

                .bg-light-medium{
                    height: 105px;
                }

                .p-olá-rosana{
                    text-align: center !important;
                }

                .navbar-collapse{
                    width: 100% !important;
                }

                #div-transformacao-comentario{
                    width: auto !important;
                }

            }
        </style>
    </head>
    <body>
        <!--HEADER-->
        <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <!--Logo-->
                <a style="color: #fff;" href="#" class="navbar-brand">Rosana Monteiro</a>

                <!--Button Gmail-->
                <a target="_blank" href="mailto:rosanapsitcc@gmail.com" type="button" class="btn btn-outline-danger mr-auto"><img src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x_r2.png"></a>

                <!--Menu hamburguer-->
                <button
                class="navbar-toggler"
                data-toggle="collapse"
                data-target="#nav-target"
                >
                <span class="navbar-toggler-icon"></span>
                </button>
        
                <!--Navegação-->
                <div class="collapse navbar-collapse" id="nav-target">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a type="button" class="btn btn-outline-light mr-3" href="public/logoff.php">Sair</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="btn btn-outline-light mr-3" href="index.php">Página inicial</a>
                    </li>
                    <?
                        $arquivo_texto_contrato = file_get_contents("public/contrato.hd", "a");
                        $arquivo_texto_contrato = str_replace("
", '', $arquivo_texto_contrato);
                        $arquivo_texto_contrato = str_replace(" ", '', $arquivo_texto_contrato);
                    ?>
                    <?if($arquivo_texto_contrato != 'nada'){ ?>
                        <li class="nav-item">
                            <a href="Contrato.php" type="button" class="btn btn-outline-success"><i class="fas fa-check-circle fa-lg mr-1"></i><b>Contrato</b></a>
                        </li>
                    <? } ?>
                    <? if($arquivo_texto_contrato === 'nada'){?>
                        <li class="nav-item">
                            <a href="contrato_de_responsabilidade_e_pagamento.php" type="button" class="btn btn-outline-danger"><i class="fas fa-exclamation-circle fa-lg mr-1"></i><b>Contrato</b></a>
                        </li>
                    <? } ?>
                </ul>
                </div>
            </nav>
        </header>

        <!--FOTO-->
        <div class="div-img-fundo-home-inicial">
            <div class="container d-flex container-img-fundo-home-inicial">
                <h3 class="display-4 h3-img-fundo-home-inicial align-self-end text-left"><b><b>Psicóloga Rosana Monteiro</b></b>
                    <br/><b class="display-4 b-img-fundo-home-inicial">Faça uma consulta apartir de <b>R$130,00</b></b>
                </h3>
                <div class="d-flex justify-content-around ml-auto" style="width: 30%; height: fit-content;">
                    <a target="_blank" class="" href="https://www.facebook.com/rosana.monteiro.108889"><i class="fab fa-facebook-square fa-3x"></i></a>
                    <a target="_blank" class="icone-instagram" href="https://www.instagram.com/rosanapsitcc/"><i class="fab fa-instagram fa-3x"></i></a>
                    <a target="_blank" class="icone-telefone" href="https://api.whatsapp.com/send?phone=+55%2021%2098402-4794"><i class="fas fa-phone-square fa-3x"></i></a>
                </div>
            </div>
        </div>

        <section>
            <!--CARD-CONSULTA-ONLINE-->
            <div id="div-pai-card-oline" class="d-flex align-items-center justify-content-center">
                <!--CARD-1-ONLINE-->
                <div class="card text-dark">
                    <img
                    class="card-img"
                    src="img/hands-typing-on-laptop.jpg"
                    alt=""
                    />
                    <div class="card-img-overlay">
                        <div class="bg-light-medium pb-2 pt-2">
                                <div class="container">
                                <h4 class="card-title">Consultas online</h4>
                                <p class="card-text">
                                Venha fazer sua consulta online! Agende uma consulta agora!
                                </p>
                                <a target="_blank" href="mailto:rosanapsitcc@gmail.com" type="button" class="btn btn-outline-danger"><img src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x_r2.png"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--CARD-2-ONLINE-->
                <div class="card text-dark">
                    <img
                    class="card-img"
                    src="img/consulta-com-psicologo-saiba-por-que-buscar-esse-atendimento-1000x640.jpg"
                    alt=""
                    />
                    <div class="card-img-overlay">
                        <div class="bg-light-medium pb-2 pt-2">
                            <div class="container">
                            <h4 class="card-title">Consultas presenciais</h4>
                            <p class="card-text">
                                Venha fazer sua consulta presencial! Agende uma consulta agora!
                            </p>
                            <a target="_blank" href="mailto:rosanapsitcc@gmail.com" type="button" class="btn btn-outline-danger"><img src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x_r2.png"></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <!--TABELA-DE-COMENTÁRIO-->
            <div class="container bg-light">
                <h3 class="display-4 text-center h3-tabela-home">Novo sistema de comentários!</h3>
                <p class="pb-4 text-center p-tabela-home">Se está com alguma dúvida, pergunte para nós! Faça o seu comentário agora!
                    <button class="btn btn-outline-info" id="button-aparecer-tabela" onclick="aparecerTabela()">Fazer comentário</button> 
                </p>

                <!--FORMULÀRIO-->
                <div class="hide text-center pb-2" id="div-tabela">    
                    <h3 class="text-danger">
                    Devido ao um erro tiramos a possibilidade de comentar neste local.<br/>
                    Por favor volte a página inicial <i class="fas fa-arrow-right"></i> <a type="button" class="btn btn-primary" href="index.php">Página inicial</a>
                    </h3>
                </div>
            </div>
        </section>

        <section>
            <!--O-QUE-FAZEMOS-->
            <div class="bg-light pb-3">
                <div class="container flex-column">
                    <h3 class="display-4 text-center">Tratamos com:</h3>
                    <div class="d-flex justify-content-center text-center">
                        <ul class="pb-4 pt-2 ul-tratamos" style="list-style: none !important;">
                            <li onclick="aparecerTDAH()">TDAH (Transtorno do Déficit de Atenção e Hiperatividade)<i id="i-tdah" class="fas fa-caret-down fa-2x ml-2"></i></li>
                            <div class="hide div-tratamentos p-3" id="div-tdah">
                                Pessoas mais distraidas, dificuldade no aprendizado e com problemas de atenção, causam a ter o TDAH (transtorno do Déficit de Atenção e Hiperatividade). 
                                Você se indentifcou? Então venha fazer uma consulta conosco! 
                                Se quiser agendar uma consulta, é apenas clicar no botão de "Agendar" abaixo! 
                            </div>
                            <li onclick="aparecerTDO()">TOD (Transtorno Opositor Desafiador)<i id="i-tdo" class="fas fa-caret-down fa-2x ml-2"></i></li>
                            <div class="hide div-tratamentos p-3" id="div-tdo">
                                Apesar de ser um dos transtornos mais difíceis de se tratar, ainda sim é possível!
                                Também podemos dizer que pessoas com TOD causam a desafiar regras, se irrita fácil, 
                                discute com adultos ou figuras de autoridade e culpa os outros pelos próprios erros.
                                Você se indentifcou? Então venha fazer uma consulta conosco! 
                                Se quiser agendar uma consulta, é apenas clicar no botão de "Agendar" abaixo! 
                            </div>
                            <li onclick="aparecerAUTISMO()">AUTISMO<i id="i-autismo" class="fas fa-caret-down fa-2x ml-2"></i></li>
                            <div class="hide div-tratamentos p-3" id="div-autismo">
                                Também mais um transtorno que dificulta na socialização.
                                Um dos sintomas é o problema de comunicação, que varia do nível do autismo, a dificuldade no aprendizado escolar e de linguagem.
                                Também há tipos de autismo, como: 
                                <ul>
                                    <li>Síndrome de Asperger</li>
                                    <li>Transtorno Invasivo do Desenvolvimento</li>
                                    <li>Transtorno Autista</li>
                                </ul>
                                Você se indentifcou? Então venha fazer uma consulta conosco! 
                                Se quiser agendar uma consulta, é apenas clicar no botão de "Agendar" abaixo!
                            </div>
                        </ul>
                    </div>
                    <div id="mapa-div-pai-1" class="container d-flex mb-5 justify-content-center text-center">
                        <div class="row">
                            <div class="col-md-7 mt-5 mb-3" id="texto-mapa-1">
                                <div class="mt-5">
                                        <h3 class="mb-3">Temos consultório na Tijuca!</h3>
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right fa-lg"></i>&nbsp;&nbsp;Rua: Conde de Bonfim N°: 310</p>
                                        <br>
                                        <div class="d-flex justify-content-around container">
                                            <button id="button-mapa-1-2" onclick="ampliarMapa1()" class="hide btn btn-primary btn-lg mr-2"><b>Diminuir mapa</b></button>
                                            <button id="button-mapa-1" onclick="ampliarMapa1()" class="btn btn-primary btn-lg mr-2"><b>Ampliar mapa</b></button>
                                            <a target="_blank" href="mailto:rosanapsitcc@gmail.com" type="button" class="btn btn-outline-danger"><b>Agendar consulta por Email</b></a>
                                        </div>
                                    </div>
                                </div>
                            <iframe id="mapa-1" class="col-md-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3674.7335427536236!2d-43.23389878561357!3d-22.923196944218535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997e41cd1a3a31%3A0x1dc4aa40bb614465!2sRua%20Conde%20de%20Bonfim%2C%20310%20-%20Tijuca%2C%20Rio%20de%20Janeiro%20-%20RJ%2C%2020520-054!5e0!3m2!1spt-BR!2sbr!4v1607448537497!5m2!1spt-BR!2sbr" height="300" frameborder="1" style="border:1px solid gray;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>

                    <div id="mapa-div-pai-2" class="container d-flex mb-5 justify-content-center text-center">
                        <div class="row">
                            <div class="col-md-7 mt-5 mb-3" id="texto-mapa-2">
                                <div class="mt-5">
                                    <h3 class="mb-3">Temos consultório na Penha!</h3>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right fa-lg"></i>&nbsp;&nbsp;Avenida: Nossa Sra. da Penha N°: 364</p>
                                    <br>
                                    <div class="d-flex justify-content-around container">
                                        <button id="button-mapa-2-2" onclick="ampliarMapa2()" class="hide btn btn-primary btn-lg mr-2"><b>Diminuir mapa</b></button>
                                        <button id="button-mapa-2" onclick="ampliarMapa2()" class="btn btn-primary btn-lg mr-2"><b>Ampliar mapa</b></button>
                                        <a target="_blank" href="mailto:rosanapsitcc@gmail.com" type="button" class="btn btn-outline-danger"><b>Agendar consulta por Email</b></a>
                                    </div>
                                </div>
                            </div>
                            <iframe id="mapa-2" class="col-md-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.8422734864694!2d-43.28460738561553!3d-22.84532424142282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997b8597d785c7%3A0x1365edbb900ed693!2sAv.%20Nossa%20Sra.%20da%20Penha%2C%20364%20-%20Penha%2C%20Rio%20de%20Janeiro%20-%20RJ%2C%2021070-390!5e0!3m2!1spt-BR!2sbr!4v1607448671240!5m2!1spt-BR!2sbr" height="300" frameborder="1" style="border:1px solid gray;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                    <script>
                        let mapa1 = document.getElementById("mapa-1")
                        let mapa2 = document.getElementById("mapa-2")
                        let textoMapa1 = document.getElementById("texto-mapa-1")
                        let textoMapa2 = document.getElementById("texto-mapa-2")
                        let mapaDivPai1 = document.getElementById("mapa-div-pai-1")
                        let mapaDivPai2 = document.getElementById("mapa-div-pai-2")
                        let buttonMapa1 = document.getElementById("button-mapa-1")
                        let buttonMapa2 = document.getElementById("button-mapa-2")
                        let buttonMapa1_2 = document.getElementById("button-mapa-1-2")
                        let buttonMapa2_2 = document.getElementById("button-mapa-2-2")
                        let aparecerMapa1 = true
                        let aparecerMapa2 = true
                        var windowWidth = window.innerWidth
                        var screenWidth = screen.width
                        if(windowWidth < 992 || screenWidth < 992){
                            buttonMapa1.classList.add("hide")
                            buttonMapa2.classList.add("hide")
                        }
                        function ampliarMapa1(){
                            if(aparecerMapa1 == true){
                                mapaDivPai1.classList.remove("d-flex")
                                mapaDivPai1.classList.add("flex-column")
                                textoMapa1.classList.remove("col-md-7")
                                textoMapa1.classList.add("col-md-12")
                                mapa1.classList.remove("col-md-5")
                                mapa1.style.width = '100%'
                                mapa1.style.height = '400px'
                                aparecerMapa1 = false
                                buttonMapa1.classList.add("hide")
                                buttonMapa1_2.classList.remove("hide")
                            }
                            else{
                                mapaDivPai1.classList.add("d-flex")
                                mapaDivPai1.classList.remove("flex-column")
                                textoMapa1.classList.add("col-md-7")
                                textoMapa1.classList.remove("col-md-12")
                                mapa1.classList.add("col-md-5")
                                mapa1.style.width = 'min-content'
                                mapa1.style.height = '300px'
                                aparecerMapa1 = true
                                buttonMapa1.classList.remove("hide")
                                buttonMapa1_2.classList.add("hide")
                            }
                        }
                        function ampliarMapa2(){
                            if(aparecerMapa2 == true){
                                mapaDivPai2.classList.remove("d-flex")
                                mapaDivPai2.classList.add("flex-column")
                                textoMapa2.classList.remove("col-md-7")
                                textoMapa2.classList.add("col-md-12")
                                mapa2.classList.remove("col-md-5")
                                mapa2.style.width = '100%'
                                mapa2.style.height = '400px'
                                aparecerMapa2 = false
                                buttonMapa2.classList.add("hide")
                                buttonMapa2_2.classList.remove("hide")
                            }
                            else{
                                mapaDivPai2.classList.add("d-flex")
                                mapaDivPai2.classList.remove("flex-column")
                                textoMapa2.classList.add("col-md-7")
                                textoMapa2.classList.remove("col-md-12")
                                mapa2.classList.add("col-md-5")
                                mapa2.style.width = 'min-content'
                                mapa2.style.height = '300px'
                                aparecerMapa2 = true
                                buttonMapa2.classList.remove("hide")
                                buttonMapa2_2.classList.add("hide")
                            }
                        }
                    </script>
                    <p class=" pt-4 p-olá-rosana">Olá, meu nome é Rosana Monteiro e estou aqui para te ajudar. Escreva sua dúvida ou questionamento, mande um email para mim que responderei você assim que possível!</p>
                    <a target="_blank" href="mailto:rosanapsitcc@gmail.com" type="button" class="btn btn-outline-danger"><img src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x_r2.png"></a>
                </div>
            </div>
        </section>

        <section>
            <!--COMENTÁRIOS-->
            <div class="container bg-light pb-3 mb-4" id="div-pai-comentarios">
                <h3 class="display-4 container bg-light" style="margin-bottom: 0px;">Comentários:</h3><br/>
                <hr/>
                <script>
                    let divTabela = document.getElementById("div-tabela")
                    const divTDAH = document.getElementById("div-tdah")
                    const iTDAH = document.getElementById("i-tdah")
                    const divTDO = document.getElementById("div-tdo")
                    const iTDO = document.getElementById("i-tdo")
                    const divAUTISMO = document.getElementById("div-autismo")
                    const iAUTISMO = document.getElementById("i-autismo")
                    const divRua2 = document.getElementById("div-rua-2")
                    const iRua2 = document.getElementById("i-rua-2")
                    const divRua3 = document.getElementById("div-rua-3")
                    const iRua3 = document.getElementById("i-rua-3")

                    let aparecerTAB = true
                    let aparecerDivTDAH = true
                    let aparecerDivTDO = true
                    let aparecerDivAUTISMO = true
                    let aparecerDivRua2 = true
                    let aparecerDivRua3 = true


                    function aparecerTabela(){
                        if(aparecerTAB === true){
                            divTabela.classList.remove("hide")
                            aparecerTAB = false
                        }
                        else{
                            divTabela.classList.add("hide")
                            aparecerTAB = true
                        }
                    }

                    function aparecerTDAH(){
                        if(aparecerDivTDAH === true){
                            divTDAH.classList.remove("hide")
                            aparecerDivTDAH = false
                        }
                        else{
                            divTDAH.classList.add("hide")
                            aparecerDivTDAH = true
                        }
                    }

                    function aparecerAUTISMO(){
                        if(aparecerDivAUTISMO === true){
                            divAUTISMO.classList.remove("hide")
                            aparecerDivAUTISMO = false
                        }
                        else{
                            divAUTISMO.classList.add("hide")
                            aparecerDivAUTISMO = true
                        }
                    }

                    function aparecerTDO(){
                        if(aparecerDivTDO === true){
                            divTDO.classList.remove("hide")
                            aparecerDivTDO = false
                        }
                        else{
                            divTDO.classList.add("hide")
                            aparecerDivTDO = true
                        }
                    }

                    function aparecerRua2(){
                        if(aparecerDivRua2 === true){
                            divRua2.classList.remove("hide")
                            aparecerDivRua2 = false
                        }
                        else{
                            divRua2.classList.add("hide")
                            aparecerDivRua2 = true
                        }
                    }

                    function aparecerRua3(){
                        if(aparecerDivRua3 === true){
                            divRua3.classList.remove("hide")
                            aparecerDivRua3 = false
                        }
                        else{
                            divRua3.classList.add("hide")
                            aparecerDivRua3 = true
                        }
                    }
                </script>
                    <? if($chamado_dados_validador != 'default') { ?>
                        <?php
                            //chamados
                            $chamados = array();
                            $chamados_em_2 = array();

                            //abrir o dados.hd
                            $arquivo = fopen('public/dados.hd', 'r');

                            //enquanto houver registros (linhas) a serem recuperados
                            while(!feof($arquivo)) { //testa pelo fim de um arquivo
                                //linhas
                                $registro = fgets($arquivo);
                                $chamados[] = $registro;
                            }

                            //fechar o arquivo aberto
                            fclose($arquivo);
                        ?>
                        <div style="max-height: 550px; min-height: 100px; height: min-content !important; overflow-y: scroll !important;">
                            <? foreach($chamados as $chamado) { ?>
                                <?php
                                    $chamado_dados_em_2 = explode('♠', $chamado);
                                    if(count($chamado_dados_em_2) < 4) {
                                        continue;
                                    }
                                ?>
                                <?php
                                    $chamado_dados = explode('♣', $chamado);
                                    if(count($chamado_dados) < 4) {
                                        continue;
                                    }
                                ?>
                                <?php
                                    $chamado_dados[5] = str_replace('Ps:   ', 'Ps: Anônimo', $chamado_dados[5]);
                                ?>
                                <div class="d-flex">
                                    <div class="row container">
                                        <div class="card mb-3 bg-light d-flex flex-column" id="caixa-comentario">
                                            <div class="d-flex justify-content-between" style="background: linear-gradient(50deg, #76ff37, #02ffc0) !important;">
                                                <div class="card-body">
                                                <?
                                                    $ççol = 'texto_completo_hd_forech';
                                                    $ttol = 'texto_completo_forech';
                                                    $ççol_completo = $ççol . $chamado_dados[4];
                                                    $ttol_completo = $ttol . $chamado_dados[4];
                                                    $_SESSION[$ççol_completo] = $_SESSION["texto_hd" . $chamado_dados[4]];
                                                    $_SESSION[$ttol_completo] = $_SESSION["texto_hd_hd" . $chamado_dados[4]];
                                                ?>
                                                    <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                                                    <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                                                    <p class="card-text"><?=$chamado_dados[3]?></p>
                                                    <p class="card-text">Post n°: <?=$chamado_dados[4]?></p>
                                                    <p class="card-text" style="bottom: 0 !important;"><?=$chamado_dados[5]?></p>
                                            </div>
                                            
                                            <form style="max-width: 300px !important;" method="post" action="public/excluir_comentarios.php?num=<?=$_SESSION[$ççol_completo]?>&num_hd=<?=$_SESSION[$ttol_completo]?>" class="d-flex justify-conetnt-around">
                                                <button style="background: linear-gradient(50deg, #ff4059, #6c02ff) !important; height: 100% !important;" type="submit" class="btn btn-dark btn-excluir" class="text-dark"><i class="fas fa-trash-alt fa-3x"></i> <!--<i class="fas fa-edit fa-3x"></i>--></button>
                                            </form>
                                        </div>
                                        <?php
                                            $chamado_dados[5] = str_replace('Ps:  ', '', $chamado_dados[5]);
                                            $chamado_dados[5] = str_replace('Ps: Anônimo', 'Anônimo', $chamado_dados[5]);
                                        ?>
                                        <?
                                            $texto_placeholder = "Digite sua resposta para '$chamado_dados[5]'";
                                            if($chamado_dados_em_2[2] != ''){
                                                $texto_placeholder = "Edite sua resposta para '$chamado_dados[5]'";
                                            }
                                            $texto_placeholder = substr($texto_placeholder, 0, -1);
                                        ?>
                                        <?
                                            $ççol = 'texto_completo_hd_forech';
                                            $ttol = 'texto_completo_forech';
                                            $ççol_completo = $ççol . $chamado_dados[4];
                                            $ttol_completo = $ttol . $chamado_dados[4];
                                            $_SESSION[$ççol_completo] = $_SESSION["texto_hd" . $chamado_dados[4]];

                                            $_SESSION[$ttol_completo] = $_SESSION["texto_hd_hd" . $chamado_dados[4]];
                                        ?>
                                    </div>
                                    <form class="container col-md-5" action="public/responder_comentario.php?num=<?=$_SESSION[$ççol_completo]?>&num_hd=<?=$_SESSION[$ttol_completo]?>" method="post">
                                        <textarea required placeholder="<?=$texto_placeholder?>'" class="p-4" name="resposta" id="resposta" cols="30" rows="8" minlength="1" maxlength="180" style="min-height: 9.95rem !important; width: 100% !important; height: fit-content !important; max-height: 9.95rem !important;"></textarea>
                                        <input style="background: linear-gradient(50deg, #ff4059, #6c02ff) !important;" type="submit" value="Responder" class="input-enviar btn btn-block">
                                    </form>
                                </div>
                                <? if($chamado_dados_em_2[2] != '') { ?>
                                    <div class="d-flex justify-content-between">
                                        <div class="card mb-3 d-flex pl-3" style="background: linear-gradient(50deg, #ff4059, #6c02ff) !important; border: #ff4059 2px solid; margin-left: 7rem;">
                                            <div class="row">
                                                <div class="card-body d-flex flex-column">
                                                    <!--USER-->
                                                    <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Assunto: Resposta</h6>
                                                    <!--RESPOSTA-->
                                                    <p class="card-text"><?=$chamado_dados_em_2[2]?></p>
                                                </div>
                                                <?
                                                    $_SESSION['resposta_id'] = $_SESSION["resposta_hd" . $chamado_dados[4]];
                                                ?>
                                                <form style="max-width: 300px !important;" method="post" action="public/excluir_respostas.php?res=<?=$_SESSION['resposta_id']?>&num=<?=$_SESSION[$ççol_completo]?>" class="d-flex flex-column alig-items-center p-5">
                                                    <button style="background: linear-gradient(50deg, #ff4059, #6c02ff) !important;" type="submit" class="btn btn-dark" ><i class="fas fa-trash-alt fa-3x"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>        
                                <? } ?>
                            <? } ?>
                        </div>
                <? } else {?>
                    <div class="d-flex justify-content-center">
                        <h5 class="card-title text-success">Nenhum comentário registrado!</p>
                    </div>
                <? } ?>
            </div>
        </section>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <footer class="text-center text-white pb-1">Rosana Monteiro &copy; - Todos os direitos reservados - 2020 - Ultima atualização: 4/3/2021 - Feito por <b>Luca Antônio Calegaro</b></footer>
    </body>
</html>
