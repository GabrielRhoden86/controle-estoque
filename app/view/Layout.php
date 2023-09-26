<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="<?php echo $this->getTitle(); ?>">
  <meta name="description" content="<?php echo $this->getDescription(); ?>">
  <meta name="keywords" content="<?php echo $this->getKeywords(); ?>">
  <link rel="shortcut icon" sizes="42x42" href="<?php echo DIRIMG . 'iconChrome.png' ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="<?php echo DIRFONTES . 'fontawesome\css\all.min.css' ?>">
  <link rel="stylesheet" href="<?php echo DIRCSS . 'layout.css' ?>">
  <link rel="stylesheet" href="<?php echo DIRLIB . 'bootstrap-4.1.3\css\bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?php echo DIRLIB . 'bootstrap-icons\font\bootstrap-icons.min.css' ?>">
 <?php $this->addHead(); ?>
  <!-- <title>Controle de Estoque</title> -->
</head>

<body style="background-color:#F3F3F4">
  <header class="bg-white">
    <?php $this->addHeader(); ?>
    <div class="jumbotron-fluid text-center topHeader">
    <h4 class="text-light p-5">Controle de Estoque</h4>
   </div>
   <nav class="navbar navbar-dark-new py-0 nav-header-top navbar-expand-lg py-md-0  w-100">
    <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars fa-2x icon-navbar-top"></i>
    </button>
   <div class="navbar-collapse collapse" id="navbarNav">
     <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link " href="<?php echo DIRPAGE."produto"; ?>">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo DIRPAGE . "cadastro-produto"; ?>">Cadastro Produto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo DIRPAGE . "pedido"; ?>">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo DIRPAGE . "cadastro-pedido"; ?>">Cadastrar Pedido</a>
          </li>
       </ul>  
    </div>
   </nav>
 </header>

  <main class="d-flex justify-content-center">
    <?php $this->addMain(); ?>
  </main>
  
  <footer id="footer" class="text-center footer navbar-fixed-bottom">
    <small class="mt-2">© <?php echo date('Y'); ?> Controle de Estoque</small>
    <?php $this->addFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  </footer>

 </body>
</html>

