<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="Página para realizar login">
  <meta name="author" content="Matheus Rodrigues e Monaly Vital">
  <link rel="shortcut icon" href="../../assets/img/logo_conselho.png" type="image/x-png">

  <title>Login</title>

  <!-- Bootstrap core CSS -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../assets/css/signin.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/../../assets/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <div class="container">


        <form class="form-signin" method="POST" action="../controllers/struct/userauthentication.php"><br/>
          <h2 class="form-signin-heading text-center">Sistema Conselho Tutelar</h2><br/>

          <?php  
          
          if(isset($_SESSION['erro'])){
            if( $_SESSION['erro'] =="erroLogin"){
              echo "
              <div class='alert alert-danger'>
                <strong>Erro!</strong> Erro de Login.
              </div>";
            }
            $_SESSION['erro']=null;

          }

          ?>

          <label for="inputEmail" class="sr-only">Usuario</label>
          <input type="text" name="usuario" class="form-control" placeholder="Usuário" required autofocus>

          <label for="inputPassword" class="sr-only">Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Senha" required><br/>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>

      </div> <!-- /container -->


      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>