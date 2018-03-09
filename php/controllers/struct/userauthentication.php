<?php 
  session_start();
  $usuariot = $_POST['usuario'];
  $senhat   = $_POST['senha'];
  include("../class/conexao.php");
  $result = Conexao::conn()->query("SELECT * FROM conselheiro WHERE usuario='$usuariot' AND senha='$senhat' LIMIT 1");
  if($result->num_rows==0){  
    echo "Erro no login";
    $_SESSION['erro']     ="erroLogin";
?>

  <script>
    location.href="../../templates/login.php";
  </script>

<?php
  }else{
    while($row=mysqli_fetch_row($result)){
      $_SESSION['usuario']=$row[2];
      $_SESSION['nome']   =$row[1];
      $_SESSION['id']     =$row[0]; 
    } 
    header("Location:../../../"); 
  }
?>