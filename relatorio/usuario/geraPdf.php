<?php

  include_once("../../conf/conexao.php");
  
	$html = '<table border=1';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Id</th>';
	$html .= '<th>Nome</th>';
	$html .= '<th>Telefone</th>';
	$html .= '<th>E-mail</th>';
	$html .= '<th>Usuário</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	$sql = "SELECT * FROM usuario";
	$registros = $con->query($sql);
	foreach ($registros as $linha){
		$html .= '<tr><td>'.$linha['id_usuario'] . "</td>";
		$html .= '<td>'.$linha['nome'] . "</td>";
		$html .= '<td>'.$linha['fone'] . "</td>";
		$html .= '<td>'.$linha['email'] . "</td>";
		$html .= '<td>'.$linha['usuario'] . "</td>";
	}

	$html .= '</tbody>';
	$html .= '</table';

	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("../../dompdf/autoload.inc.php");

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml('	<h1 style="text-align: center;"> Relatório de Usuários </h1> '. $html .'	');

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'portrait');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream("relatorio_usuarios.pdf", array("Attachment" => false));
		
?>
