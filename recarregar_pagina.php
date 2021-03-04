<?php
  ini_set('display_errors', 0 );
  error_reporting(0);
?>
<?
  # Mais praa frente
  /*
	$adm = $_GET["adm"];
  $no_adm = $_GET["no_adm"];
  if($adm == true){
    $adm = 'index.adm.php';
  }else if($no_adm == true){
    $adm = 'index.php';
  }
  */
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
            <h3 class="display-3">Estamos registrando seu comentário, por favor aguarde!</h3>
            <br/>
            <h3 id="h3-tempo-volta" class="display-4">Voltando á sua página em: 5s!</h3>
        </div>
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
    <? } ?>
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
<?php
    $arquivo = fopen('public/dados.hd', 'a');
    $arquivo_vpc = fopen('public/valida_primeiro_comentario.hd', 'a');
    $linhas_vpc = file("public/valida_primeiro_comentario.hd");
    $linhas_texto_vpc = file_get_contents('public/valida_primeiro_comentario.hd');
    if($linhas_texto_vpc === 'foi_comentado_2'){
        //sistenma de exclusao de linhas mal colocadas
        $linhas_excluir = file('public/dados.hd');
        $chamado_dados[4] = intval($chamado_dados[4]);
        $consertar_linhas_numero = count($linhas_excluir)-($chamado_dados[4]+1);
        $numero_da_linha = 0;
        //excluindo linhas
        //se $chamado_dados[4] for diferente do numero da linha, APAGUE-O!
        $numero = 0;
        while(1 === 1){
            $chamado_dados[4] = intval($chamado_dados[4]);
            $consertar_linhas_numero = count($linhas_excluir)-($chamado_dados[4]+1);
            $numero_da_linha = 0;
            $numero += 1;
            $linhas_excluir = file('public/dados.hd');
            unset($linhas_excluir[$numero_da_linha]);
            $arquivo_excluir = fopen("public/dados.hd", "w");
            foreach($linhas_excluir as $conteudo){
                fwrite($arquivo_excluir, $conteudo);
            }
            fclose($arquivo_excluir);
            if($numero === $consertar_linhas_numero){
                break;
            }
        }

        //////////////////////////////////////////////////

        //sistenma de exclusao de linhas mal colocadas
        $linhas_excluir = file('public/dados_hd.hd');
        $chamado_dados[4] = intval($chamado_dados[4]);
        $consertar_linhas_numero = count($linhas_excluir)-($chamado_dados[4]+1);
        $numero_da_linha = 0;
        //excluindo linhas
        //se $chamado_dados[4] for diferente do numero da linha, APAGUE-O!
        $numero = 0;
        while(1 === 1){
            $chamado_dados[4] = intval($chamado_dados[4]);
            $consertar_linhas_numero = count($linhas_excluir)-($chamado_dados[4]+1);
            $numero_da_linha = 0;
            $numero += 1;
            $linhas_excluir = file('public/dados_hd.hd');
            unset($linhas_excluir[$numero_da_linha]);
            $arquivo_excluir = fopen("public/dados_hd.hd", "w");
            foreach($linhas_excluir as $conteudo){
                fwrite($arquivo_excluir, $conteudo);
            }
            fclose($arquivo_excluir);
            if($numero === $consertar_linhas_numero){
                break;
            }
        }
    }
    
    //////////////////////////////////////////////////

    $arquivo_excluir = fopen('index.php', 'a');
    $linhas_excluir = file("index.php");
    $linhas_texto_vpc = file_get_contents('public/valida_primeiro_comentario.hd');
    if($linhas_texto_vpc_excluir === 'foi_comentado' ){
        //sistenma de exclusao de linhas mal colocadas
        $chamado_dados[4] = intval($chamado_dados[4]);
        $consertar_linhas_numero = $chamado_dados[4] - 1;

        $numero = 0;
        while(1 === 1){
            $chamado_dados[4] = intval($chamado_dados[4]);
            $consertar_linhas_numero = $chamado_dados[4] - 1;
            $numero += 1;
            $linhas_excluir = file('index.php');
            unset($linhas_excluir[12+($num*2)]);
            $arquivo_excluir = fopen("index.php", "w");
            foreach($linhas_excluir as $conteudo){
                fwrite($arquivo_excluir, $conteudo);
            }
            fclose($arquivo_excluir);
            if($numero === $consertar_linhas_numero){
                break;
            }
        }
    }
?>
<?php
    //abrindo o arquivo
	$arquivo_vpc = fopen('public/valida_primeiro_comentario.hd', 'a');
	$linhas_vpc = file("public/valida_primeiro_comentario.hd");
	$linhas_texto_vpc = file_get_contents('public/valida_primeiro_comentario.hd');
	if($linhas_texto_vpc === 'foi_comentado_2'){
        unset($linhas_vpc[1]);
        $arquivo_vpc = fopen("public/valida_primeiro_comentario.hd", "w");
        $linhas_vpc = file("public/valida_primeiro_comentario.hd");
        fwrite($arquivo_vpc, 'foi_comentado');
        fclose($arquivo_vpc);
    }
?>