<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:host=localhost;dbname=wwwjds_bdsistema';
$user = 'root';
$senha = '';

try {
    $con = new PDO($dsn, $user, $senha);
} catch (PDOException $e) {
    echo 'Falha na Conexão: ' . $e->getMessage();
}

?>