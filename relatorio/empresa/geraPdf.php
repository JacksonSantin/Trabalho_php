<?php

  include_once("../../conf/conexao.php");
  
	$html = '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Id</th>';
	$html .= '<th>nome</th>';
	$html .= '<th>cnpj</th>';
	$html .= '<th>Telefone</th>';
	$html .= '<th>Celular</th>';
	$html .= '<th>E-mail</th>';
	$html .= '<th>Cidade</th>';
	$html .= '<th>Facebook</th>';
	$html .= '<th>Instagram</th>';
	$html .= '<th>Twitter</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	$sql = "SELECT * FROM empresa";
	$registros = $con->query($sql);
	foreach ($registros as $linha){
		$html .= '<tr><td>'.$linha['id_empresa'] . "</td>";
		$html .= '<td>'.$linha['nome'] . "</td>";
		$html .= '<td>'.$linha['cnpj'] . "</td>";
		$html .= '<td>'.$linha['telefone1'] . "</td>";
		$html .= '<td>'.$linha['celular1'] . "</td>";
		$html .= '<td>'.$linha['email1'] . "</td>";
		$html .= '<td>'.$linha['cidade'] . "</td>";
		$html .= '<td>'.$linha['facebook'] . "</td>";
		$html .= '<td>'.$linha['instagram'] . "</td>";
		$html .= '<td>'.$linha['twitter'] . "</td>";
	}

	$html .= '</tbody>';
	$html .= '</table';

	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../../dompdf/autoload.inc.php");

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml('	<h1 style="text-align: center;">Relatório de Empresa</h1> '. $html .'	');

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'portrait');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream("relatorio_empresa.pdf", array("Attachment" => false));
		
?>
