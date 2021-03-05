<?
   ini_set('display_errors', 0 );
    error_reporting(0);
?>
<?php
	session_start();

	$arquivo_vpc = fopen('valida_primeiro_comentario.hd', 'a');
	$linhas_vpc = file("valida_primeiro_comentario.hd");
	$linhas_texto_vpc = file_get_contents('valida_primeiro_comentario.hd');
    if($linhas_texto_vpc === 'foi_comentado'){
		unset($linhas_vpc[1]);
		$arquivo_vpc = fopen("valida_primeiro_comentario.hd", "w");
		$linhas_vpc = file("valida_primeiro_comentario.hd");
		fwrite($arquivo_vpc, 'foi_comentado_2');
		fclose($arquivo_vpc);
	}

	$linhas_texto_s = file_get_contents("valida_segundo_comentario.hd");

	//estamos trabalhando na montagem do texto
	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-', $_POST['descricao']);
	$descricao = str_replace('#', '-', $_POST['descricao']);
	$email = str_replace('#', '-', $_POST['email']);
	$user = str_replace('#', '-', $_POST['user']);
	$opcao_adm2 = $_POST['resposta'];

	$descricao = str_replace('
', ' ', $descricao);

	$linhas_vch = file_get_contents("chamados_validador.hd");
	if($linhas_vch === 'pode'){
		$chamado_validador = 'pode';
		if($linhas === ''){
			$chamado_validador = 'default';
		}
	}else if($linhas_vch === 'nao_pode'){
		$chamado_validador = 'nao_pode';
	}

	
	$arquivo_res = fopen('dados.hd', 'a');
	$linhas_res = file_get_contents("dados.hd");
	fclose($arquivo_res);

	$num = $_GET["num"];

	$linhas_res = file_get_contents("dados_hd.hd");
	$linhas_p_res = file("dados_hd.hd");

	$texto_completo_para_resposta = '♠' . $opcao_adm2 . '♠' . '♠' . $chamado_dados[4] . PHP_EOL; //parte da linha (resposta)
	$texto_completo_para_resposta_2 = $linhas_p_res[$num-1] . $texto_completo_para_resposta;

	$arquivo_adm = fopen('adm_validador.hd', 'a');
    $linhas_adm = file_get_contents("adm_validador.hd");
    if($linhas_adm === 'no_adm'){
        $no_adm = true;
    }else if($linhas_adm === 'adm'){
        $adm = true;
    }
    fclose($arquivo_adm);

	$arquivo = fopen('dados.hd', 'a');
	$arquivo_hd = fopen('dados_hd.hd', 'a');
    while(!feof($arquivo)) {
		$registro = fgets($arquivo);
		$chamados[] = $registro;
		$chamados = array();

		$chamados_em_2 = array();

		$chamado_dados_em_2 = array();
		$chamado_dados_em_2[1] = $chamado_dados;


		$arquivo = fopen('dados.hd', 'r');
		while(!feof($arquivo)) {
			$registro = fgets($arquivo);
			$chamados[] = $registro;
		}
    }
    fclose($arquivo);
	//CADA POST, ADICONAR MAIS UM EM '$chamado_dados[4] = $id'
    foreach($chamados as $chamado) {
		//PEGA O '$chamado_dados[4] = $id'
        $chamado_dados_em_2 = explode('♠', $chamado);
        if(count($chamado_dados_em_2) < 4) {
            continue;
        }
		
		$chamado_dados = explode('♣', $chamado);
        if(count($chamado_dados) < 4) {
            continue;
		}
	}

	//PARA CADA POST, ADICONAR MAIS UM EM $id
	foreach($chamados as $chamado){
		$chamado_dados[4] = intval($chamado_dados[4]);
		$chamado_dados[4] += 1;
		$ele_menos_1 = $chamado_dados[4] - 1;//5
		$linhas_lh = file("dados.hd");
		$numero_da_linha = count($linhas_lh);
		$numero_da_linha = intval($numero_da_linha);
		//IMPORTANTISSIMO
		$numero_da_linha = $numero_da_linha + 1;
		$chamado_dados[4] = $numero_da_linha;//3
	}

	foreach($chamados as $chamado){
		//implode('♣', $_POST);
		if($_SESSION["id"] != ''){
			$email = $_SESSION["id"];
		}
		$texto = '¢' . '♠' . '♣' . $titulo . '♣' . 'Assunto:' . ' ' . $categoria . '♣' . $descricao . '♣' . $chamado_dados[4] . '♣' . 'Ps:' . ' ' . ' ' . $user . ' ' . '♣' . $email . '♣';
		$texto_resposta = '♠' . '' . '♠';
		$texto_id = '♠' . $chamado_dados[4];
		$a = '♠' . $texto;

		$arquivo_res = fopen('dados.hd', 'a');
		$linhas_res = file_get_contents("dados.hd");
		fclose($arquivo_res);
		$num = $_GET["num"];
		$linhas_res = file_get_contents("dados_hd.hd");
		$linhas_p_res = file("dados_hd.hd");
		$texto_completo_para_resposta = '♠' . $opcao_adm2 . '♠' . '♠' . $chamado_dados[4] . PHP_EOL; //parte da linha (resposta)
		$texto_completo_para_resposta_2 = $linhas_p_res[$num-1] . $texto_completo_para_resposta;
		
		$texto_completo = $texto . $texto_resposta . $texto_id . $a;
		$_SESSION["texto_hd" . $chamado_dados[4]] = $texto_completo;
		$texto_hd = $texto;
		$_SESSION["texto_hd_hd" . $chamado_dados[4]] = $texto_hd;
		
		//verifica se há falta de texto
		if($titulo != '' || $categoria != '' || $descricao != ''){
			//abrindo o arquivo
			$arquivo = fopen('dados.hd', 'a');
			if(isset($texto_completo) == true){
				$linhas_texto_vpc = file_get_contents('valida_primeiro_comentario.hd');
				if($linhas_texto_vpc != 'foi_comentado' && $linhas_texto_vpc != 'foi_comentado_2'){
					//escrevendo o texto
					$linhas = file("dados.hd");
					$linhas[0] = $texto_completo . PHP_EOL;
					$arquivo = fopen('dados.hd', 'w');
					foreach($linhas as $conteudo){
						fwrite($arquivo, $conteudo);
					}
					fclose($arquivo);
					$arquivo_hd = fopen('dados_hd.hd', 'a');
					$linhas_hd = file("dados_hd.hd");
					$linhas_hd[0] = $texto_hd . PHP_EOL;
					$arquivo_hd = fopen('dados_hd.hd', 'w');
					foreach($linhas_hd as $conteudo){
						fwrite($arquivo_hd, $conteudo);
					}
					fclose($arquivo_hd);
				}else{
					//escrevendo o texto
					$linhas = file("dados.hd");
					$linhas[0] = PHP_EOL . $texto_completo . PHP_EOL . $linhas[0];
					$arquivo = fopen('dados.hd', 'w');
					foreach($linhas as $conteudo){
						fwrite($arquivo, $conteudo);
					}
					fclose($arquivo);
					$arquivo = fopen('dados.hd', 'a');
					$linhas = file("dados.hd");
					$linhas[0] = '';
					$arquivo = fopen('dados.hd', 'w');
					foreach($linhas as $conteudo){
						fwrite($arquivo, $conteudo);
					}
					fclose($arquivo);
					$arquivo_hd = fopen('dados_hd.hd', 'a');
					$linhas_hd = file("dados_hd.hd");
					$linhas_hd[0] = PHP_EOL . $texto_hd . PHP_EOL . $linhas_hd[0];
					$arquivo_hd = fopen('dados_hd.hd', 'w');
					foreach($linhas_hd as $conteudo){
						fwrite($arquivo_hd, $conteudo);
					}
					fclose($arquivo_hd);
					$arquivo_hd = fopen('dados_hd.hd', 'a');
					$linhas_hd = file("dados_hd.hd");
					$linhas_hd[0] = '';
					$arquivo_hd = fopen('dados_hd.hd', 'w');
					foreach($linhas_hd as $conteudo){
						fwrite($arquivo_hd, $conteudo);
					}
				}
				$texto_completo = false;
			}

			//arquivo valida_primeiro_comentario
			$arquivo_vpc = fopen('valida_primeiro_comentario.hd', 'a');
			$linhas_vpc = file("valida_primeiro_comentario.hd");
			$linhas_texto_vpc = file_get_contents('valida_primeiro_comentario.hd');
			if($linhas_texto_vpc === 'nao_foi_comentado'){
				unset($linhas_vpc[1]);
				$arquivo_vpc = fopen("valida_primeiro_comentario.hd", "w");
				$linhas_vpc = file("valida_primeiro_comentario.hd");
				fwrite($arquivo_vpc, 'foi_comentado');
				fclose($arquivo_vpc);
			}

			if($email != '' && $_SESSION["id"] === ''){
				//abrindo o arquivo
				$linhas = file('dados.hd');
				$linhas_max = count($linhas)-1;
				$arquivo_login = fopen('../index.php', 'a');
				fclose($arquivo_login);
				$linhas_login = file('../index.php');
					$linhas_login[12+$num+$linhas_max] = "		array('id' => '$email')," . PHP_EOL . PHP_EOL;
					$arquivo_login = fopen('../index.php', 'w');
					foreach($linhas_login as $conteudo){
						fwrite($arquivo_login, $conteudo);
					}
				fclose($arquivo_login);
			}

			//echo $texto;
			if($adm == true){
				header('Location: ../index.adm.php?reload=true');
				//abrindo o arquivo
				$arquivo_reca = fopen('recarregar_validador.hd', 'a');
				$linhas_file_reca = file("recarregar_validador.hd");
				unset($linhas_file_reca[1]);
				$arquivo_reca = fopen("recarregar_validador.hd", "w");
				$linhas_file_reca = file("recarregar_validador.hd");
				fwrite($arquivo_reca, 'adm');
				fclose($arquivo_reca);
			}else if($no_adm == true){
				header('Location: ../index.php?reload=true');
			}
		}
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
