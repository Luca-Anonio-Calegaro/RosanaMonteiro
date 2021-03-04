<? 
  require_once "public/validador_acesso.php";
?>
<?php
  ini_set('display_errors', 0 );
  error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    </head>
    <body class="d-flex justify-content-center">
        <div class="text-center">
            <h3 class="display-3">Estamos registrando sua resposta, por favor aguarde!</h3>
            <br/>
            <h3 id="h3-tempo-volta" class="display-4">Voltando á sua página em: 5s!</h3>
        </div>
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
        <? } ?>
        <script>
          let h3TempoVolta = document.getElementById("h3-tempo-volta")
          let segundos = 5
          function tempoVolta(){
              segundos = segundos - 1
              h3TempoVolta.innerText = 'Voltando à sua página em:' + ' ' + segundos + 's!'
              if(segundos < 1){
                location.href = 'index.php'
              }
          }
          window.setInterval(() => {tempoVolta()}, 1000);;
        </script>
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
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>