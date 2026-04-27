<?php 
session_start(); //DEVE SER A PRIMEIRA LINHA

require_once './conf/conexao.php';

//Finaliza a sessão logado da Aplicação
if(isset($_GET['acao']) && $_GET['acao']=="sair"){
    unset($_SESSION['logado']);
} 

$sql = "INSERT INTO usuario(nome, fone, email, usuario, senha)
          VALUES(:nome, :fone, :email, :usuario, :senha)";
$query = $con->prepare($sql);
$query->bindParam('nome', $_POST['nome']);
$query->bindParam('fone', $_POST['fone']);
$query->bindParam('email', $_POST['email']);
$query->bindParam('usuario', $_POST['usuario']);

//Colocar a senha como md5 utilizando a função md5()
if(isset($_POST['usuario']) && isset($_POST['senha'])){
  $senha = md5($_POST['senha']);

  $query->bindParam('senha', $senha);
  
  $query->execute();
if($query){
    header('Location: login.php');
}else{
    $msg = "Erro ao tentar inserir o registro";
}
}


  define('BASE_URL', 'http://localhost/jdssistemas/sistema/login.php');
  define('BASE_DIST', 'http://localhost/jdssistemas/sistema/assets/dist');
  define('BASE_PLUGINS', 'http://localhost/jdssistemas/sistema/assets/plugins');

  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JDS SISTEMAS | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FAVICON -->
  <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASE_PLUGINS; ?>/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= BASE_PLUGINS; ?>/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASE_DIST; ?>/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="assets/dist/img/logo_upf.png" class="rounded mx-auto d-block" alt="logo" width="50%">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Cadastre-se aqui!</p>

      <form action="cadastro.php" method="post">
      <?php if (isset($msg)) { ?>
        <div class="alert alert-danger" role="alert">
          <?= $msg; ?>
        </div>
      <?php } ?>
        <div class="input-group mb-3">
          <input name="nome" type="text" class="form-control" placeholder="Nome Completo" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="fone" id="fone" type="text" class="form-control" placeholder="Telefone" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="E-mail" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="usuario" type="text" class="form-control" placeholder="Usuário" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="senha" type="password" class="form-control" placeholder="Senha" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"> <i class="fas fa-paper-plane mr-2"></i> Enviar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OU -</p>
        <a href="login.php" class="btn btn-block btn-danger">
          <i class="fas fa-sign-in-alt mr-2"></i>
          Já possuo cadastro
        </a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= BASE_PLUGINS; ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= BASE_PLUGINS; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASE_DIST; ?>/js/adminlte.min.js"></script>
<!-- Máscara -->
<script type="text/javascript" src="<?= BASE_DIST; ?>/js/mask/jquery.mask.min.js"></script> 
<!-- Chama arquivo js -->
<script type="text/javascript" src="<?= BASE_DIST; ?>/js/js_style.js"></script> 
</body>
</html>