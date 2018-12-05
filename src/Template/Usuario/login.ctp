<?= $this->layout = false; ?>
<html>

    <head>
        <title>CAKEPHP</title>
        
        <?= $this->Html->css('bootstrap.min') ?>
        <?= $this->Html->css('layout') ?>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <?= $this->Html->script('bootstrap.min') ?>
    </head>
    
    <body class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-sm-6 col-md-3 col-lg-4"></div>
                <div class="col-sm-12 col-sm-6 col-md-6 col-lg-4 jumbotron panel-login">
                    <h1>Acesso</h1>
                    
                    <form method="post">
                        <div class="row">
                            <div class="input-group col-lg-12">
                                <input placeholder="Email" type="text" maxlength="255" id="email" name="email" class="form-control" />
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="input-group col-lg-12">
                                <input placeholder="Senha" type="password" maxlength="255" id="senha" name="senha" class="form-control" />
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="input-group col-lg-12">
                                <a class="text-info">Esqueceu sua senha ?</a> 
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="input-group col-lg-12">
                                <button type="submit" class="btn btn-success col-lg-3">Entrar</button> 
                            </div>
                        </div>
                    </form>
                    <!--
                    <?= $this->Form->create() ?>
                    <?= $this->Form->control('email') ?>
                    <?= $this->Form->control('senha') ?>
                    <?= $this->Form->button('Login') ?>
                    <?= $this->Form->end() ?> -->
                </div>
                <div class="col-sm-12 col-sm-6 col-md-3 col-lg-4"></div>
            </div>
        </div>
    </body>
    
</html>

