<?php
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  include("./php/controllers/struct/verificador.php");


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONSELHO TUTELAR - REGIÃO II</title>
    <link rel="shortcut icon" href="logo_conselho.png" type="image/x-png">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/jumbotron.css" rel="stylesheet">
    <link href="../assets/css/carousel.css" rel="stylesheet">

  </head>
  <body>
 
  <div class="jumbotron">
    <div class="container">
  <ul class="nav nav-tabs">
    <li><a href="/">Home</a></li>
      <li><a href="/php/templates/atendimento.php">Atendimento</a></li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ocorrência<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="/php/templates/concluidas.php">Concluídas</a></li>
        <li><a href="/php/templates/consulta.php">Consultar</a></li>
        <li><a href="/php/templates/pendencias.php">Pendentes</a></li>                    
      </ul>
    </li>
      <li><a href="/php/templates/relatorio.php">Relatórios</a></li>
      <li><a href="./php/controllers/struct/sair.php">sair</a></li>  
    </ul>
        <h1>Conselho Tutelar - Região II</h1>
    </div>

    </div>
        <div class="container">
        <div class="col-sm-10">
        <h1 class="display-3"> Bem vindo!</h1>
        <p><font size="5" face="Times">Este sistema tem o intuito de facilitar o cadastro de possíveis ocorrências atendidas pelo Conselho Tutelar de Arapiraca e assim gerar o diagnóstico tanto quantitativo quanto qualitativo para o mesmo.</p>
        </div>
       <div class="col-sm-2">
        <img src="../assets/img/logo_conselho.png"  width="270" height="172" />
      </div>

    </div>
  </div>
  <br>
  <br>
  <br>
<div class="container">
      
      <div class="row">
        <div class="col-md-4">
          <h2>Atendimento</h2>
          <p>Nesta seção o Conselheiro poderá cadastrar a ocorrência solicitada. </p>
          <p><a class="btn btn-secondary" href="php/VerMaisAtendimento.php" role="button">Ver Mais &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Consulta</h2>
          <p>Nesta seção o Conselheiro poderá consultar qualquer ocorrência cadastrada no sistema.</p>
          <p><a class="btn btn-secondary" href="verConsulta.html" role="button">Ver Mais &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Relatórios</h2>
          <p>Nesta seção será possível gerar relatórios dos dados cadastrados no sistema.</p>
          <p><a class="btn btn-secondary" href="php/VerMaisRelatorio.php" role="button">Ver Mais &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p> Coletivo EIDI </p>
        <p>2017</p>
      </footer>
    </div> <!-- /container -->
</body>
</html>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/jquery.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>