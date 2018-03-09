<?php
include(__DIR__."/../controllers/struct/verificador.php");
include(__DIR__."/../controllers/class/controladorDeErros.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSULTA</title>

</head>
<body>

  <?php include("./layout/menu.php"); ?>

  <form action="./resultadoConsulta.php" method="POST" accept-charset="utf-8">
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
              <input class="form-control" type="date" placeholder="EX. 15/05/2017" id="data_registro" name= "data_registro">
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
              <input class="form-control" type="date" placeholder="EX. 15/05/2017" id="nascimento" name="nascimento">
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
          <hr>

          <footer>
            <p> Coletivo EIDI </p>
            <p>2017</p>
          </footer>
        </body>
        </html>