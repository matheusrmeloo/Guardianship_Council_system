<?php	

	//referenciar o DomPDF com namespace
	// use Dompdf\Dompdf;

	// include autoloader
	require("/dompdf/autoload.inc.php");
	//Criando a Instancia
		// $dompdf = new DOMPDF();

	include("conexaoPdf.php");
	$html = '<link href="../css/bootstrap.min.css" rel="stylesheet">
			<center><img src="banner.jpg"></center>
			<br>
			<center><h3>RESULTADO DA CONSULTA</h3></center>
			<br>
			<br>

			
	<table border=1 width=100%>
	<thead>
	<tr>
	<th><center>Registro</center></th>
	<th><center>Data de Registro</center></th>
	<th><center>Nome da Criança</center></th>
	<th><center>Data de Nascimento</center></th>
	<th><center>Nome do Pai</center></th>
	<th><center>Nome da Mãe</center></th>
	</tr>
	</thead>
	<tbody>
	';
	if ($reg!="") {
   $resultadoConsultaElthon = "r.ocorrencia= '$reg'";
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

	$consulta = "SELECT r.ocorrencia, r.data_ocorrencia, c.nome, c.nascimento, re.pai, re.mae, r.idregistro FROM registro r,crianca c, responsavel re WHERE " . $resultadoConsultaElthon . "and c.idcrianca = r.crianca_idcrianca and re.crianca_idcrianca = c.idcrianca";
	$resultado = mysqli_query($conn, $consulta);
	 while($row_transacoes = mysqli_fetch_assoc($resultado)){
	  	$html .= '<tr><td><center>'.$row_transacoes['ocorrencia'] . "</center></td>";
	  	$html .= '<td><center>'.date( "d/m/Y", strtotime($row_transacoes['data_ocorrencia'])) . "</center></td>";
	  	$html .= '<td><center>'.$row_transacoes['nome'] . "</center></td>";
	  	$html .= '<td><center>'.date( "d/m/Y", strtotime($row_transacoes['nascimento']))  . "</center></td>";
	  	$html .= '<td><center>'.$row_transacoes['pai'] . "</center></td></tr>";		
	  	$html .= '<td><center>'.$row_transacoes['mae'] . "</center></td></tr>";		

	 }

	 $html .= '</tbody>';
	$html .= '</table';

	$html = $html.'
			<br>
			<br>
			<br>
			<br>


				<center>___________________________________________ <br> 

								CONSELHEIRO RESPONSÁVEL </center>

    ';

		// // Carrega seu HTML
		// $dompdf->load_html($html);

		// //Renderizar o html
		// $dompdf->render();

		// //Exibibir a página
		// $dompdf->stream(
		// 	"relatorio_celke.pdf", 
		// 	array(
		// 		"Attachment" => false //Para realizar o download somente alterar para true
		// 	)
		// );
?>