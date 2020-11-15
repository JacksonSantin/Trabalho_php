<?php

  include_once("../../conf/conexao.php");
  
	$html = '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Id</th>';
	$html .= '<th>Veículo</th>';
	$html .= '<th>Valor</th>';
	$html .= '<th>Ano</th>';
	$html .= '<th>Marca</th>';
	$html .= '<th>Motor</th>';
	$html .= '<th>Cor</th>';
	$html .= '<th>Combustível</th>';
	$html .= '<th>Vidro Elétrico?</th>';
	$html .= '<th>Trava Elétrica?</th>';
	$html .= '<th>Ar Condicionado?</th>';
	$html .= '<th>Rádio?</th>';
	$html .= '<th>Descrição</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	$sql = "SELECT * FROM vendas";
	$registros = $con->query($sql);
	foreach ($registros as $linha){
		$html .= '<tr><td>'.$linha['id_venda'] . "</td>";
		$html .= '<td>'.$linha['veiculo'] . "</td>";
		$html .= '<td>'.$linha['valor'] . "</td>";
		$html .= '<td>'.$linha['ano'] . "</td>";
		$html .= '<td>'.$linha['id_marca_veiculo'] . "</td>";
		$html .= '<td>'.$linha['potencia'] . "</td>";
		$html .= '<td>'.$linha['cor'] . "</td>";
		$html .= '<td>'.$linha['combustivel'] . "</td>";
		$html .= '<td>'.$linha['vidro_eletrico'] . "</td>";
		$html .= '<td>'.$linha['trava_eletrica'] . "</td>";
		$html .= '<td>'.$linha['ar_condicionado'] . "</td>";
		$html .= '<td>'.$linha['radio'] . "</td>";
		$html .= '<td>'.$linha['descricao'] . "</td></tr>";
	}

	$html .= '</tbody>';
	$html .= '</table';

	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../../dompdf/autoload.inc.php");

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	
	$dompdf->loadHtml('<h1 style="text-align: center;">Relatório de Veículos</h1> '. $html .'	');

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream("relatorio_veiculos.pdf", array("Attachment" => false));
		
?>
