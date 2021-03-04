<? 
  require_once "validador_acesso_public.php";
?>
<?
    /*ini_set('display_errors', 0 );
    error_reporting(0);*/
?>
<?php
    session_start();

    $num = $_GET["num"];

    $num_hd = $_GET['num_hd'];
    
    // lê todo o conteudo do arquivo para o vetor linhas
    $linhas = file("dados.hd");

    //retira do vetor a linha excluida o -1 é para a linha anterior
    $linhas_texto_1 = file_get_contents("dados.hd");
    $linhas_texto_2 = file_get_contents("dados_hd.hd");
    $linhas_texto = str_replace($num, PHP_EOL, $linhas_texto_1);
    $linhas_texto_hd = str_replace($num_hd, PHP_EOL, $linhas_texto_2);
    $_SESSION['linhas_texto_hd'] = $linhas_texto_hd;

    $arquivo = fopen("dados.hd", "a");
    fclose($arquivo);
    $linhas = file('dados.hd');
    
    //reseta os arquivos
    $arquivo = fopen("dados.hd", "w");
    fclose($arquivo);

    //escreve os outros comentarios
    $arquivo = fopen("dados.hd", "a");
    fwrite($arquivo, $linhas_texto);
    fclose($arquivo);

    $_SESSION['recarregar_paagina_dados'] = 'sim';
    //volta á página
	  header("Location: ../index.php");
    exit();
?>