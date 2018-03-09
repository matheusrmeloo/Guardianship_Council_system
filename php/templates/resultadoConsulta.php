<?php
  include(__DIR__."/../controllers/struct/verificador.php");
?>
<?php

$conexao_banco = Conexao::conn();

$reg = $_POST["registro"];
$data = $_POST["data_registro"];
// var_dump($_POST["data_registro"]);
$nome = $_POST["nome"];
$nascimento = $_POST["nascimento"];
$m = $_POST["mae"];
$p = $_POST["pai"];

$resultadoConsultaElthon = "";
$temValor = false;


if ($reg!="") {
   $resultadoConsultaElthon = "r.idregistro= '$reg'";
   $temValor = true;
 }
if ($data!="") {
  
  if ($temValor){

    $resultadoConsultaElthon = $resultadoConsultaElthon . " AND r.data_ocorrencia ='$data'";
  } else {
    $resultadoConsultaElthon = $resultadoConsultaElthon . "r.data_ocorrencia ='$data'";
  }
  $temValor = true;
 }
if ($nome!="") {
  if ($temValor){
    $resultadoConsultaElthon = $resultadoConsultaElthon . " AND c.nome ='$nome'";
  } else {
    $resultadoConsultaElthon = $resultadoConsultaElthon . "c.nome ='$nome'";
  }
  $temValor = true;
 }
if ($nascimento!="") {
  if ($temValor){
    $resultadoConsultaElthon = $resultadoConsultaElthon . " AND c.nascimento = '$nascimento'";
  } else {
    $resultadoConsultaElthon = $resultadoConsultaElthon . "c.nascimento = '$nascimento'";
  }
  $temValor = true;
 }
if ($m!="") {
  if ($temValor){
    $resultadoConsultaElthon = $resultadoConsultaElthon . " AND re.mae='$m'";
  } else {
    $resultadoConsultaElthon = $resultadoConsultaElthon . "re.mae='$m'";
  }
  $temValor = true;
 }
if ($p!="") {
  if ($temValor){
    $resultadoConsultaElthon = $resultadoConsultaElthon . " AND re.pai ='$p'";
  } else {
    $resultadoConsultaElthon = $resultadoConsultaElthon . "re.pai ='$p'";
  }
 }
  
// var_dump($resultadoConsultaElthon);
// echo($resultadoConsultaElthon);

$consulta = "SELECT r.idregistro, r.data_ocorrencia, c.nome, c.nascimento, re.pai, re.mae, r.idregistro FROM registro r,crianca c, responsavel re WHERE " . $resultadoConsultaElthon . " and c.idcrianca = r.crianca_idcrianca and re.crianca_idcrianca = c.idcrianca";


 $con = $conexao_banco->query($consulta);

 // var_dump($con);

?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RESULTADO DA CONSULTA</title>
  <link rel="shortcut icon" href="../logo_conselho.png" type="image/x-png">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/jumbotron.css" rel="stylesheet">
  <link href="../css/carousel.css" rel="stylesheet">

</head>
<body>

  <?php include("./layout/menu.php"); ?>

  <div class="container"> 
    <fieldset>
    <?php
     if($con->num_rows==0){
          echo '<div class="alert alert-danger">
            <strong>Opps!</strong> Nenhum registro encontrado
          </div>';
        }
        ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Registro</th>
            <th>Data Registro</th>
            <th>Nome da Criança</th>
            <th>Data de Nascimento</th>
            <th>Nome da Mãe</th>
            <th>Nome do Pai</th>
            <th>Ações</th>
          </tr>
        </thead>
        <?php
    
        if($con->num_rows==0){
          echo '<div class="alert alert-danger">
            <strong>Opps!</strong> Nenhum registro encontrado
          </div>';
        }

        while ($dado = $con -> fetch_array()){  
          ?>   
          <tbody>
            <tr>
              <td> <?php echo $dado ["idregistro"];?></td>
              <td> <?php echo date( "d/m/Y", strtotime($dado  ["data_ocorrencia"]));?></td>
              <td> <?php echo $dado ["nome"];?> </td>
              <td> <?php echo date("d/m/Y", strtotime ($dado ["nascimento"]));?> </td>
              <td> <?php echo $dado ["mae"];?> </td>
              <td> <?php echo $dado ["pai"];?> </td>
              <td>
               <a href="edita-atendimento.php?id=<?php echo $dado['idregistro']; ?>" >Editar</a>
              </td>
            </tr>
            <?php
          }


          ?>

        </tbody>
      </table>
   
  </button>
</CENTER> </br>
</fieldset> 
<footer>
  <p> Coletivo EIDI </p>
  <p>2017</p>
</footer>


</body>
</html>