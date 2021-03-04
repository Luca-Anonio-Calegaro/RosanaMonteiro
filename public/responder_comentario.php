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
	$opcao_adm2 = $_POST['resposta'];
    if($opcao_adm2 != ''){
		$num = $_GET["num"];
		$num_hd = $_GET["num_hd"];
		$linhas_p_res = file_get_contents("dados.hd");

		$texto_completo_para_resposta = $num_hd . '♠' . $opcao_adm2 . '♠' . '♠' . $chamado_dados[4] . PHP_EOL;

		//procura pelo comentario escolhido, e edita-o
		$linhas_p_res_2 = str_replace($num, $texto_completo_para_resposta, $linhas_p_res);

		//resolve o problema
		$arquivo = fopen("dados.hd", "w");
		fclose($arquivo);
		$arquivo = fopen("dados.hd", "a");
		fwrite($arquivo, $linhas_p_res_2);
		fclose($arquivo);

        $_SESSION["resposta_hd" . $chamado_dados[4]] = $linhas_p_res_2;
		
		//volta á página
		header("Refresh: 0; url = ../recarregar_pagina_2.php");
	}
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