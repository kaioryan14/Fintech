<html>

    <head>
        <title>CAKEPHP</title>
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <?= $this->Html->css('bootstrap.min') ?>
        <?= $this->Html->css('layout') ?>
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!--<?= $this->Html->script('bootstrap.min') ?>-->
        <?= $this->Html->script('jquery.mask') ?>
        
        <?= $this->Html->script('init') ?>
        <?= $this->Html->script('angular.min') ?>
        <?= $this->Html->script('main') ?>
        <?= $this->Html->script('usuario') ?>
        <?= $this->Html->script('plano') ?>
        <?= $this->Html->script('grupo') ?>
    </head>
    
    <body ng-app="mainApp" class="bg-light">
        
        <nav class="nav-system">
            <?= $this->Html->image('cake-logo.png') ?>
        </nav>
    
        <nav class="navbar navbar-expand-lg navbar-light shadow p-2 mb-5">
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?= $url ?>/usuario/">Início</a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="<?= $url ?>/investimento">Investimentos</a>
              </li>
              <?php if( $user['id_permissao'] == 1 ){ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= $url ?>/planos">Planos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= $url ?>/usuarios">Usuários</a>
              </li>
              <?php } ?>
              <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                </div>
              </li>-->
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <a href="usuario/logout" class="btn bg-dark text-white my-2 my-sm-0" type="submit">
                  <i class="material-icons text-white right">exit_to_app</i>Sair</a>
            </form>
          </div>
        </nav>
        
        <div class="container">