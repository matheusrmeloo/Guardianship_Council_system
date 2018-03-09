<?php
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
include("./verificador.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ver Mais - Consulta </title>
  <link rel="shortcut icon" href="logo_conselho.png" type="image/x-png">

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/jumbotron.css" rel="stylesheet">



</head>
<body>
  <?php include("./layout/menu.php"); ?>

  <br>
  <br>
  <div class="row">
    <div class="col col-md-2"> </div>
    <div class="col-6 col-md-8"><p><font size="4" face="Times">Na aba 'Relatórios', o conseheiro poderá solicitar ao sistema PDFs que apresentam a contagem de ocorrências feitas durante o mês solicitado. Neste PDF irá conter campos como o número de violências cometidas durante o mês solicitado, assim como quais medidas foram aplicadas e qunatas vezes a mesma foi aplicada, entre outros campos mais. </font></p>

      <hr>

      <footer>
        <p> Coletivo EIDI </p>
        <p>2017</p>
      </footer>

    </div>
    <div class="col-6 col-md-2"></div>
  </div>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</form>
</body>
</html>