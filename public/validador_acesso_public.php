<?php
    //chamados
    $chamados = array();

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
        $chamado_dados = explode('♣', $chamado);
        if(count($chamado_dados) < 4) {
        continue;
        }
    ?>
<? } ?>
<?php
  if(isset($_SESSION["id"]) == true){
      header("Location: excluir_comentarios.php?num=$chamado_dados[4]");
  }
?>