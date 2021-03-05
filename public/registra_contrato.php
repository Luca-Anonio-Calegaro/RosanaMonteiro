<? 
  require_once "validador_acesso.php";
?>
<?
    $pagamento_de_entrada = $_POST['pagamento_de_entrada'];
    $pagamento_semanal = $_POST['pagamento_semanal'];
?>
<?
    $pagamento_semanal = str_replace("R$", '', $pagamento_semanal);
    $mensalidade_cauculo = "R$" . ($pagamento_semanal * 4);
?>
<?php
    //construir o texto
    $arquivo_contrato = fopen("contrato.hd", "a");
    fwrite($arquivo_contrato, "<h3>Neste contrato você afirmou:</h3><br/>
    <ul>
        <li><p>Ter mais de <b>18 anos</b>.</p></li>
            
        <li><p>Afirmou que irá efetuar o <b>pagamento de entrada</b> por $pagamento_de_entrada.</p></li>
        <li><p>Afirmou que irá efetuar o <b>pagamento de entrada</b> por <b>pix</b>.</p></li>

        <li><p>Afirmou que irá efetuar o pagamento de <b>mensalidade</b> por $pagamento_semanal.</p></li>
        <li><p>Ou seja, a cada 1 mês você irá efetuar um pagamento de: $mensalidade_cauculo</p></li>
        <li><p>Afirmou que irá efetuar o pagamento de <b>mensalidade</b> por <b>pix</b>.</p></li>

        <li><p>Afirmou que A família de <b>Luca Antônio Calegaro</b> não terá nenhuma reponsabilidade com o site, caso <b>Luca Antônio Calegaro</b> falte em sua programação de trabalho com <b>Rosana Monteiro</b>.</p></li>
    </ul>");
    fclose($arquivo_contrato);
    //abrindo o arquivo
    $linhas = file('../Contrato.php');
        $linhas[32] = "<h3>Neste contrato você afirmou:</h3><br/>
        <ul>
            <li><p>Ter mais de <b>18 anos</b>.</p></li>
                
            <li><p>Afirmou que irá efetuar o <b>pagamento de entrada</b> por $pagamento_de_entrada.</p></li>
            <li><p>Afirmou que irá efetuar o <b>pagamento de entrada</b> por <b>pix</b>.</p></li>
    
            <li><p>Afirmou que irá efetuar o pagamento de <b>mensalidade</b> por $pagamento_semanal.</p></li>
            <li><p>Ou seja, a cada 1 mês você irá efetuar um pagamento de: $mensalidade_cauculo</p></li>
            <li><p>Afirmou que irá efetuar o pagamento de <b>mensalidade</b> por <b>pix</b>.</p></li>
    
            <li><p>Afirmou que A família de <b>Luca Antônio Calegaro</b> não terá nenhuma reponsabilidade com o site, caso <b>Luca Antônio Calegaro</b> falte em sua programação de trabalho com <b>Rosana Monteiro</b>.</p></li>
        </ul>" . PHP_EOL . '<a type="button" class="btn btn-dark btn-lg btn-block mt-3" href="index.adm.php">Voltar</a>' . PHP_EOL;
        $arquivo = fopen('../Contrato.php', 'w');
        foreach($linhas as $conteudo){
            fwrite($arquivo, $conteudo);
        }
    fclose($arquivo);
    header("Location: ../index.adm.php");
?>
