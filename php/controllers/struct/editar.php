<?php
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
include("./verificador.php");
?>
<?php 
require '../class/rb.php';
$conexao_banco = Conexao::conn();

$registro = isset($_POST['registro']) ? $_POST['registro'] : "";

$data_ocorrencia = isset($_POST['data_ocorrencia']) ? $_POST['data_ocorrencia'] : "";

$nome = isset($_POST['nome']) ? $_POST['nome'] : "";

$nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : "";

$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";

$pai = isset($_POST['pai']) ? $_POST['pai'] : "";

$mae = isset($_POST['mae']) ? $_POST['mae'] : "";

$outrosResponsaveis = isset($_POST['outros_responsaveis']) ? $_POST['outros_responsaveis'] : "";

$rua = isset($_POST['rua']) ? $_POST['rua'] : "";

$numero = isset($_POST['numero']) ? $_POST['numero'] : "";

$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : "";

$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : "";

$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : "";

$outro_endereco = isset($_POST ['outro_endereco']) ? $_POST ['outro_endereco'] : "";

$tipoViolencia = isset($_POST['tipoViolencia']) ? $_POST['tipoViolencia'] : [];

$supostoAgressor = isset($_POST['supostoAgressor']) ? $_POST['supostoAgressor'] : [];

$observacoes = isset($_POST['observacoes']) ? $_POST['observacoes'] : "";

$disk_100 = isset($_POST['disk_100']) ? $_POST['disk_100'] : "";

$procedencia = isset($_POST['procedencia']) ? $_POST['procedencia'] : "";

$medida = isset($_POST['medida']) ? $_POST['medida'] : [];

$observacoesMedidas = isset($_POST['observacoesMedidas']) ? $_POST['observacoesMedidas'] : "";

$direito = isset($_POST['direito']) ? $_POST['direito'] : [];

$pendencia = isset($_POST['pendencia']) ? $_POST['pendencia'] : "";




$id_crianca = 		isset($_SESSION['id_crianca']) ? $_SESSION['id_crianca'] : null;
$id_registro = 		isset($_SESSION['id_registro']) ? $_SESSION['id_registro'] : null;
$id_responsavel = 	isset($_SESSION['id_responsavel']) ? $_SESSION['id_responsavel'] : null;
//$id_violencia = 	isset($_POST['id_violencia']) ? $_POST['id_violencia'] : null;

RB::checkTable("crianca","nome, nascimento, sexo");
RB::add("'$nome'");
RB::add("'$nascimento'");
RB::add("'$sexo'");
RB::save($conexao_banco, ($id_crianca !=null) ? ("idcrianca=".$id_crianca) : null);


RB::checkTable("registro","ocorrencia, data_ocorrencia, pendencia, crianca_idcrianca");
RB::add("'$registro'");
RB::add("'$data_ocorrencia'");
RB::add("'$pendencia'");
RB::add("'$id_crianca'");
RB::save($conexao_banco,($id_registro !=null) ? ("idregistro=".$id_registro) : null);


RB::checkTable("responsavel","pai, mae, outro_responsavel, rua, numero, referencia, bairro, telefone, outro_endereco, crianca_idcrianca");
RB::add("'$pai'");
RB::add("'$mae'");
RB::add("'$outrosResponsaveis'");
RB::add("'$rua'");
RB::add("'$numero'");
RB::add("'$referencia'");
RB::add("'$bairro'");
RB::add("'$telefone'");
RB::add("'$outro_endereco'");
RB::add("'$id_crianca'");
RB::save($conexao_banco,($id_responsavel !=null) ? ("idresponsavel=".$id_responsavel) : null);


foreach ($tipoViolencia as $key => $value) {
	RB::checkTable("violencia","tipo_violencia ,crianca_idcrianca");
	RB::add("'$value'");
	RB::add("'$id_crianca'");
	RB::save($conexao_banco, (isset($_SESSION["id_violencia"][$value])) ? ("idviolencia=".$_SESSION["id_violencia"][$value]) : null );	
}
RB::delete($conexao_banco,"violencia","idviolencia",$_SESSION["tipoViolencia"],$tipoViolencia);

foreach ($supostoAgressor as $key => $value) {
	RB::checkTable("agressor","suposto_agressor, observacoes,crianca_idcrianca");
	RB::add("'$value'");
	RB::add("'$observacoes'");
	RB::add("'$id_crianca'");
	RB::save($conexao_banco, (isset($_SESSION["id_agressor"][$value])) ? ("idagressor=".$_SESSION["id_agressor"][$value]) : null );
}
RB::delete($conexao_banco,"agressor","idagressor",$_SESSION["supostoAgressor"],$supostoAgressor);

RB::checkTable("disk_100","disk_100_100, registro_idregistro");
RB::add("'$disk_100'");
RB::add("'$id_registro'");
RB::save($conexao_banco, (isset($_SESSION["id_disk_100"])) ? ("id_disk_100=".$_SESSION["id_disk_100"]) : null );


RB::checkTable("procedencia","procede, registro_idregistro");
RB::add("'$procedencia'");
RB::add("'$id_registro'");
RB::save($conexao_banco, (isset($_SESSION["id_procedencia"])) ? ("idprocedencia=".$_SESSION["id_procedencia"]) : null );



foreach ($medida as $key => $value) {
	RB::checkTable("medidas","medidas_aplicadas, outras_medidas,crianca_idcrianca");
	RB::add("'$value'");
	RB::add("'$observacoesMedidas'");
	RB::add("'$id_crianca'");
	RB::save($conexao_banco, (isset($_SESSION["id_medidas"][$value])) ? ("idmedidas=".$_SESSION["id_medidas"][$value]) : null );
}
RB::delete($conexao_banco,"medidas","idmedidas",$_SESSION["medidas"],$medida);

foreach ($direito as $key => $value) {
	RB::checkTable("ipd","infrigiram_direitos, crianca_idcrianca");
	RB::add("'$value'");
	RB::add("'$id_crianca'");
	RB::save($conexao_banco, (isset($_SESSION["id_ipd"][$value])) ? ("idipd=".$_SESSION["id_ipd"][$value]) : null );
}
RB::delete($conexao_banco,"ipd","idipd",$_SESSION["ipd"],$direito);

// $banco_log_conselheiro = $conexao_banco->query ("
// 	INSERT INTO registro_has_conselheiro (registro_idregistro, conselheiro_idconselheiro) 
// 	VALUES ('$id_registro','".$_SESSION["id"]."')");

// RB::checkTable("procedencia","procede, registro_idregistro");
// RB::add("'$procedencia'");
// RB::add("'$id_registro'");
// RB::save($conexao_banco, (isset($_SESSION["id_procedencia"])) ? ("idprocedencia=".$_SESSION["id_procedencia"]) : null );



header("Location: /php/templates/edita-atendimento.php?id=".$id_registro);


?>