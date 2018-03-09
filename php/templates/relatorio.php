<?php
include(__DIR__."/../controllers/struct/verificador.php");
?>
<?php


?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> RELATÓRIO</title>
</head>
<body>

  <?php include("./layout/menu.php"); ?>

  <div class="container"> 
    <fieldset>
            <center><h3> Relatorio</h3></center>
            <br>
      
    </br> 
    </br> 
    <center>
    <form action="../controllers/struct/relatoriopdf1.php" method="get">
      <select name="ano" multiple>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
      </select>

        <br/>
        <br/>
        <button type="submit" class="btn btn-default btn-lg" value="imprimir"> 
          Relatorio
          <span class="glyphicon glyphicon-ok"></span>
        </button>
    </form>
    </center> 
    </br>
</fieldset> 
<footer>
  <p> Coletivo EIDI </p>
  <p>2017</p>
</footer>

</body>
</html>