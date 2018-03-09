<?php
include(__DIR__."/../controllers/struct/verificador.php");
include(__DIR__."/../controllers/class/controladorDeErros.php");
include(__DIR__."/../controllers/class/controladorDeSucesso.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ATENDIMENTO</title>
</head>
<body>

    <?php include("./layout/menu.php"); ?>


	<?php 
	   $erro       = Erros::recebeErro();
	   $sucesso    = Sucesso::recebeSucesso();
	   if($sucesso!=null){
	       echo '<div class="alert alert-success">
                  <strong>Successo!</strong>'.$sucesso.'.
                </div>';
	   }else if($erro!=null){
	       echo '<div class="alert alert-danger">
                  <strong>Erro!</strong> '.$erro.'.
                </div>';
	   }
	?>

    <div class="container"> 
      <fieldset> 
        <form action="../controllers/struct/denuncia.php" method="POST" accept-charset="utf-8">
          <legend><b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> FICHA DE ATENDIMENTO </FONT></b> </legend> <br> 
          <div class="container">
            <div class="form-group row">

              <div class="col-xs-3">
                <label for="ex2">Registro Número:</label>
                <input class="form-control"  type= "text" placeholder="EX.12" name="registro" id="registro">
                <?php
                  $conexao_banco = Conexao::conn();
                  $resultado = $conexao_banco->query( "SELECT MAX(idregistro)+1 AS idregistro FROM registro");
                  $linha = mysqli_fetch_array($resultado);
                   echo '
                  <p>Sugestão de Próximo Registro:'.$linha[0].'</p>
                ';
                  ?>
              </div>
              <div class="col-xs-3">
                <label for="ex3">Data do Atendimento:</label>
                <input class="form-control" type="date" placeholder ="15/05/2017" name="data_ocorrencia" id="data">
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset> 
          <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> DADOS DA CRIANÇA/ADOLESCENTE </FONT></b> </legend> <br>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label"> Nome:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX.João da Silva" name="nome" id="nome">
            </div>
          </div>
          <div class="container">
            <div class="form-group row">

              <div class="col-xs-3">
                <label for="ex2">Data de Nascimento:</label>
                <input class="form-control"  type="date" id="nascimento" placeholder="EX.15/05/2017" name="nascimento">
              </div>
              <div class="col-xs-3">
                <label for="ex3">Sexo:</label>
                <div class="radio">
                  <label><input type="radio" name="sexo" value="Feminino" checked>Feminino</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="sexo" value="Masculino">Masculino</label>
                </div>
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset> 
          <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> DADOS DOS RESPONSÁVEIS </FONT></b> </legend> <br>
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label"> Pai:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX. João da Silva"  name="pai">
            </div>
          </div>

          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label"> Mãe:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX. Maria dos Santos"  name="mae">
            </div>
          </div>

          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label"> Outros Responsáveis:</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="EX. João de Oliveira"  name="outros_responsaveis">
            </div>
          </div>
          <label for="example-search-input" class="col-2 col-form-label"> Endereço:</label>

          <div class="container">
            <div class="form-group row">

              <div class="col-xs-6">
                <label for="ex2"> Rua:</label>
                <input class="form-control"  type= "text" placeholder="Ex. Rua Nossa Senhora" name="rua" id="rua">
              </div>
              <div class="col-xs-1">
                <label for="ex3"> Número:</label>
                <input class="form-control" type="text" placeholder ="Ex.527" name="numero" id="numero">
              </div>
            </div>
          </div>

          <div class="container">
            <div class="form-group row">

              <div class="col-xs-6">
                <label for="ex2"> Ponto de Referência:</label>
                <input class="form-control"  type= "text" placeholder=" Ex.Vizinho a padaria" name="referencia" id="referencia">
              </div>
              <div class="col-xs-4">
                <label for="ex3"> Bairro:</label>
                <select class="form-control"  name="bairro" id="bairro">
                    <option value="Não Informado">-----</option>
                  <option value="Alazao">Alazão</option>
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
                  <option value="Piaui">Piauí­</option>
                  <option value="Pimenteira">Pimenteira</option>
                  <option value="Pocao">Poção</option>
                  <option value="Poco da Pedra">Poço da Pedra</option>
                  <option value="Poço de Baixo">Poço de Baixo</option>
                  <option value="Poço de Santana">Poço de Santana</option>
                  <option value="Quati">Quati</option>
                  <option value="Riacho Seco">Riacho Seco</option>
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
                <input class="form-control" type="text" placeholder="EX. Rua Vereador Dantas da Silva"  name="outro_endereco">
              </div>
            </div>
            <div class="container">
              <div class="form-group row">

                <div class="col-xs-4">
                  <label for="ex2"> Telefone:</label>
                  <input class="form-control"  type= "text" placeholder=" (82)98654-4532" name="telefone" id="telefone">
                </div>
              </div>
            </fieldset>

            <fieldset>
              <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> DADOS DA VIOLÊNCIA</FONT></b> </legend> <br>

              <label for="example-search-input" class="col-2 col-form-label"> Tipo da Violência:</label>
              <div class="row">
                <div class="col-xs-4 col-md-3">
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Abandono de Incapaz"> Abandono de Incapaz </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Abuso Sexual"> Abuso Sexual</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Agressao Fisica"> Agressão Física</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Agressao Psicologica"> Agressão Psicológica</INPUT><br>
                </div>

                <div class="col-xs-4 col-md-3">
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Agressao Verbal"> Agressão Verbal</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Ameaca Morte"> Ameaça de Morte</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Bullying"> Bullying</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Certidao de Nascimento"> Certidão de Nascimento</INPUT><br>
                </div>
                <div class="col-xs-4 col-md-3">
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Desaparecido"> Desaparecido </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Drogas"> Drogas</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Educacao"> Educação </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Guarda Compartilhada"> Guarda Compartilhada</INPUT> <br>
                </div>
                <div class="col-xs-4 col-md-3">
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Maus Tratos"> Maus-Tratos </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Negligencia"> Negligência </INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Pensão Alimenticia"> Pensão Alimentícia</INPUT><br>
                  <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Saúde"> Saúde <br>
                    <INPUT TYPE="checkbox" NAME="tipoViolencia[]" VALUE="Trabalho Infantil"> Trabalho Infantil </INPUT><br>
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="example-text-input" class="col-2 col-form-label"> Breve Descrição da Violência:</label>
                  <div class="col-10">
                    <textarea class="form-control" placeholder="Faça uma breve descrição do atendimento." rows="3" name="observacoes" id="comment"></textarea>
                  </div>
                  <br>
                  <label for="example-search-input" class="col-2 col-form-label"> Suposto Agressor:</label>
              <div class="row">
                <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Pai"> Pai </INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Mãe"> Mãe</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Tio Paterno"> Tio Paterno </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Tia Paterna"> Tia Paterna </INPUT><br>
                </div>
                    <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Avó Paterna"> Avó Paterno</INPUT><br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Avô Paterna"> Avô Paterno </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Tio Materno"> Tio Materno</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Tia Materna"> Tia Materna </INPUT><br>
                  </div>
                    <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Avó Materna"> Avó Materna</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Avô Materno"> Avô Materno </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Crianca"> Própria Criança</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Adolescente"> Próprio Adolescente </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Vizinho"> Vizinho </INPUT><br>
                  </div>
                  <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Escola"> Escola </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Creche"> Creche</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Educacao"> Educação</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Saude"> Saúde</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="supostoAgressor[]" VALUE="Padrasto"> Padrasto/Madrasta </INPUT> <br>
                  </div>
                </div>  
              </div>
            </fieldset>
            <br>
            <fieldset>
              <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> MEDIDAS APLICADAS </FONT></b> </legend> <br>

              <label for="example-search-input" class="col-2 col-form-label">À criança / Ao adolescente (Art. 101)</label>
               
               <div class="row">
                <div class="col-xs-4 col-md-3">
                <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="cri_I"> <abbr title="I - encaminhamento aos pais ou responsável, mediante termo de responsabilidade."> Inciso I</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT><br>               
                <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="cri_II"> <abbr title="II - orientação, apoio e acompanhamento temporários."> Inciso II</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT><br>
                </div>
                    <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="cri_III"> <abbr title="III - matrícula e freqüência obrigatórias em estabelecimento oficial de ensino fundamental."> Inciso III</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="cri_IV"> <abbr title="IV - inclusão em serviços e programas oficiais ou comunitários de proteção, apoio e promoção da família, da criança e do adolescente.">Inciso IV</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT><br>
                  </div>
                      
                    <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="cri_V"> <abbr title="V - requisição de tratamento médico, psicológico ou psiquiátrico, em regime hospitalar ou ambulatorial.">Inciso V</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="cri_VI"> <abbr title="VI - inclusão em programa oficial ou comunitário de auxílio, orientação e tratamento a alcoólatras e toxicômanos.">Inciso VI</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT><br>
                  </div>
                     <div class="col-xs-4 col-md-3">
                      <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="cri_VII"> <abbr title="VII - acolhimento institucional.">Inciso VII</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT><br>
                     <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="cri_VIII"> <abbr title="VIII - inclusão em programa de acolhimento familiar.">Inciso VIII</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT> <br>
                  </div>
                    </div>
              <br>   
              <label for="example-search-input" class="col-2 col-form-label">Aos pais (Art. 129)</label>
               <div class="row">
                <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="adu_I"> <abbr title="I - encaminhamento a serviços e programas oficiais ou comunitários de proteção, apoio e promoção da família."> Inciso I</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="adu_II"> <abbr title="II - inclusão em programa oficial ou comunitário de auxílio, orientação e tratamento a alcoólatras e toxicômanos."> Inciso II</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT> <br>
                </div>
                    <div class="col-xs-4 col-md-3">
                   <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="adu_III"> <abbr title="III - encaminhamento a tratamento psicológico ou psiquiátrico."> Inciso III</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT> <br>
                   <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="adu_IV"> <abbr title="IV - encaminhamento a cursos ou programas de orientação.">Inciso IV</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT><br>
                  </div>
                      
                    <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="adu_V"> <abbr title="V - obrigação de matricular o filho ou pupilo e acompanhar sua freqüência e aproveitamento escolar.">Inciso V</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="adu_VI"> <abbr title="VI - obrigação de encaminhar a criança ou adolescente a tratamento especializado.">Inciso VI</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT><br>
                    </div>
                     <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="adu_VII"> <abbr title="VII - advertência.">Inciso VII</abbr>&nbsp;&nbsp;&nbsp;&nbsp;</INPUT><br>
                  </div>
                    </div>
              <br>
            </fieldset>

            <fieldset>
              <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> ENCAMINHAMENTOS </FONT></b> </legend> <br>

              <div class="row">
                <div class="col-xs-4 col-md-3">

                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CREAS"> CREAS </INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CAPS"> CAPS</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CAPS AD"> CAPS AD </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CAPS TRANSTORNO"> CAPS TRANSTORNO</INPUT><br>
                </div>
                    <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CRIA"> CRIA</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CRAS"> CRAS </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CEMFRA"> CEMFRA </INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CRAMSV"> CRAMSV </INPUT><br>
                  </div>
                      
                    <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="CTA"> CTA</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="SEMAS"> SEMAS </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="UNIDADE DE ENSINO"> UNIDADE DE ENSINO </INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="UNIDADE DE SAUDE"> UNIDADE DE SAÚDE </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="DEFENSORIA PUBLICA"> DEFENSORIA PÚBLICA </INPUT><br>
                  </div>
                  <div class="col-xs-4 col-md-3">
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="DELEGACIA"> DELEGACIA </INPUT><br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="JUIZADO"> JUIZADO </INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="MINISTERIO PUBLICO"> MINISTÉRIO PÚBLICO </INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="PROGRAMA DE TRATAMENTO DE DROGADICAO"> PROGRAMA DE TRATAMENTO PARA DROGADIÇÃO</INPUT> <br>
                    <INPUT TYPE="checkbox" NAME="medidas[]" VALUE="INSTITUICAO DE ACOLHIMENTO"> INSTITUIÇÃO DE ACOLHIMENTO </INPUT> <br>
                  </div>
                    </div>
            <br>
              <label for="example-text-input" class="col-2 col-form-label"> Observações:</label>
                  <div class="col-10">
                    <textarea class="form-control" placeholder="Faça uma breve observação dos encaminhamentos." rows="3" name="observacoesMedidas" id="comment"></textarea>
                  </div>
                  <br>
            </fieldset>

            <fieldset>
              <legend> <b><FONT FACE="Arial" SIZE="4" COLOR="#551A8B"> CRIANÇAS/ADOLESCENTES QUE INFRINGIRAM SEUS PRÓPRIOS DIREITOS </FONT></b> </legend> <br>
              <label for="example-search-input" class="col-2 col-form-label"> Tipo da Direito:</label>
              <br>
              <div class="row">
                <div class="col-xs-6 col-md-4">
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Ameacas"> Ameaça </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Briga na Escola"> Brigas na Escola </INPUT> <br>
                </div>
                <div class="col-xs-6 col-md-4">
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Evasão Escolar"> Evasão Escolar </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Fuga"> Fuga/Desaparecido </INPUT> <br>
                </div>
                <div class="col-xs-6 col-md-4">
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Proprios Direitos"> Próprios Direitos </INPUT> <br>
                  <INPUT TYPE="checkbox" NAME="direito[]" VALUE="Situação de Rua"> Situação de Rua </INPUT> <br>
                </div>
              </div>
            </fieldset>
            <br>
            <br>
            <br>
              <table style="width:100%">
                <tr>
                
                <th><label for="ex2">Disk 100:</label></th>
                <th><label for="ex3">Procedência:</label></th> 
                <th><label for="comment">Pendência:</label></th>
                
                </tr>
                <tr>
              
                <td><input type="radio" name="disk_100" value="Sim"> Sim</td>
                <td><input type="radio" name="procedencia" value="Procedente" checked> Procedente</td>
                <td><input type="radio" name="pendencia" value="Pendente"> Sim</td>
          
               </tr>
               <tr>
              
                <td><input type="radio" name="disk_100" value="Não" checked> Não</td>
                <td><input type="radio" name="procedencia" value="Improcedente" > Improcedente</td>
                <td><input type="radio" name="pendencia" value="Concluida" checked> Não</td>

                </tr>
                </table>
                <br>
                <br>
               
            <h6><b>Obs.:</b> Gerar Pdf antes de salvar para não perder os dados digitados.</h6>
            <br>
            <br>
            <BR>
              <center>
                <button type="submit" class="btn btn-default btn-lg" value="Salvar" name="salvar"> SALVAR
                  <span class="glyphicon glyphicon-ok"></span>
                </button>

                <button type="submit" class="btn btn-default btn-lg" value="Salvar" name="pdf"> Gerar PDF
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


