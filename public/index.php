
<?
    //abrindo o arquivo
	  $linhas_file_reca = file_get_contents("adm_validador.hd");
    if($linhas_file_reca === 'no_adm'){
      echo 'ue';
      header('Location: ../index.php');
    }
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Rosana Monteiro | ADM</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <!-- Fontawesome CSS -->
      <script src="https://kit.fontawesome.com/ed736b9c69.js" crossorigin="anonymous"></script>

      <!--Favicon-->
      <link rel="icon" href="img/icon.png" />
    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <i class="fas fa-user-shield"></i>
        Rosana Monteiro | ADM
      </a>

      <a type="button" class="btn btn-outline-light" href="../index.php">Página inicial</a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              <i class="fas fa-user-shield"></i>
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input required name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input required name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <? if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?>

                  <div class="text-danger">
                    Usuário ou senha inválido(s)
                  </div>

                <? } ?>

                <? if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>

                  <div class="text-danger">
                    Faça login antes de acessar as páginas protegidas
                  </div>
                  
                <? } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>