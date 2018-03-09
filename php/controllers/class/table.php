<?php
  include(__DIR__."/../struct/verificador.php");
class Table{

	public $conexao_banco=null;

	function __construct(){
		$this->conexao_banco = Conexao::conn();
	}

	function sexo($ano){

		$sexo = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, crianca.sexo sexo
		FROM registro,crianca
		WHERE crianca.idcrianca=registro.crianca_idcrianca
		AND YEAR(registro.data_ocorrencia)='.$ano.'
		GROUP BY MONTH(registro.data_ocorrencia)';

		$con = $this->conexao_banco->query($sexo);

		$somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];
		//var_dump($con);
		// exit();

		$htmlMasculino="";
		$somaM=0;
		for ($i=1; $i <= 12; $i++) {
			$aux=0;
			foreach ($con as $value) {
				if($value["mes"]==$i and $value["sexo"]=="masculino"){
					$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
					$somaM=$somaM+$value["quantidade_de_ocorrencias"];
					$aux++;
					$htmlMasculino=$htmlMasculino."<td>".$value["quantidade_de_ocorrencias"]."</td>";
					break;
				}
			}
			if($aux==0){
				$htmlMasculino=$htmlMasculino."<td>0</td>";
			}
		}
		$htmlFeminino="";
		$somaF=0;
		for ($i=1; $i <= 12; $i++) {
			$aux=0;
			foreach ($con as $value) {
				if($value["mes"]==$i and $value["sexo"]=="feminino"){
					$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
					$somaF=$somaF+$value["quantidade_de_ocorrencias"];
					$aux++;
					$htmlFeminino=$htmlFeminino."<td>".$value["quantidade_de_ocorrencias"]."</td>";
					break;
				}
			}
			if($aux==0){
				$htmlFeminino=$htmlFeminino."<td>0</td>";
			}
		}
		
		$htmlTotal="";
		$somaT=0;
		for ($i=0; $i < 12; $i++) {
			$htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
			$somaT+=$somador[$i];
		}
		

		return 
		"<tr>
			<td>FEMININO</td> 
			 ".$htmlFeminino."
			<td>".$somaF."</td>
		</tr>
   		<tr>
   			<td>MASCULINO</td> 
   			".$htmlMasculino."
   			<td>".$somaM."</td>
   		</tr>
   		<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td> 
   		</tr>";
	}

	function direitos($ano){

		$arrayDireitos = array(
			"Ameacas",
			"Briga na Escola",
			"Evasão Escolar",
			"Fuga",
			"Situacão de Rua"
		);

		$direito = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, infrigiram_direitos direito FROM registro,crianca,ipd WHERE crianca.idcrianca=registro.crianca_idcrianca AND ipd.crianca_idcrianca=crianca.idcrianca AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by ipd.idipd';

		$con = $this->conexao_banco->query($direito);

		$somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];

		$htmlArray=array(
			"Ameacas"			=>array("quantidade"=>0,"html"=>""),
			"Briga na Escola"	=>array("quantidade"=>0,"html"=>""),
			"Evasão Escolar"	=>array("quantidade"=>0,"html"=>""),
			"Fuga"				=>array("quantidade"=>0,"html"=>""),
			"Situacão de Rua"	=>array("quantidade"=>0,"html"=>"")
		);
		// foreach ($con as $value) {
		// 	var_dump($value);	
		// }
		
		foreach ($arrayDireitos as $direitosForeach) {
			for ($i=1; $i <= 12; $i++) {
				$aux=0;
				foreach ($con as $value) {
					// var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
					// exit();
					if($value["mes"]==$i and $value["direito"]==$direitosForeach){
						$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
						$htmlArray[$direitosForeach]["quantidade"]=$htmlArray[$direitosForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
						$aux++;
						$htmlArray[$direitosForeach]["html"]=$htmlArray[$direitosForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
						break;
					}
				}
				if($aux==0){
					$htmlArray[$direitosForeach]["html"] = 
					$htmlArray[$direitosForeach]["html"]."<td>0</td>";
				}
			}	
		}

		$htmlTotal="";
		$somaT=0;
		for ($i=0; $i < 12; $i++) {
			$htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
			$somaT+=$somador[$i];
		}

		$htmlGeral="";
		foreach ($arrayDireitos as $direitosForeach) {
			$htmlGeral=$htmlGeral.
			"<tr>
				<td>".$direitosForeach."</td> 
				 ".$htmlArray[$direitosForeach]["html"]."
				<td>".$htmlArray[$direitosForeach]["quantidade"]."</td>
			</tr>";	
		}

		

		return 
		$htmlGeral.
		"<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td> 
   		</tr>";
	}

	function bairros($ano){

		$arrayBairros = array(
			"Alazao",
			"Alto do Cruzeiro",
			"Baixa da Hora",
			"Baixa da Onça",
			"Baixa do Capim",
			"Bálsamo",
			"Bananeira",
			"Barro Vermelho",
			"Batingas",
			"Boa Vista",
			"Bom Jardim",
			"Brasilia",
			"Caititus",
			"Cajarana",
			"Canafistula",
			"Capiata",
			"Centro",
			"Flexeiras",
			"Genipapo",
			"Gruta",
			"Guaribas",
			"Ingazeira",
			"Itapoa",
			"Jardim de Maria",
			"Jardim Tropical",
			"Lagoa de São Pedro",
			"Lagoa do Mato",
			"Lagoa do Poção",
			"Laranjal",
			"Mangabeiras",
			"Mocó",
			"Nova Esperanca",
			"Novo Horizonte",
			"Oitizeiro",
			"Ouro Preto",
			"Pau D'Arco",
			"Pé Leve Velho",
			"Perucaba",
			"Piaui",
			"Pimenteira",
			"Poção",
			"Poco da Pedra",
			"Poço de Baixo",
			"Poço de Santana",
			"Quati",
			"Riacho Seco",
			"Santa Edwiges",
			"Santa Esmeralda",
			"São Luis",
			"São Luis 2",
			"Sapucaia",
			"Senador Arnon de Melo",
			"Senador Teotonio Vilela",
			"Sitio das Furnas",
			"Taboquinha",
			"Taquara",
			"Terra Fria",
			"Tingui",
			"Varginha",
			"Verdes Campos",
			"vila Aparecida",
			"Xexeu"
		);

		$bairro = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, bairro FROM registro,crianca,responsavel WHERE crianca.idcrianca=registro.crianca_idcrianca AND responsavel.crianca_idcrianca=crianca.idcrianca AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by responsavel.idresponsavel';

		$con = $this->conexao_banco->query($bairro);

		$somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];

		$htmlArray=array(
			"Alazao" =>array("quantidade"=>0,"html"=>""),
			"Alto do Cruzeiro" =>array("quantidade"=>0,"html"=>""),
			"Baixa da Hora" =>array("quantidade"=>0,"html"=>""),
			"Baixa da Onça" =>array("quantidade"=>0,"html"=>""),
			"Baixa do Capim" =>array("quantidade"=>0,"html"=>""),
			"Bálsamo" =>array("quantidade"=>0,"html"=>""),
			"Bananeira" =>array("quantidade"=>0,"html"=>""),
			"Barro Vermelho" =>array("quantidade"=>0,"html"=>""),
			"Batingas" =>array("quantidade"=>0,"html"=>""),
			"Boa Vista" =>array("quantidade"=>0,"html"=>""),
			"Bom Jardim" =>array("quantidade"=>0,"html"=>""),
			"Brasilia" =>array("quantidade"=>0,"html"=>""),
			"Caititus" =>array("quantidade"=>0,"html"=>""),
			"Cajarana" =>array("quantidade"=>0,"html"=>""),
			"Canafistula" =>array("quantidade"=>0,"html"=>""),
			"Capiata" =>array("quantidade"=>0,"html"=>""),
			"Centro" =>array("quantidade"=>0,"html"=>""),
			"Flexeiras" =>array("quantidade"=>0,"html"=>""),
			"Genipapo" =>array("quantidade"=>0,"html"=>""),
			"Gruta" =>array("quantidade"=>0,"html"=>""),
			"Guaribas" =>array("quantidade"=>0,"html"=>""),
			"Ingazeira" =>array("quantidade"=>0,"html"=>""),
			"Itapoa" =>array("quantidade"=>0,"html"=>""),
			"Jardim de Maria" =>array("quantidade"=>0,"html"=>""),
			"Jardim Tropical" =>array("quantidade"=>0,"html"=>""),
			"Lagoa de São Pedro" =>array("quantidade"=>0,"html"=>""),
			"Lagoa do Mato" =>array("quantidade"=>0,"html"=>""),
			"Lagoa do Poção" =>array("quantidade"=>0,"html"=>""),
			"Laranjal" =>array("quantidade"=>0,"html"=>""),
			"Mangabeiras" =>array("quantidade"=>0,"html"=>""),
			"Mocó" =>array("quantidade"=>0,"html"=>""),
			"Nova Esperanca" =>array("quantidade"=>0,"html"=>""),
			"Novo Horizonte" =>array("quantidade"=>0,"html"=>""),
			"Oitizeiro" =>array("quantidade"=>0,"html"=>""),
			"Ouro Preto" =>array("quantidade"=>0,"html"=>""),
			"Pau D'Arco" =>array("quantidade"=>0,"html"=>""),
			"Pé Leve Velho" =>array("quantidade"=>0,"html"=>""),
			"Perucaba" =>array("quantidade"=>0,"html"=>""),
			"Piaui" =>array("quantidade"=>0,"html"=>""),
			"Pimenteira" =>array("quantidade"=>0,"html"=>""),
			"Poção" =>array("quantidade"=>0,"html"=>""),
			"Poco da Pedra" =>array("quantidade"=>0,"html"=>""),
			"Poço de Baixo" =>array("quantidade"=>0,"html"=>""),
			"Poço de Santana" =>array("quantidade"=>0,"html"=>""),
			"Quati" =>array("quantidade"=>0,"html"=>""),
			"Riacho Seco" =>array("quantidade"=>0,"html"=>""),
			"Santa Edwiges" =>array("quantidade"=>0,"html"=>""),
			"Santa Esmeralda" =>array("quantidade"=>0,"html"=>""),
			"São Luis" =>array("quantidade"=>0,"html"=>""),
			"São Luis 2" =>array("quantidade"=>0,"html"=>""),
			"Sapucaia" =>array("quantidade"=>0,"html"=>""),
			"Senador Arnon de Melo" =>array("quantidade"=>0,"html"=>""),
			"Senador Teotonio Vilela" =>array("quantidade"=>0,"html"=>""),
			"Sitio das Furnas" =>array("quantidade"=>0,"html"=>""),
			"Taboquinha" =>array("quantidade"=>0,"html"=>""),
			"Taquara" =>array("quantidade"=>0,"html"=>""),
			"Terra Fria" =>array("quantidade"=>0,"html"=>""),
			"Tingui" =>array("quantidade"=>0,"html"=>""),
			"Varginha" =>array("quantidade"=>0,"html"=>""),
			"Verdes Campos" =>array("quantidade"=>0,"html"=>""),
			"vila Aparecida" =>array("quantidade"=>0,"html"=>""),
			"Xexeu" =>array("quantidade"=>0,"html"=>"")
		);
		// foreach ($con as $value) {
		// 	var_dump($value);	
		// }
		
		foreach ($arrayBairros as $bairrosForeach) {
			for ($i=1; $i <= 12; $i++) {
				$aux=0;
				foreach ($con as $value) {
					// var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
					// exit();
					if($value["mes"]==$i and $value["bairro"]==$bairrosForeach){
						$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
						$htmlArray[$bairrosForeach]["quantidade"]=$htmlArray[$bairrosForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
						$aux++;
						$htmlArray[$bairrosForeach]["html"]=$htmlArray[$bairrosForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
						break;
					}
				}
				if($aux==0){
					$htmlArray[$bairrosForeach]["html"] = 
					$htmlArray[$bairrosForeach]["html"]."<td>0</td>";
				}
			}	
		}

		$htmlTotal="";
		$somaT=0;
		for ($i=0; $i < 12; $i++) {
			$htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
			$somaT+=$somador[$i];
		}

		$htmlGeral="";
		foreach ($arrayBairros as $bairrosForeach) {
			$htmlGeral=$htmlGeral.
			"<tr>
				<td>".$bairrosForeach."</td> 
				 ".$htmlArray[$bairrosForeach]["html"]."
				<td>".$htmlArray[$bairrosForeach]["quantidade"]."</td>
			</tr>";	
		}

		

		return 
		$htmlGeral.
		"<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td> 
   		</tr>";
	}

	function violencia($ano){

		$arrayViolencia = array(
			"Abandono de Incapaz",
			"Abuso Sexual",
			"Agressao Fisica",
			"Agressao Psicologica",
			"Agressao Verbal",
			"Ameaca Morte",
			"Bulling",
			"Certidao de Nascimento",
			"Desaparecido",
			"Drogas",
			"Educacao",
			"Guarda Compartilhada",
			"Maus Tratos",
			"Negligencia",
			"Pensão Alimenticia",
			"Saúde",
			"Trabalho Infantil"
		);

		$violencia = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, tipo_violencia FROM registro,crianca,violencia WHERE crianca.idcrianca=registro.crianca_idcrianca AND violencia.crianca_idcrianca=crianca.idcrianca AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by violencia.idviolencia';

		$con = $this->conexao_banco->query($violencia);

		$somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];

		$htmlArray=array(
			"Abandono de Incapaz" =>array("quantidade"=>0,"html"=>""),
			"Abuso Sexual" =>array("quantidade"=>0,"html"=>""),
			"Agressao Fisica" =>array("quantidade"=>0,"html"=>""),
			"Agressao Psicologica" =>array("quantidade"=>0,"html"=>""),
			"Agressao Verbal" =>array("quantidade"=>0,"html"=>""),
			"Ameaca Morte" =>array("quantidade"=>0,"html"=>""),
			"Bulling" =>array("quantidade"=>0,"html"=>""),
			"Certidao de Nascimento" =>array("quantidade"=>0,"html"=>""),
			"Desaparecido" =>array("quantidade"=>0,"html"=>""),
			"Drogas" =>array("quantidade"=>0,"html"=>""),
			"Educacao" =>array("quantidade"=>0,"html"=>""),
			"Guarda Compartilhada" =>array("quantidade"=>0,"html"=>""),
			"Maus Tratos" =>array("quantidade"=>0,"html"=>""),
			"Negligencia" =>array("quantidade"=>0,"html"=>""),
			"Pensão Alimenticia" =>array("quantidade"=>0,"html"=>""),
			"Saúde" =>array("quantidade"=>0,"html"=>""),
			"Trabalho Infantil" =>array("quantidade"=>0,"html"=>"")
		);
		// foreach ($con as $value) {
		// 	var_dump($value);	
		// }
		
		foreach ($arrayViolencia as $violenciaForeach) {
			for ($i=1; $i <= 12; $i++) {
				$aux=0;
				foreach ($con as $value) {
					// var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
					// exit();
					if($value["mes"]==$i and $value["tipo_violencia"]==$violenciaForeach){
						$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
						$htmlArray[$violenciaForeach]["quantidade"]=$htmlArray[$violenciaForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
						$aux++;
						$htmlArray[$violenciaForeach]["html"]=$htmlArray[$violenciaForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
						break;
					}
				}
				if($aux==0){
					$htmlArray[$violenciaForeach]["html"] = 
					$htmlArray[$violenciaForeach]["html"]."<td>0</td>";
				}
			}	
		}

		$htmlTotal="";
		$somaT=0;
		for ($i=0; $i < 12; $i++) {
			$htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
			$somaT+=$somador[$i];
		}

		$htmlGeral="";
		foreach ($arrayViolencia as $violenciaForeach) {
			$htmlGeral=$htmlGeral.
			"<tr>
				<td>".$violenciaForeach."</td> 
				 ".$htmlArray[$violenciaForeach]["html"]."
				<td>".$htmlArray[$violenciaForeach]["quantidade"]."</td>
			</tr>";	
		}

		

		return 
		$htmlGeral.
		"<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td> 
   		</tr>";
	}

	function agressor($ano){

		$arrayAgressor = array(
			"pai",
			"Mãe",
			"Tio Paterno",
			"Tia Paterna",
			"Avô Paterna",
			"Avó Paterna",
			"Tio Materno",
			"Tia Materna",
			"Avô Materno",
			"Avó Materna",
			"Crianca",
			"Adolescente",
			"Escola",
			"Creche",
			"Educacao",
			"Saude",
			"Padrasto",
			"Vizinho"
		);

		$agressor = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, suposto_agressor FROM registro,crianca,agressor WHERE crianca.idcrianca=registro.crianca_idcrianca AND agressor.crianca_idcrianca=crianca.idcrianca AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by agressor.idagressor';

		$con = $this->conexao_banco->query($agressor);

		$somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];

		$htmlArray=array(
			"pai" =>array("quantidade"=>0,"html"=>""),
			"Mãe" =>array("quantidade"=>0,"html"=>""),
			"Tio Paterno" =>array("quantidade"=>0,"html"=>""),
			"Tia Paterna" =>array("quantidade"=>0,"html"=>""),
			"Avô Paterna" =>array("quantidade"=>0,"html"=>""),
			"Avó Paterna" =>array("quantidade"=>0,"html"=>""),
			"Tio Materno" =>array("quantidade"=>0,"html"=>""),
			"Tia Materna" =>array("quantidade"=>0,"html"=>""),
			"Avô Materno" =>array("quantidade"=>0,"html"=>""),
			"Avó Materna" =>array("quantidade"=>0,"html"=>""),
			"Crianca" =>array("quantidade"=>0,"html"=>""),
			"Adolescente" =>array("quantidade"=>0,"html"=>""),
			"Escola" =>array("quantidade"=>0,"html"=>""),
			"Creche" =>array("quantidade"=>0,"html"=>""),
			"Educacao" =>array("quantidade"=>0,"html"=>""),
			"Saude" =>array("quantidade"=>0,"html"=>""),
			"Padrasto" =>array("quantidade"=>0,"html"=>""),
			"Vizinho" =>array("quantidade"=>0,"html"=>"")
		);
		// foreach ($con as $value) {
		// 	var_dump($value);	
		// }
		
		foreach ($arrayAgressor as $agressorForeach) {
			for ($i=1; $i <= 12; $i++) {
				$aux=0;
				foreach ($con as $value) {
					// var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
					// exit();
					if($value["mes"]==$i and $value["suposto_agressor"]==$agressorForeach){
						$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
						$htmlArray[$agressorForeach]["quantidade"]=$htmlArray[$agressorForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
						$aux++;
						$htmlArray[$agressorForeach]["html"]=$htmlArray[$agressorForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
						break;
					}
				}
				if($aux==0){
					$htmlArray[$agressorForeach]["html"] = 
					$htmlArray[$agressorForeach]["html"]."<td>0</td>";
				}
			}	
		}

		$htmlTotal="";
		$somaT=0;
		for ($i=0; $i < 12; $i++) {
			$htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
			$somaT+=$somador[$i];
		}

		$htmlGeral="";
		foreach ($arrayAgressor as $agressorForeach) {
			$htmlGeral=$htmlGeral.
			"<tr>
				<td>".$agressorForeach."</td> 
				 ".$htmlArray[$agressorForeach]["html"]."
				<td>".$htmlArray[$agressorForeach]["quantidade"]."</td>
			</tr>";	
		}

		

		return 
		$htmlGeral.
		"<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td> 
   		</tr>";
	}

	function aconselhamento($ano){
	    
	    $arrayAconselhamento = array(
	        "CREAS",
	        "CAPS",
	        "CAPS AD",
	        "CAPS TRANSTORNO",
	        "CRIA",
	        "CRAS",
	        "CEMFRA",
	        "CRAMSV",
	        "CTA",
	        "SEMAS",
	        "UNIDADE DE ENSINO",
	        "UNIDADE DE SAÚDE",
	        "DEFENSORIA PÚBLICA",
	        "DELEGACIA",
	        "JUIZADO",
	        "MINISTÉRIO PÚBLICO",
	        "PROGRAMA DE TRATAMENTO PARA DROGADIÇÃO",
	        "INSTITUIÇÃO DE ACOLHIMENTO"
	    );
	    
	    $aconselhamento = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, descricao FROM registro,crianca,medidas WHERE crianca.idcrianca=registro.crianca_idcrianca AND medidas.tipo=3 AND medidas.crianca_idcrianca=crianca.idcrianca AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by medidas.idmedidas';
	    
	    $con = $this->conexao_banco->query($aconselhamento);
	    
	    $somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];
	    
	    $htmlArray=array(
	        "CREAS" =>array("quantidade"=>0,"html"=>""),
	        "CAPS" =>array("quantidade"=>0,"html"=>""),
	        "CAPS AD" =>array("quantidade"=>0,"html"=>""),
	        "CAPS TRANSTORNO" =>array("quantidade"=>0,"html"=>""),
	        "CRIA" =>array("quantidade"=>0,"html"=>""),
	        "CRAS" =>array("quantidade"=>0,"html"=>""),
	        "CEMFRA" =>array("quantidade"=>0,"html"=>""),
	        "CRAMSV" =>array("quantidade"=>0,"html"=>""),
	        "CTA" =>array("quantidade"=>0,"html"=>""),
	        "SEMAS" =>array("quantidade"=>0,"html"=>""),
	        "UNIDADE DE ENSINO" =>array("quantidade"=>0,"html"=>""),
	        "UNIDADE DE SAÚDE" =>array("quantidade"=>0,"html"=>""),
	        "DEFENSORIA PÚBLICA" =>array("quantidade"=>0,"html"=>""),
	        "DELEGACIA" =>array("quantidade"=>0,"html"=>""),
	        "JUIZADO" =>array("quantidade"=>0,"html"=>""),
	        "MINISTÉRIO PÚBLICO" =>array("quantidade"=>0,"html"=>""),
	        "PROGRAMA DE TRATAMENTO PARA DROGADIÇÃO" =>array("quantidade"=>0,"html"=>""),
	        "INSTITUIÇÃO DE ACOLHIMENTO" =>array("quantidade"=>0,"html"=>"")
	    );
	    // foreach ($con as $value) {
	    // 	var_dump($value);
	    // }
	    
	    foreach ($arrayAconselhamento as $aconselhamentoForeach) {
	        for ($i=1; $i <= 12; $i++) {
	            $aux=0;
	            foreach ($con as $value) {
	                // var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
	                // exit();
	                if($value["mes"]==$i and $value["descricao"]==$aconselhamentoForeach){
	                    $somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
	                    $htmlArray[$aconselhamentoForeach]["quantidade"]=$htmlArray[$aconselhamentoForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
	                    $aux++;
	                    $htmlArray[$aconselhamentoForeach]["html"]=$htmlArray[$aconselhamentoForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
	                    break;
	                }
	            }
	            if($aux==0){
	                $htmlArray[$aconselhamentoForeach]["html"] =
	                $htmlArray[$aconselhamentoForeach]["html"]."<td>0</td>";
	            }
	        }
	    }
	    
	    $htmlTotal="";
	    $somaT=0;
	    for ($i=0; $i < 12; $i++) {
	        $htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
	        $somaT+=$somador[$i];
	    }
	    
	    $htmlGeral="";
	    foreach ($arrayAconselhamento as $aconselhamentoForeach) {
	        $htmlGeral=$htmlGeral.
	        "<tr>
				<td>".$aconselhamentoForeach."</td>
				 ".$htmlArray[$aconselhamentoForeach]["html"]."
				<td>".$htmlArray[$aconselhamentoForeach]["quantidade"]."</td>
			</tr>";
	    }
	    
	    
	    
	    return
	    $htmlGeral.
	    "<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td>
   		</tr>";
	}
	
	
function inciso_cri($ano){
	    
	    $arrayInciso_cri = array(
	        "cri_I",
	        "cri_II",
	        "cri_III",
	        "cri_IV",
	        "cri_V",
	        "cri_VI",
	        "cri_VII",
	        "cri_VIII"
	    );
	    
	    $inciso_cri = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, descricao FROM registro,crianca,medidas WHERE crianca.idcrianca=registro.crianca_idcrianca AND medidas.tipo=1 AND medidas.crianca_idcrianca=crianca.idcrianca AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by medidas.idmedidas';
	    
	    $con = $this->conexao_banco->query($inciso_cri);
	    
	    $somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];
	    
	    $htmlArray=array(
	        "cri_I" =>array("quantidade"=>0,"html"=>""),
	        "cri_II" =>array("quantidade"=>0,"html"=>""),
	        "cri_III" =>array("quantidade"=>0,"html"=>""),
	        "cri_IV" =>array("quantidade"=>0,"html"=>""),
	        "cri_V" =>array("quantidade"=>0,"html"=>""),
	        "cri_VI" =>array("quantidade"=>0,"html"=>""),
	        "cri_VII" =>array("quantidade"=>0,"html"=>""),
	        "cri_VIII" =>array("quantidade"=>0,"html"=>"")
	    );
	    // foreach ($con as $value) {
	    // 	var_dump($value);
	    // }
	    
	    foreach ($arrayInciso_cri as $inciso_criForeach) {
	        for ($i=1; $i <= 12; $i++) {
	            $aux=0;
	            foreach ($con as $value) {
	                // var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
	                // exit();
	                if($value["mes"]==$i and $value["descricao"]==$inciso_criForeach){
	                    $somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
	                    $htmlArray[$inciso_criForeach]["quantidade"]=$htmlArray[$inciso_criForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
	                    $aux++;
	                    $htmlArray[$inciso_criForeach]["html"]=$htmlArray[$inciso_criForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
	                    break;
	                }
	            }
	            if($aux==0){
	                $htmlArray[$inciso_criForeach]["html"] =
	                $htmlArray[$inciso_criForeach]["html"]."<td>0</td>";
	            }
	        }
	    }
	    
	    $htmlTotal="";
	    $somaT=0;
	    for ($i=0; $i < 12; $i++) {
	        $htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
	        $somaT+=$somador[$i];
	    }
	    
	    $htmlGeral="";
	    foreach ($arrayInciso_cri as $inciso_criForeach) {
	        $htmlGeral=$htmlGeral.
	        "<tr>
				<td>".$inciso_criForeach."</td>
				 ".$htmlArray[$inciso_criForeach]["html"]."
				<td>".$htmlArray[$inciso_criForeach]["quantidade"]."</td>
			</tr>";
	    }
	    
	    
	    
	    return
	    $htmlGeral.
	    "<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td>
   		</tr>";
	}


function inciso_adu($ano){
	    
	    $arrayInciso_adu = array(
	        "adu_I",
	        "adu_II",
	        "adu_III",
	        "adu_IV",
	        "adu_V",
	        "adu_VI",
	        "adu_VII"
	    );
	    
	    $inciso_adu = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, descricao FROM registro,crianca,medidas WHERE crianca.idcrianca=registro.crianca_idcrianca AND medidas.tipo=2 AND medidas.crianca_idcrianca=crianca.idcrianca AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by medidas.idmedidas';
	    
	    $con = $this->conexao_banco->query($inciso_adu);
	    
	    $somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];
	    
	    $htmlArray=array(
	        "adu_I" =>array("quantidade"=>0,"html"=>""),
	        "adu_II" =>array("quantidade"=>0,"html"=>""),
	        "adu_III" =>array("quantidade"=>0,"html"=>""),
	        "adu_IV" =>array("quantidade"=>0,"html"=>""),
	        "adu_V" =>array("quantidade"=>0,"html"=>""),
	        "adu_VI" =>array("quantidade"=>0,"html"=>""),
	        "adu_VII" =>array("quantidade"=>0,"html"=>"")
	    );
	    // foreach ($con as $value) {
	    // 	var_dump($value);
	    // }
	    
	    foreach ($arrayInciso_adu as $inciso_aduForeach) {
	        for ($i=1; $i <= 12; $i++) {
	            $aux=0;
	            foreach ($con as $value) {
	                // var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
	                // exit();
	                if($value["mes"]==$i and $value["descricao"]==$inciso_aduForeach){
	                    $somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
	                    $htmlArray[$inciso_aduForeach]["quantidade"]=$htmlArray[$inciso_aduForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
	                    $aux++;
	                    $htmlArray[$inciso_aduForeach]["html"]=$htmlArray[$inciso_aduForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
	                    break;
	                }
	            }
	            if($aux==0){
	                $htmlArray[$inciso_aduForeach]["html"] =
	                $htmlArray[$inciso_aduForeach]["html"]."<td>0</td>";
	            }
	        }
	    }
	    
	    $htmlTotal="";
	    $somaT=0;
	    for ($i=0; $i < 12; $i++) {
	        $htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
	        $somaT+=$somador[$i];
	    }
	    
	    $htmlGeral="";
	    foreach ($arrayInciso_adu as $inciso_aduForeach) {
	        $htmlGeral=$htmlGeral.
	        "<tr>
				<td>".$inciso_aduForeach."</td>
				 ".$htmlArray[$inciso_aduForeach]["html"]."
				<td>".$htmlArray[$inciso_aduForeach]["quantidade"]."</td>
			</tr>";
	    }
	    
	    
	    
	    return
	    $htmlGeral.
	    "<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td>
   		</tr>";
	}
	
// function idade_cri($ano){
	    
// 	    $arrayIdade = array(
// 	        "00",
// 	        "01",
// 	        "02",
// 	        "03",
// 	        "04",
// 	        "05",
// 	        "06",
// 	        "07",
// 	        "08",
// 	        "09",
// 	        "10",
// 	        "11",
// 	        "12",
// 	        "13",
// 	        "14",
// 	        "15",
// 	        "16",
// 	        "17"
// 	    );
	    
// 	    $idade_sql = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, descricao FROM registro,idade WHERE crianca.idcrianca=registro.crianca_idcrianca AND medidas.tipo=1 AND medidas.crianca_idcrianca=crianca.idcrianca AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by registro.idade';
	    
// 	    $con = $this->conexao_banco->query($idade_sql);
	    
// 	    $somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];
	    
// 	    $htmlArray=array(
// 	        "00" =>array("quantidade"=>0,"html"=>""),
// 	        "01" =>array("quantidade"=>0,"html"=>""),
// 	        "02" =>array("quantidade"=>0,"html"=>""),
// 	        "03" =>array("quantidade"=>0,"html"=>""),
// 	        "04" =>array("quantidade"=>0,"html"=>""),
// 	        "05" =>array("quantidade"=>0,"html"=>""),
// 	        "06" =>array("quantidade"=>0,"html"=>""),
// 	        "07" =>array("quantidade"=>0,"html"=>""),
// 	        "08" =>array("quantidade"=>0,"html"=>""),
// 	        "09" =>array("quantidade"=>0,"html"=>""),
// 	        "10" =>array("quantidade"=>0,"html"=>""),
// 			"11" =>array("quantidade"=>0,"html"=>""),
// 			"12" =>array("quantidade"=>0,"html"=>""),
// 			"13" =>array("quantidade"=>0,"html"=>""),
// 			"14" =>array("quantidade"=>0,"html"=>""),
// 			"15" =>array("quantidade"=>0,"html"=>""),
// 			"16" =>array("quantidade"=>0,"html"=>""),
// 			"17" =>array("quantidade"=>0,"html"=>"")

// 	    );
// 	    // foreach ($con as $value) {
// 	    // 	var_dump($value);
// 	    // }
	    
// 	    foreach ($arrayIdade as $idadeForeach) {
// 	        for ($i=1; $i <= 12; $i++) {
// 	            $aux=0;
// 	            foreach ($con as $value) {
// 	                // var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
// 	                // exit();
// 	                if($value["mes"]==$i and $value["descricao"]==$idadeForeach){
// 	                    $somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
// 	                    $htmlArray[$idadeForeach]["quantidade"]=$htmlArray[$idadeForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
// 	                    $aux++;
// 	                    $htmlArray[$idadeForeach]["html"]=$htmlArray[$idadeForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
// 	                    break;
// 	                }
// 	            }
// 	            if($aux==0){
// 	                $htmlArray[$idadeForeach]["html"] =
// 	                $htmlArray[$idadeForeach]["html"]."<td>0</td>";
// 	            }
// 	        }
// 	    }
	    
// 	    $htmlTotal="";
// 	    $somaT=0;
// 	    for ($i=0; $i < 12; $i++) {
// 	        $htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
// 	        $somaT+=$somador[$i];
// 	    }
	    
// 	    $htmlGeral="";
// 	    foreach ($arrayIdade as $idadeForeach) {
// 	        $htmlGeral=$htmlGeral.
// 	        "<tr>
// 				<td>".$idadeForeach."</td>
// 				 ".$htmlArray[$idadeForeach]["html"]."
// 				<td>".$htmlArray[$idadeForeach]["quantidade"]."</td>
// 			</tr>";
// 	    }
	    
	    
	    
// 	    return
// 	    $htmlGeral.
// 	    "<tr>
//    			<td>TOTAL</td>
//    			".$htmlTotal."
//    			<td>".$somaT."</td>
//    		</tr>";
// 	}

function idade_cri($ano){
	    
	    $arrayIdade = array(
	        "00",
	        "01",
	        "02",
	        "03",
	        "04",
	        "05",
	        "06",
	        "07",
	        "08",
	        "09",
	        "10",
	        "11",
	        "12",
	        "13",
	        "14",
	        "15",
	        "16",
	        "17"
	    );
	    
	    $idade_sql = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, idade FROM registro WHERE YEAR(registro.data_ocorrencia)='.$ano.' GROUP by registro.idade';
	    
	    $con = $this->conexao_banco->query($idade_sql);
	    
	    $somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];
	    
	    $htmlArray=array(
	        "00" =>array("quantidade"=>0,"html"=>""),
	        "01" =>array("quantidade"=>0,"html"=>""),
	        "02" =>array("quantidade"=>0,"html"=>""),
	        "03" =>array("quantidade"=>0,"html"=>""),
	        "04" =>array("quantidade"=>0,"html"=>""),
	        "05" =>array("quantidade"=>0,"html"=>""),
	        "06" =>array("quantidade"=>0,"html"=>""),
	        "07" =>array("quantidade"=>0,"html"=>""),
	        "08" =>array("quantidade"=>0,"html"=>""),
	        "09" =>array("quantidade"=>0,"html"=>""),
	        "10" =>array("quantidade"=>0,"html"=>""),
			"11" =>array("quantidade"=>0,"html"=>""),
			"12" =>array("quantidade"=>0,"html"=>""),
			"13" =>array("quantidade"=>0,"html"=>""),
			"14" =>array("quantidade"=>0,"html"=>""),
			"15" =>array("quantidade"=>0,"html"=>""),
			"16" =>array("quantidade"=>0,"html"=>""),
			"17" =>array("quantidade"=>0,"html"=>"")

	    );
	    // foreach ($con as $value) {
	    // 	var_dump($value);
	    // }
	    
	    foreach ($arrayIdade as $idadeForeach) {
	        for ($i=1; $i <= 12; $i++) {
	            $aux=0;
	            foreach ($con as $value) {
	                // var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
	                // exit();
	                if($value["mes"]==$i and $value["idade"]==$idadeForeach){
	                    $somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
	                    $htmlArray[$idadeForeach]["quantidade"]=$htmlArray[$idadeForeach]["quantidade"]+$value["quantidade_de_ocorrencias"];
	                    $aux++;
	                    $htmlArray[$idadeForeach]["html"]=$htmlArray[$idadeForeach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
	                    break;
	                }
	            }
	            if($aux==0){
	                $htmlArray[$idadeForeach]["html"] =
	                $htmlArray[$idadeForeach]["html"]."<td>0</td>";
	            }
	        }
	    }
	    
	    $htmlTotal="";
	    $somaT=0;
	    for ($i=0; $i < 12; $i++) {
	        $htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
	        $somaT+=$somador[$i];
	    }
	    
	    $htmlGeral="";
	    foreach ($arrayIdade as $idadeForeach) {
	        $htmlGeral=$htmlGeral.
	        "<tr>
				<td>".$idadeForeach."</td>
				 ".$htmlArray[$idadeForeach]["html"]."
				<td>".$htmlArray[$idadeForeach]["quantidade"]."</td>
			</tr>";
	    }
	    
	    
	    
	    return
	    $htmlGeral.
	    "<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td>
   		</tr>";
	}
	
	function disk_100($ano){

		$arrayDisk_100 = array(
			"Procedente",
			"Improcedente"
		);

		$disk_100 = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, procede FROM registro,procedencia WHERE procedencia.registro_idregistro=registro.idregistro AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by procedencia.procede';

		$con = $this->conexao_banco->query($disk_100);

		$somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];

		$htmlArray=array(
			"Procedente" =>array("quantidade"=>0,"html"=>""),
			"Improcedente" =>array("quantidade"=>0,"html"=>"")
		// foreach ($con as $value) {
		// 	var_dump($value);	
		// }
			
		 );
		foreach ($arrayDisk_100 as $disk_100Foreach) {
			for ($i=1; $i <= 12; $i++) {
				$aux=0;
				foreach ($con as $value) {
					// var_dump($value["direito"]." == ".$direitosForeach. " and ".$value["mes"]." == ".$i);
					// exit();
					if($value["mes"]==$i and $value["procede"]==$disk_100Foreach){
						$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
						$htmlArray[$disk_100Foreach]["quantidade"]=$htmlArray[$disk_100Foreach]["quantidade"]+$value["quantidade_de_ocorrencias"];
						$aux++;
						$htmlArray[$disk_100Foreach]["html"]=$htmlArray[$disk_100Foreach]["html"]."<td>".$value["quantidade_de_ocorrencias"]."</td>";
						break;
					}
				}
				if($aux==0){
					$htmlArray[$disk_100Foreach]["html"] = 
					$htmlArray[$disk_100Foreach]["html"]."<td>0</td>";
				}
			}	
		}

		$htmlTotal="";
		$somaT=0;
		for ($i=0; $i < 12; $i++) {
			$htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
			$somaT+=$somador[$i];
		}

		$htmlGeral="";
		foreach ($arrayDisk_100 as $disk_100Foreach) {
			$htmlGeral=$htmlGeral.
			"<tr>
				<td>".$disk_100Foreach."</td> 
				 ".$htmlArray[$disk_100Foreach]["html"]."
				<td>".$htmlArray[$disk_100Foreach]["quantidade"]."</td>
			</tr>";	
		}

		

		return 
		$htmlGeral.
		"<tr>
   			<td>TOTAL</td>
   			".$htmlTotal."
   			<td>".$somaT."</td> 
   		</tr>";
	}

	

		// function disk_100($ano){

		// $disk_100 = 'SELECT MONTH(registro.data_ocorrencia) mes, COUNT(registro.idregistro) quantidade_de_ocorrencias, procede FROM registro,procedencia WHERE procedencia.registro_idregistro=registro.idregistro AND YEAR(registro.data_ocorrencia)='.$ano.' GROUP by procedencia.idprocedencia';

		// $con = $this->conexao_banco->query($disk_100);

		// $somador=[0,0,0,0,0,0,0,0,0,0,0,0,0];

		// $htmlProcede="";
		// $somaP=0;
		// for ($i=1; $i <= 12; $i++) {
		// 	$aux=0;
		// 	foreach ($con as $value) {
		// 		if($value["mes"]==$i and $value["procede"]=="procedente"){
		// 			$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
		// 			$somaP=$somaP+$value["quantidade_de_ocorrencias"];
		// 			$aux++;
		// 			$htmlProcede=$htmlProcede."<td>".$value["quantidade_de_ocorrencias"]."</td>";
		// 			break;
		// 		}
		// 	}
		// 	if($aux==0){
		// 		$htmlProcede=$htmlProcede."<td>0</td>";
		// 	}
		// }
		// $htmlImprocedente="";
		// $somaI=0;
		// for ($i=1; $i <= 12; $i++) {
		// 	$aux=0;
		// 	foreach ($con as $value) {
		// 		if($value["mes"]==$i and $value["procede"]=="Improcedente"){
		// 			$somador[$value["mes"]-1]+=$value["quantidade_de_ocorrencias"];
		// 			$somaI=$somaI+$value["quantidade_de_ocorrencias"];
		// 			$aux++;
		// 			$htmlImprocedente=$htmlImprocedente."<td>".$value["quantidade_de_ocorrencias"]."</td>";
		// 			break;
		// 		}
		// 	}
		// 	if($aux==0){
		// 		$htmlImprocedente=$htmlImprocedente."<td>0</td>";
		// 	}
		// }
		
		// $htmlTotal="";
		// $somaT=0;
		// for ($i=0; $i < 12; $i++) {
		// 	$htmlTotal=$htmlTotal."<td>".$somador[$i]."</td>";
		// 	$somaT+=$somador[$i];
		// }
}