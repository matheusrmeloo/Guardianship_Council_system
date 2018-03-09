<?php

	include ('./fpdf/fpdf.php');
	include ('./conexao.php');

	$pdf = new FPDF ();
	$pdf -> AddPage();
	$pdf -> SetFont('Arial', 'B', 16);
	$pdf -> (190,10, utf8_decode('RELATÓRIO DOS ATENDIMENTOS DO CTII (INTERVALO DE TEMPO)',0,0,"C");
	$pdf -> Ln(15);


	$pdf ->SetFont("Arial", 'B',12);
	$pdf ->Cell(190,7,'SEXO',1,0,"C");
	$pdf ->	Ln(10);

	$pdf->SetFont("Arial", 'I',10);
	$pdf->Cell(30,7,"MÊS/SEXO",1,0,"C");
	$pdf->Cell(10,7,"JAN",1,0,"C");
	$pdf->Cell(10,7,"FEV",1,0,"C");
	$pdf->Cell(10,7,"MAR",1,0,"C");
	$pdf->Cell(10,7,"ABR",1,0,"C");
	$pdf->Cell(10,7,"MAI",1,0,"C");
	$pdf->Cell(10,7,"JUN",1,0,"C");
	$pdf->Cell(10,7,"JUL",1,0,"C");
	$pdf->Cell(10,7,"AGO",1,0,"C");
	$pdf->Cell(10,7,"SET",1,0,"C");
	$pdf->Cell(10,7,"OUT",1,0,"C");
	$pdf->Cell(10,7,"NOV",1,0,"C");
	$pdf->Cell(10,7,"DEZ",1,0,"C");
	$pdf->Cell(40,7,"TOTAL GERAL",1,0,"C");
	$pdf->Ln();
	// falta colocar as linhas FEMININO E MASCULINO
	foreach ($pessoas as $pessoa){ // for para pegar os dados e preencher as linhas
    	$pdf->Cell(50,7,utf8_decode($pessoa["nome"]),1,0,"C");
    	$pdf->Cell(40,7,  formatoData($pessoa["nascimento"]),1,0,"C");
    	$pdf->Cell(40,7,$pessoa["telefone"],1,0,"C");
    	$pdf->Cell(60,7,  utf8_decode($pessoa["endereco"]),1,0,"C");
    	$pdf->Ln();
}

	$pdf ->SetFont("Arial", 'B',12);
	$pdf ->Cell(190,7,'IDADE DA CRIANÇA E ADOLESCENTE ',1,0,"C");
	$pdf ->	Ln(10);

	$pdf->SetFont("Arial", 'I',10);
	$pdf->Cell(30,7,"MÊS/IDADE",1,0,"C");
	$pdf->Cell(10,7,"JAN",1,0,"C");
	$pdf->Cell(10,7,"FEV",1,0,"C");
	$pdf->Cell(10,7,"MAR",1,0,"C");
	$pdf->Cell(10,7,"ABR",1,0,"C");
	$pdf->Cell(10,7,"MAI",1,0,"C");
	$pdf->Cell(10,7,"JUN",1,0,"C");
	$pdf->Cell(10,7,"JUL",1,0,"C");
	$pdf->Cell(10,7,"AGO",1,0,"C");
	$pdf->Cell(10,7,"SET",1,0,"C");
	$pdf->Cell(10,7,"OUT",1,0,"C");
	$pdf->Cell(10,7,"NOV",1,0,"C");
	$pdf->Cell(10,7,"DEZ",1,0,"C");
	$pdf->Cell(40,7,"TOTAL GERAL",1,0,"C");
	$pdf->Ln();

	// falta colocar as linhas 0 a 17 + TOTAL
	foreach ($pessoas as $pessoa){ // for para pegar os dados e preencher as linhas
    	$pdf->Cell(50,7,utf8_decode($pessoa["nome"]),1,0,"C");
    	$pdf->Cell(40,7,  formatoData($pessoa["nascimento"]),1,0,"C");
    	$pdf->Cell(40,7,$pessoa["telefone"],1,0,"C");
    	$pdf->Cell(60,7,  utf8_decode($pessoa["endereco"]),1,0,"C");
    	$pdf->Ln();
}

	$pdf ->SetFont("Arial", 'B',12);
	$pdf ->Cell(190,7,utf8_decode('TIPOS DE VIOLÊNCIA'),1,0,"C");
	$pdf ->	Ln(10);

	$pdf->SetFont("Arial", 'I',10);
	$pdf->Cell(30,7,"MÊS/IDADE",1,0,"C");
	$pdf->Cell(10,7,"JAN",1,0,"C");
	$pdf->Cell(10,7,"FEV",1,0,"C");
	$pdf->Cell(10,7,"MAR",1,0,"C");
	$pdf->Cell(10,7,"ABR",1,0,"C");
	$pdf->Cell(10,7,"MAI",1,0,"C");
	$pdf->Cell(10,7,"JUN",1,0,"C");
	$pdf->Cell(10,7,"JUL",1,0,"C");
	$pdf->Cell(10,7,"AGO",1,0,"C");
	$pdf->Cell(10,7,"SET",1,0,"C");
	$pdf->Cell(10,7,"OUT",1,0,"C");
	$pdf->Cell(10,7,"NOV",1,0,"C");
	$pdf->Cell(10,7,"DEZ",1,0,"C");
	$pdf->Cell(40,7,"TOTAL GERAL",1,0,"C");
	$pdf->Ln();

	// falta colocar as linhas das violencias
	foreach ($pessoas as $pessoa){ // for para pegar os dados e preencher as linhas
    	$pdf->Cell(50,7,utf8_decode($pessoa["nome"]),1,0,"C");
    	$pdf->Cell(40,7,  formatoData($pessoa["nascimento"]),1,0,"C");
    	$pdf->Cell(40,7,$pessoa["telefone"],1,0,"C");
    	$pdf->Cell(60,7,  utf8_decode($pessoa["endereco"]),1,0,"C");
    	$pdf->Ln();

    } // testar e depois terminar o relatório com o resto dos campos
  	$pdf->Output();











