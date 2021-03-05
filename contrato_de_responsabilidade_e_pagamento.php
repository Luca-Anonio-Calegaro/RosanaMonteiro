<? 
  require_once "public/validador_acesso.php";
?>
<?
    ini_set('display_errors', 0 );
    error_reporting(0);
?>
<?php
    $erro = $_GET['erro'];
    if($erro == 1){
        echo "<script>alert('Atenção! Por favor, para continuar você precisa aceitar todos os temos!')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contrato de responsabilidade e pagamento</title>
        <!-- Estilo CSS -->
        <link rel="stylesheet" href="css/estilo.css" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Fontawesome CSS -->
        <script src="https://kit.fontawesome.com/ed736b9c69.js" crossorigin="anonymous"></script>

        <!--Favicon-->
        <link rel="icon" href="img/icon.png" />
    </head>
    <body style="font-family: Helvetica, Arial, sans-serif;background: linear-gradient(50deg, #ff4059, #6c02ff) !important;background-attachment: fixed;overflow-x: hidden;height: 100%;margin: 0px;padding: 0px;">
        <div class="d-flex justify-content-center">
            <div class="container mt-5 bg-light p-5">
                <form action="public/registra_contrato.php" method="post">
                    <h3>Contrato de responsabilidade e pagamento:</h3>
                    <p>Neste termo tem as seguintes condições:</p><br>
                    <ul>
                        <li><p>A família de <b>Luca Antônio Calegaro</b> não terá nenhuma reponsabilidade com o site, caso <b>Luca Antônio Calegaro</b> falte em sua programação de trabalho com <b>Rosana Monteiro</b>.</p></li>
                    </ul>
                    <p>Pagamento de entrada:</p><br>
                    <ul style="list-style: none !important;">
                        <li><p>Assinando este contrato você afirma efetuar o <b>pagamento de entrada</b> para <b>Luca Antônio Calegaro</b> com <b>pix</b>, pois no momento <b>Luca Antônio Calegaro</b> só possui <b>pix</b>.</p></li>
                        <li><p>Assinando este contrato você afirma efetuar o <b>pagamento de entrada</b> para <b>Luca Antônio Calegaro</b> por:</p> <select class="form-control" style="width: 250px !important;" name="pagamento_de_entrada" ><option value="R$130">R$130</option><option value="R$140">R$140</option><option value="R$150">R$150</option><option value="R$160">R$160<option value="R$170">R$170</option></option><option value="R$180">R$180</option><option value="R$190">R$190</option><option value="R$200">R$200</option></select></li>
                    </ul>
                    <p>Pagamento semanal:</p><br>
                    <ul style="list-style: none !important;">
                        <li><p>Assinando este contrato você afirma efetuar o pagamento <b>semanal</b> para <b>Luca Antônio Calegaro</b> com <b>pix</b>, pois no momento <b>Luca Antônio Calegaro</b> só possui <b>pix</b>.</p></li>
                        <li><p>Assinando este contrato você afirma efetuar o pagamento <b>semanal</b> para <b>Luca Antônio Calegaro</b> por:</p> <select class="form-control" style="width: 250px !important;" name="pagamento_semanal" ><option value="R$25">R$25</option><option value="R$30">R$30</option><option value="R$35">R$35</option><option value="R$40">R$40</option></select></li>
                        <br>
                        <li><p>Neste contrato você afirma ter mais de <b>18 anos</b>.</p></li>
                        <li><p>Neste contrato você afirma que irá efetuar o <b>pagamento de entrada</b>.</p></li>
                        <li><p>Neste contrato você afirma que irá efetuar o pagamento <b>semanal</b>.</p></li>
                        <div class="d-flex align-items-center">
                            <a style="min-height: 40px !important;" onmouseover="aparecerPQ()" onmouseout="aparecerPQ()" type="button" class="btn btn-warning btn-lg btn-a">Para que este contrato? <i class="fas fa-question-circle"></i></a>
                            <div class="hide d-flex align-items-center" id="caixa-btn-a"><i class="fas fa-caret-left fa-lg ml-4 text-warning"></i><div style="border-radius: 10px !important;" class="bg-warning pt-2 pr-5 pl-5"><p>Este contrato foi feito para melhor cuidado do site.</p></div></div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a style="min-height: 40px !important;" onmouseover="aparecerPQ2()" onmouseout="aparecerPQ2()" type="button" class="mt-3 btn btn-warning btn-lg btn-a">Para que a escolha de preços? <i class="fas fa-question-circle"></i></a>
                            <div class="hide d-flex align-items-center" id="caixa-btn-a-2"><i class="fas fa-caret-left fa-lg ml-4 text-warning"></i><div style="border-radius: 10px !important;" class="bg-warning pt-2 pr-5 pl-5"><p>Para darmos o melhor conforto ao nosso cliente.</p></div></div>
                        </div>
                    </ul>
                    <input type="submit" class="btn btn-primary btn-lg btn-block mt-5" value="Assinar">
                    <a id="btn-a-a-2" type="button" class="btn btn-dark btn-lg btn-block mt-3" href="index.adm.php">Voltar</a>
                </form>
            </div>
        </div>
        <br><br>
        <style>
            .btn-a:hover{
                color: #FFF !important;
            }
            .hide {
                display: none !important;
            }
        </style>
        <script>
            let btnA = document.getElementById("btn-a-a")
            let CaixabtnA = document.getElementById("caixa-btn-a")
            let aparecerPorQue = true
            function aparecerPQ(){
                if(aparecerPorQue == true){
                    CaixabtnA.classList.remove("hide")
                    aparecerPorQue = false
                }else{
                    CaixabtnA.classList.add("hide")
                    aparecerPorQue = true
                }
            }
            let btnA2 = document.getElementById("btn-a-a-2")
            let CaixabtnA2 = document.getElementById("caixa-btn-a-2")
            let aparecerPorQue2 = true
            function aparecerPQ2(){
                if(aparecerPorQue2 == true){
                    CaixabtnA2.classList.remove("hide")
                    aparecerPorQue2 = false
                }else{
                    CaixabtnA2.classList.add("hide")
                    aparecerPorQue2 = true
                }
            }
        </script>
    </body>
</html>
