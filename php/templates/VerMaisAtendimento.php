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
  <div class="col-6 col-md-8"><p><font size="4" face="Times">Na aba 'Atendimento', o conselheiro irá cadastrar a ocorrência na ficha de atendimento eletrônica para assim futuramente poder consultar a mesma por meio dos campos preenchidos.  </font></p>
    

    <p><font size="4" face="Times">O que será exibido se for preenchido apenas um dos campos abaixo? </font></p>
    <br>
  <ul>
  <li><font size="4" face="Times"><b>Número de Registro:</b> Campo a ser preenchido somente por números. Se o numero de registro digitado estiver presente no banco de dados, aparecerá os dados pertencentes a esse registro. Se não existir registro com o número digitado aparecerá a mensagem "Registro NÃO cadastrado". (Campo Obrigatório) </font> </li>
  <br>
  
  <li><font size="4" face="Times"><b>Data de Registro:</b> Campo a ser preenchido com a possivel data da ocorrencia. Se o conselheiro quiser procurar por ocorrencias em determinadas datas é só preencher esse campo e clicar em procurar que aparecerá uma lista com todas. (Campo Obrigatório) </font></li>
  <br>
  
  <li><font size="4" face="Times"><b>Nome da Criança/Adolescente:</b> Campo a ser preenchido somente por letras. Destinado para se procurar apenas atendimentos efetuados com determinado nome. Quando a busca for feita aparecerá somente as denuncias realizadas daquele determinado usuário. (Campo NÃO Obrigatório)</font></li>
  <br>
 
  <li><font size="4" face="Times"><b>Data de Nascimento:</b> Campo a ser preenchido somente por números ( Ex.15/05/2015). Depois de feita a consulta aparecerá na tela uma lista de atendimentos realizados em determinado dia. (Campo NÃO Obrigatório)</font></li>
  <br>
  
  <li><font size="4" face="Times"><b>Sexo:</b> Campo a ser selecionado. Destinado a inserceção do sexo da criança cadastrada. (Campo NÃO Obrigatório)</font></li>
  <br>

<li><font size="4" face="Times"><b>Pai/ Mãe/ Outros:</b> Campo a ser preenchido com caracteres. Estes são destinados a inserceção dos nomes do pai, da mãe e/ou de outro responsável pela criança. (Campo NÃO Obrigatório)</font></li>
  <br>

<li><font size="4" face="Times"><b>Rua/ Número/ Ponto de Referência/ Bairro :</b> Os Campos 'Rua' e 'Ponto de Referência' são preenchidos com caracteres, por sua vez o campo 'Número' é somente preenchido por números e o campo 'Bairro' é selecionável. Destinado a inserceção do endereço do responsável. (Campo NÃO Obrigatório)</font></li>
  <br>

<li><font size="4" face="Times"><b>Endereço Alternativo/ Telefone:</b> Campos a serem preenchidos com caracteres e números respectivamente. Destinado a inserceção de um endereço alternativo caso exista e também do número de telefone do responsável. (Campo NÃO Obrigatório)</font></li>
  <br>

<li><font size="4" face="Times"><b>Tipo de violência/ Outro Tipo de Violência:</b> Campos a serem selecionado e preenchido com caracteres respectivamente. Destinado a inserceção dos dados da violência registrada, caso a violência não esteja na lista o conselheiro poderá inserir no campo 'Outro Tipo de Violência' uma nova violência. (Campo NÃO Obrigatório)</font></li>
  <br>

  <li><font size="4" face="Times"><b>Suposto Agressor/ Observações da Violência:</b> Campos a serem selecionados e preenchidos com caracteres respectivamente. Destinados a inserceção do susposto agressor que cometeu a violência e um campo para se fazer observações caso necessário. (Campo NÃO Obrigatório)</font></li>
  <br>

<li><font size="4" face="Times"><b>Disk 100/ Procedência:</b> Ambos os campos a serem selecionados. Tem como objetivo informar se o caaso foi denunciado pelo disk 100 ou não e também relatar se a denúncia é procedente ou não. (Campo NÃO Obrigatório)</font></li>
  <br>

<li><font size="4" face="Times"><b>Medida Aplicada/ Observações:</b> Campos a serem selecionados e preenchidos com caracteres respectivamente. Destinados a inserceção das Medidas Aplicadas a violência e fazer observações caso necessário. (Campo NÃO Obrigatório)</font></li>
  <br>

<li><font size="4" face="Times"><b>Crianças/Adolescentes que infrigiram seus próprios direitos:</b> Campo a ser selecionado. Destinado a inserceção dos dados de crianças e/ou adolescentes que infrigiram seus próprios direitos. (Campo NÃO Obrigatório)</font></li>
  <br>

<li><font size="4" face="Times"><b>Alguma Pendência:</b> Campo a ser selecionado. Tem como objetivo demonstrar se a ocorrência está pendente ou não. (Campo Obrigatório)</font></li>
  <br>

</ul> 

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