<?php
$this->layout = false;
?>

<?= $this->element('header') ?>

<div class="row" ng-controller="usuarioController">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="input-group col-sm-12">
                        <a onclick="javascript:history.go(-1)" class="btn btn-dark text-white"><i class="material-icons left text-white">keyboard_return</i>Voltar</a>
                    </div>
                </div>
                <h5 class="card-title"><i class="material-icons left">person</i>Cadastro de Usuário</h5>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="nome">Nome Completo:</label>
                        <input type="text" maxlength="255" ng-model="usuario.nome" class="form-control" id="nome" name="nome" placeholder="Nome Completo" />
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label for="email">Email:</label>
                        <input type="text" maxlength="255" ng-model="usuario.email" class="form-control" id="email" name="email" placeholder="Email" />
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label for="cpf">CPF:</label>
                        <input type="text" maxlength="14" ng-model="usuario.cpf" class="form-control" id="cpf" name="cpf" placeholder="CPF" />
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label for="telefone">Telefone:</label>
                        <input type="text" maxlength="20" ng-model="usuario.telefone" class="form-control" id="telefone" name="telefone" placeholder="Telefone" />
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="text" maxlength="10" ng-model="usuario.data_nascimento" class="form-control data" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento (dia/mes/ano)" />
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label for="senha">Senha:</label>
                        <input type="password" maxlength="255" ng-model="usuario.senha" class="form-control" id="senha" name="senha" placeholder="Senha" />
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label for="confsenha">Confirmar Senha:</label>
                        <input type="password" maxlength="255" ng-model="usuario.confsenha" class="form-control" id="confsenha" name="confsenha" placeholder="Confirmar Senha" />
                    </div>
                    
                    <div class="input-group col-sm-12">
                        <button ng-click="cadastrar()" class="btn btn-success"><i class="material-icons text-white left">check</i>Salvar</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<!--
<div class="usuario form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Add Usuario') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('senha');
            echo $this->Form->control('data_nascimento');
            echo $this->Form->control('cpf');
            echo $this->Form->control('telefone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
<?= $this->element('footer') ?>
