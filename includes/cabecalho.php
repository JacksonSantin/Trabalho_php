<?php 

  session_start(); //DEVE SER A PRIMEIRA LINHA

  if(!isset($_SESSION['logado'])){
    header('Location: ../login.php');
  }

  define('BASE_URL', 'http://localhost/jdssistemas/sistema');
  define('BASE_DIST', 'http://localhost/jdssistemas/sistema/assets/dist');
  define('BASE_PLUGINS', 'http://localhost/jdssistemas/sistema/assets/plugins');

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>JDS Sistemas</title>

  <!-- FAVICON -->
  <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="../assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="../assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="../assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= BASE_PLUGINS; ?>/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASE_DIST; ?>/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= BASE_DIST; ?>/css/style_admin.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- datatables CSS básico -->
  <link rel="stylesheet" type="text/css" href="<?= BASE_DIST; ?>/js/datatables/datatables.min.css">
  <!-- datatables CSS Bootstrap 4 -->
  <link rel="stylesheet" type="text/css" href="<?= BASE_DIST; ?>/js/datatables/DataTables-1.10.21/css/datatables.bootstrap4.min.css">

  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?= BASE_URL; ?>/login.php?acao=sair">
          <i class="fas fa-sign-out-alt"></i>
          <span>Sair</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASE_URL; ?>" class="brand-link">
      <img src="<?= BASE_DIST; ?>/img/logo.jpg" width="150" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .9">
      <span class="brand-text font-weight-light">JDS SISTEMAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info usuario-logado">
          <span class="brand-text font-weight-bolder">Usuário:</span>
        </div>
        <div class="info">
          <a href="<?= BASE_URL; ?>/usuario/usuario.php?acao=buscar&id=<?=$_SESSION['logado']['id_usuario'];?>" class="d-block"> <?= strtoupper($_SESSION['logado']['nome']); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                SITE CONTEÚDO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/empresa/empresa.php" class="nav-link empresa">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Dados da Empresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/vendas/vendas.php" class="nav-link vendas">
                  <i class="fas fa-car nav-icon"></i>
                  <p>Veículos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                CADASTROS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/usuario/usuario.php" class="nav-link usuarios">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    Usuários
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/cliente/cliente.php" class="nav-link cliente">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    Cliente
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                RELATÓRIOS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/relatorio/usuario/geraPdf.php" target="_blank" class="nav-link usuarios-rel">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Usuários
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/relatorio/cliente/geraPdf.php" target="_blank" class="nav-link cliente-rel">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Cliente
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/relatorio/empresa/geraPdf.php" target="_blank" class="nav-link empresa-rel">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Empresa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL; ?>/relatorio/vendas/geraPdf.php" target="_blank" class="nav-link vendas-rel">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Veículos
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">