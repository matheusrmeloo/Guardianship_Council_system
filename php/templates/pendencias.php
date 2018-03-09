<?php
  include(__DIR__."/../controllers/struct/verificador.php");
?>


<?php

$conexao_banco = Conexao::conn();

$consulta = "SELECT r.idregistro,r.data_ocorrencia, c.nome, c.nascimento, r.pendencia,r.idregistro FROM registro r,crianca c WHERE c.idcrianca = r.crianca_idcrianca AND r.pendencia != 'Concluida'
";

$con = $conexao_banco->query($consulta);
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LISTA DE PENDENTES</title>
  </head>
  <body>
  
  <?php include("./layout/menu.php"); ?>

  <div class="container"> 
        <fieldset>
          <center><h3> Lista de Atendimentos Pendentes</h3></center>
          <br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Registro</th>
      <th>Data Registro</th>
      <th>Nome da Criança</th>
      <th>Data de Nascimento</th>
      <th>Status</th> 
      <th>Ações</th>
    </tr>
  </thead>
  <?php 
    while ($dado = $con -> fetch_array()){  
  ?>   
  <tbody>
    <tr>
      <td> <?php echo $dado ["idregistro"];?></td>
      <td> <?php echo date( "d/m/Y", strtotime($dado  ["data_ocorrencia"]));?></td>
      <td> <?php echo $dado ["nome"];?> </td>
      <td> <?php echo date("d/m/Y", strtotime ($dado ["nascimento"]));?> </td>
      <td> <?php echo $dado ["pendencia"];?></td>
      <td>
        <a href="edita-atendimento.php?id=<?php echo $dado['idregistro']; ?>" >Editar</a>
      </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
</br> </br> <CENTER><a href="../controllers/struct/pendentesPdf.php" type="submit" class="btn btn-default btn-lg" value="imprimir"> Imprimir Resultado
      <span class="glyphicon glyphicon-hourglass"></span>
    </a> 
</CENTER> </br>
          
        </fieldset> 
    <div/>
      <hr>

      <footer>
        <p> Coletivo EIDI </p>
        <p>2017</p>
      </footer>
</body>
</html>
