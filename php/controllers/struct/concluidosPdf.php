<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require(__DIR__."/../../../lib/dompdf/autoload.inc.php");
//Criando a Instancia
		$dompdf = new DOMPDF();

	include("../class/conexao.php");
	$html = '
			<center><img src="../../../assets/img/banner.jpg"></center>
			<br>
			<center><h3> LISTA DE ATENDIMENTOS CONCLUÍDOS</h3></center>
			
			<br>
			<br>
			<h4>Emitido em:'.date('d/m/y') .' </h4>
			
	<table border=1 width=100%>
	<thead>
	<tr>
	<th><center>Registro</center></th>
	<th><center>Data de Registro</center></th>
	<th><center>Nome da Criança</center></th>
	<th><center>Data de Nascimento</center></th>
	<th><center>Status</center></th>
	</tr>
	</thead>
	<tbody>
	';

	$consulta = "SELECT r.idregistro,r.data_ocorrencia, c.nome, c.nascimento, r.pendencia,r.idregistro FROM registro r,crianca c WHERE c.idcrianca = r.crianca_idcrianca AND r.pendencia = 'Concluida' ";

	$conexao_banco = Conexao::conn();
	$resultado = $conexao_banco->query($consulta);
	 while($row_transacoes = mysqli_fetch_assoc($resultado)){
	  	$html .= '<tr><td><center>'.$row_transacoes['idregistro'] . "</center></td>";
	  	$html .= '<td><center>'.date( "d/m/Y", strtotime($row_transacoes['data_ocorrencia'])) . "</center></td>";
	  	$html .= '<td><center>'.$row_transacoes['nome'] . "</center></td>";
	  	$html .= '<td><center>'.date( "d/m/Y", strtotime($row_transacoes['nascimento']))  . "</center></td>";
	  	$html .= '<td><center>'.$row_transacoes['pendencia'] . "</center></td></tr>";	
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
    	// exit();
		// Carrega seu HTML
		$dompdf->load_html($html);

		//Renderizar o html
		$dompdf->render();

		//Exibibir a página
		$dompdf->stream(
			"AtendimentosConcluidos.pdf", 
			array(
				"Attachment" => true //Para realizar o download somente alterar para true
			)
		);
?>