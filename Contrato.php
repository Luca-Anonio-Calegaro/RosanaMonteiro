<? 
  require_once "public/validador_acesso.php";
?>
<?
    ini_set('display_errors', 0 );
    error_reporting(0);
?>
<?$arquivo_texto_contrato = file_get_contents("public/contrato.hd", "a");?>
<?if($arquivo_texto_contrato != '') {?>
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
                <div class="container mt-4 bg-light p-5">

                <br><br>
            </div>
        </body>
    </html>
<? } ?>