<? 
  require_once "validador_acesso.php";
?>
<?php
    //chamados
    $chamados = array();
    $chamados_em_2 = array();

    //abrir o dados.hd
    $arquivo = fopen('dados.hd', 'r');

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
<?php
    $res = $_GET['res'];
    $num = $_GET['num'];
    $linhas = file_get_contents("dados.hd");

    $linhas_2 = str_replace($res, $num, $linhas);

    //resolve o problema
    $arquivo = fopen("dados.hd", "w");
    fclose($arquivo);
    $arquivo = fopen("dados.hd", "a");
    fwrite($arquivo, $linhas_2);
    fclose($arquivo);

	//volta á página
	header("Location: ../index.adm.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rosana Monteiro | Psicóloga | Rio de Janeiro</title>
    </head>
    <body style="font-family: Helvetica, Arial, sans-serif;background: linear-gradient(50deg, #ff4059, #6c02ff) !important;background-attachment: fixed;overflow-x: hidden;height: 100%;margin: 0px;padding: 0px;">
    </body>
</html>