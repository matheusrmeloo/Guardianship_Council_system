<?php
include(__DIR__."/../controllers/struct/verificador.php");

$conexao_banco = Conexao::conn();

$consulta = "
  SELECT *
  FROM registro
  WHERE registro.idregistro = 
".$_GET['id'];

$buscaRegistro = $conexao_banco->query($consulta)->fetch_assoc();
$id_registro=$buscaRegistro["idregistro"];
$id_crianca=$buscaRegistro["crianca_idcrianca"];

$_SESSION["id_registro"]=$id_registro;

$consulta = "
  SELECT *
  FROM disk_100
  WHERE disk_100.registro_idregistro = 
  ".$id_registro;

$buscaDisk100 = $conexao_banco->query($consulta);

if($buscaDisk100 !=false){
  $buscaDisk100 = $buscaDisk100->fetch_assoc();
}
$_SESSION["id_disk_100"]=$buscaDisk100["id_disk_100"];


$consulta = "
  SELECT *
  FROM procedencia
  WHERE procedencia.registro_idregistro = 
  ".$id_registro;

$buscaProcedencia = $conexao_banco->query($consulta);

if($buscaProcedencia !=false){
  $buscaProcedencia = $buscaProcedencia->fetch_assoc();
}
$_SESSION["id_procedencia"]=$buscaProcedencia["idprocedencia"];



$consulta = "
  SELECT *
  FROM crianca
  WHERE crianca.idcrianca = 
  ".$id_crianca;
$_SESSION["id_crianca"]=$id_crianca;

$buscaCriancas = $conexao_banco->query($consulta);

if($buscaCriancas !=false){
  $buscaCriancas = $buscaCriancas->fetch_assoc();
}


$consulta = "
  SELECT *
  FROM responsavel
  WHERE responsavel.crianca_idcrianca = 
  ".$id_crianca;

$buscaResponsavel = $conexao_banco->query($consulta);

if($buscaResponsavel !=false){
  $buscaResponsavel = $buscaResponsavel->fetch_assoc();
}

$_SESSION["id_responsavel"]=$buscaResponsavel["idresponsavel"];


$consulta = "
  SELECT *
  FROM violencia
  WHERE violencia.crianca_idcrianca = 
  ".$id_crianca;

$buscaViolencia = $conexao_banco->query($consulta);

if($buscaViolencia !=false){
  $buscaViolencia = $buscaViolencia->fetch_all();
  $_SESSION["tipoViolencia"]=$buscaViolencia;
}


$arrayIdViolencia=[];
foreach ($buscaViolencia as $key=>$value){
  $arrayIdViolencia[$value[2]] =$value[0];   
}




$_SESSION["id_violencia"]=$arrayIdViolencia;


$consulta = "
  SELECT *
  FROM agressor
  WHERE agressor.crianca_idcrianca = 
  ".$id_crianca;

$buscaAgressor = $conexao_banco->query($consulta);

if($buscaAgressor !=false){
  $buscaAgressor = $buscaAgressor->fetch_all();
  $_SESSION["supostoAgressor"]=$buscaAgressor;
}

addIDSession($buscaAgressor,2,"id_agressor");


$consulta = "
  SELECT *
  FROM medidas
  WHERE medidas.crianca_idcrianca = 
  ".$id_crianca;

$buscaMedidas = $conexao_banco->query($consulta);

if($buscaMedidas !=false){
  $buscaMedidas = $buscaMedidas->fetch_all();
  $_SESSION["medidas"]=$buscaMedidas;
}
addIDSession($buscaMedidas,2,"id_medidas");


$consulta = "
  SELECT *
  FROM ipd
  WHERE ipd.crianca_idcrianca = 
  ".$id_crianca;

$buscaIpd = $conexao_banco->query($consulta);

if($buscaIpd !=false){
  $buscaIpd = $buscaIpd->fetch_all();
  $_SESSION["ipd"]=$buscaIpd;
}
addIDSession($buscaIpd,2,"id_ipd");


function buscaCkeck($busca,$tipo){
  foreach ($busca as $key=>$value){
   // var_dump($value[2]);
    
    if($value[2]==$tipo){
      return "checked";
      break;  
    }
  }
  return "";
}


function addIDSession($lista,$i,$sessao){

  $array=[];
  foreach ($lista as $key=>$value){
    $array[$value[$i]] =$value[0];   
  }

  $_SESSION[$sessao]=$array;

}


// var_dump($buscaAgressor);



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ATENDIMENTO</title>
  <link rel="shortcut icon" href="logo_conselho.png" type="image/x-png">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/jumbotron.css" rel="stylesheet">
  <link href="../css/carousel.css" rel="stylesheet">
</head>
<body>

    <?php include("./layout/menu.php"); ?>


    <div class="container"> 
      <fieldset> 
        <form action="../controllers/struct/editar.php" method="POST" accept-charset="utf-8">
          <legend><b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> FICHA DE ATENDIMENTO </FONT></b> </legend> <br> 
          <div class="container">
            <div class="form-group row">

              <div class="col-xs-3">
                <label for="ex2">Registro Nº:</label>
                <input class="form-control"  type= "text" placeholder="123456" name="registro" id="registro" value="<?php echo $buscaRegistro["ocorrencia"]; ?>">
              </div>
              <div class="col-xs-3">
                <label for="ex3">Data do Atendimento:</label>
                <input class="form-control" type="date" placeholder ="15/05/2017" name="data_ocorrencia" id="data" value="<?php echo $buscaRegistro["data_ocorrencia"]; ?>">
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset> 
          <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> DADOS DA CRIANÇA/ADOLESCENTE: </FONT></b> </legend> <br>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label"> Nome:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX.João da Silva" name="nome" id="nome" value="<?php echo $buscaCriancas['nome']; ?>">
            </div>
          </div>
          <div class="container">
            <div class="form-group row">

              <div class="col-xs-3">
                <label for="ex2">Data de Nascimento:</label>
                <input class="form-control"  type="date" id="nascimento" placeholder="EX.15/05/2017" name="nascimento" value="<?php echo $buscaCriancas['nascimento']; ?>">
              </div>
              <div class="col-xs-3">
                <label for="ex3">Sexo:</label>
                <div class="radio">
                  <label><input type="radio" name="sexo" value="feminino" <?php echo $buscaCriancas['sexo']=="feminino" ? "checked" : "" ; ?> >Feminino</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="sexo" value="masculino" <?php echo $buscaCriancas['sexo']=="masculino" ? "checked" : "" ; ?> >Masculino</label>
                </div>
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset> 
          <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> DADOS DOS RESPONSÁVEIS: </FONT></b> </legend> <br>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label"> Pai:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX. João da Silva"  name="pai" value="<?php echo $buscaResponsavel['pai']; ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label"> Mãe:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX. Maria dos Santos"  name="mae" value="<?php echo $buscaResponsavel['mae']; ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label"> Outros:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX. José de Oliveira"  name="outros_responsaveis" value="<?php echo $buscaResponsavel['outro_responsavel']; ?>">
            </div>
          </div>
          <label for="example-search-input" class="col-2 col-form-label"> Endereço:</label>

          <div class="container">
            <div class="form-group row">

              <div class="col-xs-6">
                <label for="ex2"> Rua:</label>
                <input class="form-control"  type= "text" placeholder=" Rua Nossa Senhora" name="rua" id="rua" value="<?php echo $buscaResponsavel['rua']; ?>">
              </div> 
              <div class="col-xs-1">
                <label for="ex3"> Número:</label>
                <input class="form-control" type="text" placeholder ="527" name="numero" id="numero" value="<?php echo $buscaResponsavel['numero']; ?>">
              </div>
            </div>
          </div>

          <div class="container">
            <div class="form-group row">

              <div class="col-xs-6">
                <label for="ex2"> Ponto de Referência:</label>
                <input class="form-control"  type= "text" placeholder=" Rua Nossa Senhora" name="referencia" id="referencia" value="<?php echo $buscaResponsavel['referencia']; ?>">
              </div>
              <div class="col-xs-4">
                <label for="ex3"> Bairro:</label>
                <select class="form-control"  name="bairro" id="bairro" value="<?php echo $buscaResponsavel['bairro']; ?>">
                  <option value="-----">-----</option>
                  <option value="Alazao" selected>Alazão</option>
                  <option value="Alto do Cruzeiro">Alto do Cruzeiro</option>
                  <option value="Baixa da Hora">Baixa da Hora</option>
                  <option value="Baixa da Onça">Baixa da Onça</option>
                  <option value="Baixa do Capim">Baixa do Capim</option>
                  <option value="Bálsamo">Bálsamo</option>                   
                  <option value="Bananeira">Bananeiras</option>                    
                  <option value="Barro Vermelho">Barro Vermelho</option>                    
                  <option value="Batingas">Batingas</option>                    
                  <option value="Boa Vista">Boa Vista</option>                    
                  <option value="Bom Jardim">Bom Jardim</option>
                  <option value="Brasilia">Brasília</option>
                  <option value="Caititus">Caititus</option>
                  <option value="Cajarana">Cajarana</option>
                  <option value="Canafistula">Canafístula</o0ption>
                    <option value="Caititus">Cangandú</option>
                    <option value="Capiata">Capiatã</option>
                    <option value="Centro">Centro</option>
                    <option value="Flexeiras">Flexeiras</option>
                    <option value="Genipapo">Genipapo</option>
                    <option value="Gruta">Gruta D'Água</option>
                    <option value="Guaribas">Guaribas</option>
                    <option value="Ingazeira">Ingazeira</option>
                    <option value="Itapoa">Itapoã</option>
                    <option value="Jardim de Maria">Jardim de Maria</option>
                    <option value="Jardim Tropical">Jardim Tropical</option>
                    <option value="Lagoa de São Pedro">Lagoa de São Pedro</option>
                    <option value="Lagoa do Mato">Lagoa do Mato</option>
                    <option value="Lagoa do Poção">Lagoa do Poção</option>
                    <option value="Laranjal">Laranjal</option>
                    <option value="Mangabeiras">Mangabeiras</option>
                    <option value="Mocó">Mocó</option>
                    <option value="Nova Esperanca">Nova Esperança</option>
                    <option value="Novo Horizonte">Novo Horizonte</option>
                    <option value="Oitizeiro">Oitizeiro</option>
                    <option value="Ouro Preto">Ouro Preto</option>
                    <option value="Pau D'Arco">Pau D'Arco</option>
                    <option value="Pé Leve Velho">Pé-Leve Velho</option>
                    <option value="Perucaba">Perucaba</option>
                    <option value="Piaui">Piauí</option>
                    <option value="Pimenteira">Pimenteira</option>
                    <option value="Poção">Poção</option>
                    <option value="Poco da Pedra">Poço da Pedra</option>
                    <option value="Poço de Baixo">Poço de Baixo</option>
                    <option value="Poço de Santana">Poço de Santana</option>
                    <option value="Quati">Quati</option>
                    <option value="Riacho Seco">Richo Seco</option>
                    <option value="Santa Edwiges">Santa Edwigens</option>
                    <option value="Santa Esmeralda">Santa Esmeralda</option>
                    <option value="São Luis">São Luis</option>
                    <option value="São Luis 2">São Luis II</option>
                    <option value="Sapucaia">Sapucaia</option>
                    <option value="Senador Arnon de Melo">Senador Arnon de Melo</option>
                    <option value="Senador Teotonio Vilela">Senador Teotonio Vilela</option>
                    <option value="Sitio das Furnas">Sitio das Furnas</option>
                    <option value="Taboquinha">Taboquinha</option>
                    <option value="Taquara">Taquara</option>
                    <option value="Terra Fria">Terra Fria</option>
                    <option value="Tingui">Tingui</option>
                    <option value="Varginha">Varginha</option>
                    <option value="Verdes Campos">Verdes Campos</option>
                    <option value="vila Aparecida">Vila Aparecida</option>
                    <option value="Xexeu">Xexeu</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label"> Endereço Alternativo:</label>
              <div class="col-4">
                <input class="form-control" type="text" placeholder="EX. Rua José de Oliveira"  name="outro_endereco" value="<?php echo $buscaResponsavel['outro_endereco']; ?>">
              </div>
            </div>
            <div class="container">
              <div class="form-group row">

                <div class="col-xs-4">
                  <label for="ex2"> Telefone:</label>
                  <input class="form-control"  type= "text" placeholder=" (82)98654-4532" name="telefone" id="telefone" value="<?php echo $buscaResponsavel['telefone']; ?>">
                </div>
              </div>
            </fieldset>

            <fieldset>
              <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> DADOS DA VIOLÊNCIA: </FONT></b> </legend> <br>

              <label for="example-search-input" class="col-2 col-form-label"> Tipo da Violência:</label>
              <div class="row">
                <div class="col-xs-4 col-md-3">
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Abandono de Incapaz" <?php echo buscaCkeck($buscaViolencia,"Abandono de Incapaz"); ?>> Abandono de Incapaz </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Abuso Sexual" <?php echo buscaCkeck($buscaViolencia,"Abuso Sexual"); ?>> Abuso Sexual</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Agressao Fisica" <?php echo buscaCkeck($buscaViolencia,"Agressao Fisica"); ?>> Agressão Física</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Agressao Psicologica" <?php echo buscaCkeck($buscaViolencia,"Agressao Psicologica"); ?>> Agressão Psicológica</INPUT><br>

                </div>

                <div class="col-xs-4 col-md-3">
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Agressao Verbal" <?php echo buscaCkeck($buscaViolencia,"Agressao Verbal"); ?>> Agressão Verbal</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Ameaca Morte" <?php echo buscaCkeck($buscaViolencia,"Ameaca Morte"); ?>>  Ameaça de Morte</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Bulling" <?php echo buscaCkeck($buscaViolencia,"Bulling"); ?>> Bulling</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Certidao de Nascimento" <?php echo buscaCkeck($buscaViolencia,"Certidao de Nascimento"); ?>> Certidão de Nascimento</INPUT><br>
                </div>
                <div class="col-xs-4 col-md-3">
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Desaparecido" <?php echo buscaCkeck($buscaViolencia,"Desaparecido"); ?>> Desaparecido </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Drogas" <?php echo buscaCkeck($buscaViolencia,"Drogas"); ?>> Drogas</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Educacao" <?php echo buscaCkeck($buscaViolencia,"Educacao"); ?>> Educação </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Guarda Compartilhada" <?php echo buscaCkeck($buscaViolencia,"Guarda Compartilhada"); ?>> Guarda Compartilhada</INPUT> <br>
                </div>
                <div class="col-xs-4 col-md-3">
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Maus Tratos" <?php echo buscaCkeck($buscaViolencia,"Maus Tratos"); ?>> Maus-Tratos </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Negligencia" <?php echo buscaCkeck($buscaViolencia,"Negligencia"); ?>> Negligência </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Pensão Alimenticia" <?php echo buscaCkeck($buscaViolencia,"Pensão Alimenticia"); ?>> Pensão Alimentícia</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Saúde" <?php echo buscaCkeck($buscaViolencia,"Saúde"); ?>> Saúde <br>
                    <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Trabalho Infantil" <?php echo buscaCkeck($buscaViolencia,"Trabalho Infantil"); ?>> Trabalho Infantil </INPUT><br>
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="example-text-input" class="col-2 col-form-label"> Outro Tipo de Violência:</label>
                  <div class="col-10">
                    <input class="form-control" type="text" placeholder="EX. Escreva aqui outro tipo de violência."  name="tipoViolencia[]">
                  </div>
                  <br>
                  <label for="example-search-input" class="col-2 col-form-label"> Suposto Agressor:</label>
                  <div class="row">
                    <div class="col-xs-6 col-md-4">
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="pai" <?php echo buscaCkeck($buscaAgressor,"pai"); ?>> Pai </INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Mãe" <?php echo buscaCkeck($buscaAgressor,"Mãe"); ?> > Mãe</INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Tio Paterno" <?php echo buscaCkeck($buscaAgressor,"Tio Paterno"); ?>> Tio Paterno </INPUT><br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Tia Paterna" <?php echo buscaCkeck($buscaAgressor,"Tia Paterna"); ?>> Tia Paterna </INPUT><br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Avô Paterna" <?php echo buscaCkeck($buscaAgressor,"Avô Paterna"); ?>> Avô Paterna</INPUT> <br>  
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Avó Paterna" <?php echo buscaCkeck($buscaAgressor,"Avó Paterna"); ?>> Avó Paterna </INPUT><br>
                    </div>
                    <div class="col-xs-6 col-md-4">
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Tio Materno" <?php echo buscaCkeck($buscaAgressor,"Tio Materno"); ?>> Tio Materno</INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Tia Materna" <?php echo buscaCkeck($buscaAgressor,"Tia Materna"); ?>> Tia Materna </INPUT><br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Avô Materno" <?php echo buscaCkeck($buscaAgressor,"Avô Materno"); ?>> Avô Materna</INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Avó Materna" <?php echo buscaCkeck($buscaAgressor,"Avó Materna"); ?>> Avó Materna </INPUT><br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Crianca" <?php echo buscaCkeck($buscaAgressor,"Crianca"); ?>> Própria Criança</INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Adolescente" <?php echo buscaCkeck($buscaAgressor,"Adolescente"); ?>> Próprio Adolescente </INPUT><br>
                    </div>
                    <div class="col-xs-6 col-md-4">
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Escola" <?php echo buscaCkeck($buscaAgressor,"Escola"); ?>> Escola </INPUT><br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Creche" <?php echo buscaCkeck($buscaAgressor,"Creche"); ?>> Creches</INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Educacao" <?php echo buscaCkeck($buscaAgressor,"Educacao"); ?>> Educação</INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Saude" <?php echo buscaCkeck($buscaAgressor,"Saude"); ?>> Saúde</INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Padrasto" <?php echo buscaCkeck($buscaAgressor,"Padrasto"); ?>> Padrasto/Madrasta </INPUT> <br>
                      <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Vizinho" <?php echo buscaCkeck($buscaAgressor,"Vizinho"); ?>> Vizinho </INPUT><br>
                    </div>
                  </div>
                </div>
              </INPUT>

              <br>
              <div class="form-group">
                <label for="comment"> Observações da Violência:</label>
                <textarea class="form-control" placeholder="Escreva aqui as observações da violência ocorrida." rows="3" name="observacoes" id="comment">  <?php echo $buscaAgressor[0][2]; ?> </textarea>
              </div>
              <br>
              <div class="container">
                <div class="form-group row">
                  <br>
                  <div class="col-xs-3">
                    <label for="ex2">Disk 100:</label>
                    <div class="radio">
                      <label><input type="radio" name="disk_100" value="SIM" <?php echo $buscaDisk100["disk_100_100"]=="SIM" ? "checked": ""; ?>>Sim</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="disk_100" value="NÃO" <?php echo $buscaDisk100["disk_100_100"]=="NÃO" ? "checked": ""; ?>>Não</label>
                    </div>
                    <br>
                    <div class="col-xs-3">
                      <label for="ex3">Procedência:</label>
                      <div class="radio">
                        <label><input type="radio" name="procedencia" value="Procedente" <?php echo $buscaProcedencia["procede"]=="Procedente" ? "checked": ""; ?>>Procedente</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="procedencia" value="Improcedente" <?php echo $buscaProcedencia["procede"]=="Improcedente" ? "checked": ""; ?>>Improcedente</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>

            <fieldset>
              <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> MEDIDA APLICADA: </FONT></b> </legend> <br>

              <label for="example-search-input" class="col-2 col-form-label"> Tipo da Medida:</label>
              <br>
              <div class="row">
                <div class="col-xs-6 col-md-3">
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Aconselhamento" <?php echo buscaCkeck($buscaMedidas,"Aconselhamento"); ?>> Aconselhamento </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Advertencia" <?php echo buscaCkeck($buscaMedidas,"Advertencia"); ?>> Advertência </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Caps" <?php echo buscaCkeck($buscaMedidas,"Caps"); ?>> CAPS </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="CapsAD" <?php echo buscaCkeck($buscaMedidas,"CapsAD"); ?>> CAPS-AD </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="CapsTranstorno" <?php echo buscaCkeck($buscaMedidas,"CapsTranstorno"); ?>> CAPS Transtorno </INPUT> <br>
                </div>
                <div class="col-xs-6 col-md-3">
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Cartorio" <?php echo buscaCkeck($buscaMedidas,"Cartorio"); ?>> Cartório </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Cemfra" <?php echo buscaCkeck($buscaMedidas,"Cemfra"); ?>> CEMFRA </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Cramsv" <?php echo buscaCkeck($buscaMedidas,"Cramsv"); ?>> CRAMSV </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Cras" <?php echo buscaCkeck($buscaMedidas,"Cras"); ?>> CRAS </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Creas" <?php echo buscaCkeck($buscaMedidas,"Creas"); ?>> CREAS </INPUT> <br>
                </div>
                <div class="col-xs-6 col-md-3">
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Cria" <?php echo buscaCkeck($buscaMedidas,"Cria"); ?>> CRIA </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Cta" <?php echo buscaCkeck($buscaMedidas,"Cta"); ?>> CTA </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="DefensoriaPublica" <?php echo buscaCkeck($buscaMedidas,"DefensoriaPublica"); ?>> Defensoria Pública </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Delegacia" <?php echo buscaCkeck($buscaMedidas,"Delegacia"); ?>> Delegacia </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Instituição de Acolhimento" <?php echo buscaCkeck($buscaMedidas,"Instituição de Acolhimento"); ?>> Instituição de Acolhimento </INPUT> <br>
                </div>
                <div class="col-xs-6 col-md-3">
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Ministerio Publico" <?php echo buscaCkeck($buscaMedidas,"Ministerio Publico"); ?>> Ministério Público </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Pestallozi" <?php echo buscaCkeck($buscaMedidas,"Pestallozi"); ?>> Pestallozi </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Secretaria da Paz" <?php echo buscaCkeck($buscaMedidas,"Secretaria da Paz"); ?>> Secretaria da Paz </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Semas" <?php echo buscaCkeck($buscaMedidas,"Semas"); ?>> SEMAS </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Unidade de Ensino" <?php echo buscaCkeck($buscaMedidas,"Unidade de Ensino"); ?>> Unidade de Ensino </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="medida[]" VALUE="Unidade de Saude" <?php echo buscaCkeck($buscaMedidas,"Unidade de Saude"); ?>> Unidade de Saúde </INPUT> <br>

                </div>
              </div>
              <div class="form-group">
                <label for="comment"> Observações:</label>
                <textarea class="form-control" placeholder=" Escreva aqui a sua observação sobre as medidas aplicadas." rows="3" name="observacoesMedidas" id="comment"> <?php echo isset($buscaMedidas[0][3])?$buscaMedidas[0][3]:""; ?> </textarea>
              </div> 
            </fieldset>

            <fieldset>
              <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> CRIANÇAS/ADOLESCENTES QUE INFRINGIRAM SEUS PRÓPRIOS DIREITOS: </FONT></b> </legend> <br>
              <label for="example-search-input" class="col-2 col-form-label"> Tipo da Direito:</label>
              <br>
              <div class="row">
                <div class="col-xs-6 col-md-4">
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Ameaças" <?php echo buscaCkeck($buscaIpd,"Ameaças"); ?> > Ameaça </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Briga na Escola" <?php echo buscaCkeck($buscaIpd,"Briga na Escola"); ?>> Brigas na Escola </INPUT> <br>
                </div>
                <div class="col-xs-6 col-md-4">
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Evasão Escolar" <?php echo buscaCkeck($buscaIpd,"Evasão Escolar"); ?>> Evasão Escolar </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Fuga" <?php echo buscaCkeck($buscaIpd,"Fuga"); ?>> Fuga/Desaparecido </INPUT> <br>
                </div>
                <div class="col-xs-6 col-md-4">
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Proprios Direitos" <?php echo buscaCkeck($buscaIpd,"Proprios Direitos"); ?>> Próprios Direitos </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Situação de Rua" <?php echo buscaCkeck($buscaIpd,"Situação de Rua"); ?>> Situação de Rua </INPUT> <br>
                </div>
              </div>
            </fieldset>

            <br>
            <fieldset>
              <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> ALGUMA PENDÊNCIA: </FONT></b> </legend> <br>
              <label for="comment"> Pendência:</label>
              <div class="radio">
                <label><input type="radio" name="pendencia" value="sim" <?php echo $buscaRegistro["pendencia"]=="sim" ? "checked " : ""; ?> >Sim</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="pendencia" value="nao" <?php echo $buscaRegistro["pendencia"]=="nao" ? "checked " : ""; ?>>Não</label>
              </div>
            </fieldset>
            <br>
            <br>
            <BR>
              <center>
                <button type="submit" class="btn btn-default btn-lg" value="Salvar"> SALVAR
                  <span class="glyphicon glyphicon-ok"></span>
                </button>

                <button type="submit" class="btn btn-default btn-lg" value="Gerar"> GERAR PDF
                  <span class="glyphicon glyphicon-ok"></span>
                </button>
              </center>

              <BR>

                <hr>
                <footer>
                  <p> Coletivo EIDI </p>
                  <p>2017</p>
                </footer>
              </form>

            </body>
            </html>


