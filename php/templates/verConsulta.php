<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Mais - Consulta </title>
    <link rel="shortcut icon" href="logo_conselho.png" type="image/x-png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">



  </head>
  <body>
 
 <?php include("./php/layout/menu.php"); ?>

<br>
<br>
  <div class="row">
  <div class="col col-md-2"> </div>
  <div class="col-6 col-md-8"><p><font size="4" face="Times">Na aba Consulta, o conselheiro que precisar fazer uma busca de ocorrência ou procurar se algum menor já se encontra cadastrado, basta digitar os campos Número de Registro, Data de Registro, nome da Criança/Adolescente e a data de Nascimento. </font></p>
    

    <p><font size="4" face="Times">O que será exibido se for preenchido apenas um dos campos abaixo? </font></p>
    <br>
  <ul>
  <li><font size="4" face="Times"><b>Número de Registro:</b> Campo a ser preenchido somente por números. Se o numero de registro digitado estiver presente no banco de dados, aparecerá os dados pertencentes a esse registro. Se não existir registro com o número digitado aparecerá a mensagem "Registro NÃO cadastrado". </font> </li>
  <br>
  <li><font size="4" face="Times"><b>Data de Registro:</b> Campo a ser preenchido com a possivel data da ocorrencia. Se o conselheiro quiser procurar por ocorrencias em determinadas datas é só preencher esse campo e clicar em procurar que aparecerá uma lista com todas. </font></li>
  <br>
  <li><font size="4" face="Times"><b>Nome da Criança/Adolescente:</b> Campo a ser preenchido somente por letras. Destinado para se procurar apenas atendimentos efetuados com determinado nome. Quando a busca for feita aparecerá somente as denuncias realizadas daquele determinado usuário. </font></li>
  <br>
  <li><font size="4" face="Times"><b>Data de Nascimento:</b> Campo a ser preenchido somente por números ( Ex.15/05/2015). Depois de feita a consulta aparecerá na tela uma lista de atendimentos realizados em determinado dia.</font></li>
</ul> 
  <p> <font size="4" face="Times">Lembrando que todos os campos não são obrigatórios, mas quanto maior o número de campos preenchidos maior a precisão da busca.</font></p>
    <br>

   </div>
  <div class="col-6 col-md-2"></div>
  </div>

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </form>
  </body>
</html>