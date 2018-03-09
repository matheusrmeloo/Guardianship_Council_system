<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require(__DIR__."/../../../lib/dompdf/autoload.inc.php");


class FichaAtendimento
{
	
	function __construct(
		$registro=null,
		$data_ocorrencia=null,
		$nome=null,
		$nascimento=null,
		$sexo=null,
		$pai=null,
		$mae=null,
		$outrosResponsaveis=null,
		$rua=null,
		$numero=null,
		$referencia=null,
		$bairro=null,
		$telefone=null,
		$outro_endereco=null,
		$tipoViolencia=null,
		$supostoAgressor=null,
		$observacoes=null,
		$disk_100=null,
		$procedencia=null,
		$medida=null,
		$observacoesMedidas=null,
		$direito=null,
		$pendencia=null)
	{
	
		//Criando a Instancia
		$dompdf = new DOMPDF();


	$html = '<div class="tudo"> 
			<link href="../css/bootstrap.min.css" rel="stylesheet">
			<center><img src="../../../assets/img/banner.jpg"></center>
			
			<center><h4> <b>Ficha de Atendimento</b></h4></center>
			<style type="text/css">
  			p {
 				font-size: 15px;
 				line-height: 12px;
 			}
 			table{
 				font-size: 15px;
 				line-height: 12px;
 			}

  			</style>
			<table width="700">
			<tr>
			<td><p><b> Número de Registro: </b>'.$registro.' </p></td>
			<td><p><b>Data de Registro:</b> '.date( "d/m/Y", strtotime( $data_ocorrencia)).' </p></td>
			</tr>
			</table>
			<p>DADOS DA CRIANÇA / ADOLESCENTES</p>
			<p><b>Nome:</b> '.$nome.' <p>
			<table width="700">
			<tr>
			<td><p><b> Sexo:					 </b>'.$sexo.' </p></td>
			<td><p><b>Data de Nascimento:</b> '.date( "d/m/Y", strtotime( $nascimento)).' </p></td>
			</tr>
			</table>
			
			<p>DADOS DOS RESPONSÁVEIS</p>
			<p><b>Pai: </b>'.$pai.'</p>
			<p><b>Mãe: </b> '.$mae.'</p>
            <p><b>Endereço: </b> Rua: '.$rua.' </p>
			<table width="100%">
			<tr>
			<td><p><b> Bairro </b>'.$bairro.' </p></td>
			<td><p><b>Número:</b> '.$numero.'</p></td>
			<td><p><b>Ponto de Referência:</b> '.$referencia.' </p></td>
			</tr>
			</table>
            <p>DADOS DA VIOLÊNCIA</p>
            <p><b>Tipo da Violência:</b></p>';
            foreach ($tipoViolencia as $value) {
			$html=$html.' '.$value.',';	
			}
			$html = $html.'
			<br>
			<p><b> Descrição da Violência: </b>'.$observacoes.' </p>
			<p> <b>Suposto Agressor: </b> </p>';
			foreach ($supostoAgressor as $value) {
			$html=$html.' '.$value.',';	
			}
// <<<<<<< HEAD
// 		// 	$html = $html.'
			
// 		// 	<p> MEDIDAS APLICADAS</p>
// 		// 	<p> <b>Á Criança: </b> Incisos 
// 		// 	';
// 		// foreach ($medida as $value) {
// 		// 	$arrayLocal=explode("_",$value);
// 		// 	if($arrayLocal[0]=='cri'){
// 		// 		$html=$html.' '.$arrayLocal[1].',';
// 		// 	}	
// 		// }
// 		// $html = $html.'
// 		// <p> <b>Aos Pais: </b> Incisos
// 		// 	';
// 		// foreach ($medida as $value) {
// 		// 	$arrayLocal=explode("_",$value);
// 		// 	if($arrayLocal[0]=='adu'){
// 		// 		$html=$html.' '.$arrayLocal[1].',';
// 		// 	}	
// 		// }
// 		// $html = $html.'
// 		// <p> <b>Encaminhado à: </b>
// 		// 	';
// 		// foreach ($medida as $value) {
// 		// 	$arrayLocal=explode("_",$value);

// 		// 	if(($arrayLocal[0]!='adu')and($arrayLocal[0]!='cri')){
// 		// 		$html=$html.' '.$value.',';
// 		// 	}	
// 		// }
// =======
			$html = $html.'
			<br>
			<p> MEDIDAS APLICADAS</p>
			<table width="700">
			<tr>
			<td><p> <b>Á Criança: </b> Incisos 
			';
		foreach ($medida as $value) {
			$arrayLocal=explode("_",$value);
			if($arrayLocal[0]=='cri'){
				$html=$html.' '.$arrayLocal[1].',';
			}	
		}
		$html = $html.'</td>
			<td><b>Aos Pais: </b> Incisos
			';
		foreach ($medida as $value) {
			$arrayLocal=explode("_",$value);
			if($arrayLocal[0]=='adu'){
				$html=$html.' '.$arrayLocal[1].',';
			}	
		}
		$html = $html.'</td>
			</tr>
			</table>
			';
		$html = $html.'
		<p> <b>Encaminhado à: </b>
			';
		foreach ($medida as $value) {
			$arrayLocal=explode("_",$value);

			if(($arrayLocal[0]!='adu')and($arrayLocal[0]!='cri')){
				$html=$html.' '.$value.',';
			}	
		}
// >>>>>>> ef14c1e80140c919fdaf44b7651083de7c6500b5

		$html = $html.'
		<br>
		 <p><b> Observações sobre os encaminhamentos: </b>'.$observacoesMedidas.' </p> ';

		$html = $html.'
				
				<center>___________________________________________ <br> 

								RESPONSÁVEL<br> <br></center>
				
				<center>___________________________________________ <br> 

			CONSELHEIRO RESPONSÁVEL PELO ATENDIMENTO <br> <br><center>';


		// $html="Olá";

		// Carrega seu HTML
		$dompdf->load_html($html);

		//Renderizar o html
		$dompdf->render();

		//Exibibir a página
		$dompdf->stream(
			"FichaAtendimento.pdf", 
			array(
				"Attachment" => true //Para realizar o download somente alterar para true
			)
		);




	}
}

?>