<?php
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
include("./verificador.php");
include("../class/controladorDeErros.php");
include("../class/controladorDeSucesso.php");
?>

<?php 
$conexao_banco = Conexao::conn();
?>

<?php

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




// var_dump($medida);

// exit();




if(($conexao_banco->query("SELECT * FROM registro WHERE registro.idregistro='$registro'"))->num_rows>0){
    echo "Já existe!";
    Erros::setErro("Esse Registro já existe!");
    header("Location: /php/templates/atendimento.php");
    exit();
}



if(isset($_POST["salvar"])){

$banco_crianca = $conexao_banco->query ("INSERT INTO crianca (nome, nascimento, sexo) 
	VALUES ('$nome', '$nascimento','$sexo')");
$idDaCrianca=$conexao_banco->insert_id;

$datetime1 = new DateTime($nascimento);
$datetime2 = new DateTime($data_ocorrencia);
$interval = $datetime1->diff($datetime2);
var_dump($interval->format('%y'));
$idadeTemp = $interval->format('%y');

$banco_registro = $conexao_banco->query ("INSERT INTO registro (idregistro, data_ocorrencia, pendencia, crianca_idcrianca,idade) 
	VALUES ('$registro','$data_ocorrencia','$pendencia', '$idDaCrianca', '$idadeTemp')");
$idDoRegistro=$conexao_banco->insert_id;


$banco_responsavel = $conexao_banco->query ("
	INSERT INTO responsavel (pai, mae, outro_responsavel, rua, numero, referencia, bairro, telefone, outro_endereco, crianca_idcrianca) 
	VALUES ('$pai', '$mae','$outrosResponsaveis', '$rua', '$numero', '$referencia', '$bairro', '$telefone', '$outro_endereco','$idDaCrianca')");


foreach ($tipoViolencia as $key => $value) {
	$banco_violencia = $conexao_banco->query ("
		INSERT INTO violencia (tipo_violencia ,crianca_idcrianca) 
		VALUES ('$value','$idDaCrianca')");
}

foreach ($supostoAgressor as $key => $value) {
	$banco_agressor = $conexao_banco->query ("
		INSERT INTO agressor (suposto_agressor, observacoes,crianca_idcrianca) 
		VALUES ('$value', '$observacoes','$idDaCrianca')");
}

$banco_disk_100 = $conexao_banco->query ("INSERT INTO disk_100 (disk_100_100, registro_idregistro) 
	VALUES ('$disk_100','$idDoRegistro')");

$banco_procedencia = $conexao_banco->query ("INSERT INTO procedencia(procede, registro_idregistro) 
	VALUES ('$procedencia','$idDoRegistro')");





foreach ($medida as $key => $value) {
	$arrayLocal=explode("_",$value);
	$tipo=3;

	// var_dump($arrayLocal);
	// exit();

	if($arrayLocal[0]=="cri"){
		$tipo=1;
	}elseif ($arrayLocal[0]=="adu") {
		$tipo=2;
	}

	$banco_medidas = $conexao_banco->query ("
		INSERT INTO medidas (descricao, comentario,crianca_idcrianca,tipo) 
		VALUES ('$value', '$observacoesMedidas','$idDaCrianca','$tipo') ");


}

foreach ($direito as $key => $value) {
	$banco_direitos = $conexao_banco->query ("
		INSERT INTO ipd (infrigiram_direitos, crianca_idcrianca) 
		VALUES ('$value','$idDaCrianca')");
}

$banco_log_conselheiro = $conexao_banco->query ("
	INSERT INTO registro_has_conselheiro (registro_idregistro, conselheiro_idconselheiro) 
	VALUES ('$idDoRegistro','".$_SESSION["id"]."')");


// echo "Atendimento Cadastrado com sucesso!";
// echo"outra linha";

// echo "</br> </br> <CENTER><a href="/php/atendimento.php" > ";
Sucesso::setSucesso("Registrado com Sucesso!");
header("Location: /php/templates/atendimento.php");


}else if(isset($_POST["pdf"])){
	require("./fichaAtendimento.php");
	new FichaAtendimento(
		$registro,
		$data_ocorrencia,
		$nome,$nascimento,
		$sexo,
		$pai,
		$mae,
		$outrosResponsaveis,
		$rua,
		$numero,
		$referencia,
		$bairro,
		$telefone,
		$outro_endereco,
		$tipoViolencia,
		$supostoAgressor,
		$observacoes,
		$disk_100,
		$procedencia,
		$medida,
		$observacoesMedidas,
		$direito,
		$pendencia
	);
}


?>