<?php
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
include("./verificador.php");
include("../class/controladorDeErros.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSULTA</title>
  <link rel="shortcut icon" href="../logo_conselho.png" type="image/x-png">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/jumbotron.css" rel="stylesheet">
  <link href="../css/carousel.css" rel="stylesheet">

</head>
<body>
  <?php include("./layout/menu.php"); ?>
  <form action="resultadoConsulta.php" method="POST" accept-charset="utf-8">
    <div class="container">  
      <fieldset> 
        <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> CONSULTA </FONT></b> </legend> <br> 
        <div class="container">
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Registro Nº:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX. 1234" id="registro" name="registro">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label">Data do Registro:</label>
            <div class="col-10">
              <input class="form-control" type="search" placeholder="EX. 15/05/2017" id="data_registro" name= "data_registro">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Nome da Criança/Adolescente:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="Maria Aparecida" id="nome" name="nome">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label">Data de Nascimento:</label>
            <div class="col-10">
              <input class="form-control" type="search" placeholder="EX. 15/05/2017" id="nascimento" name="nascimento">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Nome da Mãe:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="Maria dos Santos" id="mae" name="mae">
            </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Nome do Pai:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="José da Silva" id="pai" name="pai">
            </div>
          </div>
          <br>
          <br>
          <center>
                <button type="submit" class="btn btn-default btn-lg" value="Salvar" name="salvar"> PROCURAR
                  <span class="glyphicon glyphicon-ok"></span>
                </button>
              </center>

              <BR>


          <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

          <hr>

          <footer>
            <p> Coletivo EIDI </p>
            <p>2017</p>
          </footer>
        </body>
        </html>