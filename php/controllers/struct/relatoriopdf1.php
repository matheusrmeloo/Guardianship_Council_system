<?php	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require("../../../lib/dompdf/autoload.inc.php");
   require("../class/table.php");
//Criando a Instancia
		$dompdf = new DOMPDF();

   $tabela = new Table();
   

	$html = '<center><img src="../../../assets/img/banner.jpg"></center>
			<center><h3>RELATÓRIO DOS ATENDIMENTOS DO CTII</h3></center>
			<br>

			<h4>Emitido em:'.date('d/m/Y') .' </h4>
			<div class="row">
				<div class="col-xs-3">

             <table width="100%"border="1">
          <tr><td><div align="center">SEXO</div></td></tr>
      <table width="100%"border="1">
          <tr><td>MÊS/ SEXO</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
            '.$tabela->sexo($_GET["ano"]).'        
          </tbody>
        </table>
         </table> 
         <br>
         ';
            $html = $html.'

             <table width="100%"border="1">
      		<tr><td><div align="center">IDADE DA CRIANÇA E ADOLESCENTE</div></td></tr>
			<table width="100%"border="1">
      		<tr><td>MÊS/ IDADE</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
            '.$tabela->idade_cri($_GET["ano"]).'   			
          </tbody>
        </table>
         </table> 
         <br>
         ';

         $html.='	<table width="100%"border="1">
      		<tr><td><div align="center">TIPOS DE VIOLÊNCIAS</div></td></tr>
			<table width="100%"border="1">
      		<tr><td>VIOLÊNCIAS</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
            '.$tabela->violencia($_GET["ano"]).'
            </tbody>
        </table>
         </table> 
         <br>
            ';

             $html .='  <table width="100%"border="1">
            <tr><td><div align="center">CRIANÇAS E/ OU ADOLESECENTE QUE INFRANGIRAM SEUS PRÓPRIOS DIREITOS COMO:</div></td></tr>
         <table width="100%"border="1">
            <tr><td>PRÓPRIOS DIREITOS</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
            '.$tabela->direitos($_GET["ano"]).'
            </tbody>
        </table>
         </table> 
         <br>
         ';

           $html .='  <table width="100%"border="1">
      		<tr><td><div align="center">BAIRRO</div></td></tr>
			<table width="100%"border="1">
      		<tr><td>BAIRRO</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
   			'.$tabela->bairros($_GET["ano"]).'
   			</tbody>
        </table>
         </table> 
         <br>
         ';


         $html .=' <table width="100%"border="1">
      		<tr><td><div align="center">SUPOSTOS AGRESSORES</div></td></tr>
			<table width="100%"border="1">
      		<tr><td>SUPOSTO AGRESSOR</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
            '.$tabela->agressor($_GET["ano"]).'
   			</tbody>
        </table>
         </table> 
         <br>
         ';
         
         $html .=' <table width="100%"border="1">
      		<tr><td><div align="center">DISK 100</div></td></tr>
			<table width="100%"border="1">
      		<tr><td>DISK 100</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
            '.$tabela->disk_100($_GET["ano"]).'
   			</tbody>
   			</tbody>
   			</tbody>
        </table>
         </table> 
         <br>
         ';

          $html .=' <table width="100%"border="1">
      		<tr><td><div align="center">MEDIDAS APLICADAS À CRIANÇA</div></td></tr>
			<table width="100%"border="1">
      		<tr><td>MEDIDAS APLICADAS À CRIANÇA</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
   			'.$tabela->inciso_cri($_GET["ano"]).'
   			</tbody>
   			</tbody>
   			</tbody>
        </table>
         </table> 
         <br>
         ';


          $html .=' <table width="100%"border="1">
          <tr><td><div align="center">MEDIDAS APLICADAS AO ADULTO</div></td></tr>
      <table width="100%"border="1">
          <tr><td>MEDIDAS APLICADAS AO ADULTO</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
            '.$tabela->inciso_adu($_GET["ano"]).'
        </tbody>
        </table>
         </table> 
         <br>
         ';

          $html .=' <table width="100%"border="1">
          <tr><td><div align="center">ACONSELHAMENTO</div></td></tr>
      <table width="100%"border="1">
          <tr><td>ACONSELHAMENTO</td> <td>JAN</td> <td>FEV</td> <td>MAR</td> <td>ABR</td> <td>MAI</td> <td>JUN</td> <td>JUL</td> <td>AGO</td> <td>SET</td> <td>OUT</td> <td>NOV</td> <td>DEZ</td> <td>TOTAL GERAL</td></tr>
            '.$tabela->aconselhamento($_GET["ano"]).'
        </tbody>
        </table>
         </table> 
         <br>
         ';

         $html = $html.'

			<br>
			<br>
			<H4>Atenciosamente,

				<center>___________________________________________ <br> 

								CONSELHEIRO RESPONSÁVEL<br> <br> <br></center>


         
        ';

		$dompdf->load_html($html);

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"RelatorioCT.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>