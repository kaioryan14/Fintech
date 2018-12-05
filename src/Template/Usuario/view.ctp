<?php
$this->layout = false;
?>
<?= $this->element('header') ?>

    <div class="row" ng-controller="usuarioController" ng-init="buscar()">
        <script>
            var pg = <?= $pg ?>;
            var URL = "<?=$url?>";
        </script>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                        <h5 class="card-title"><i class="material-icons left">search</i>Pesquisa</h5>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="nome">Nome:</label>
                                <input type="text" id="nome" ng-model="search.nome" name="nome" maxlength="255" class="form-control" />
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="cpf">CPF:</label>
                                <input type="text" id="cpf" ng-model="search.cpf" name="cpf" maxlength="14" class="form-control" />
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="email">Email:</label>
                                <input type="text" id="email" ng-model="search.email" name="email" maxlength="255" class="form-control" />
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="status">Status:</label>
                                <select name="ativo" id="status" class="custom-select" ng-model="search.ativo">
                                  <option selected value="">Selecione uma opção</option>
                                  <option value="1">Ativo</option>
                                  <option value="0">Inativo</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="tipo">Tipo de Usuário:</label>
                                <select name="tipo" id="tipo" class="custom-select" ng-model="search.tipo">
                                  <option selected value="">Selecione uma opção</option>
                                  <option value="1">Administrador</option>
                                  <option value="3">Comum</option>
                                </select>
                            </div>
                            <div class="input-group col-sm-12">
                                <button type="button" ng-click="pesquisar()" class="btn btn-dark"><i class="material-icons left text-white">search</i>Buscar</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="material-icons left">group</i>Usuários</h5>
                    <div class="row">
                        <div class="input-group col-sm-12 col-lg-3">
                            <a href="usuario/add" class="btn btn-success"><i class="material-icons right text-white">add</i>Novo</a>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="input-group col-sm-3">
                            Total: {{total}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-12 table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Tipo de Usuário</th>
                                        <th>Status</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="usuario in usuarios">
                                        <td>{{usuario.nome}}</td>
                                        <td>{{usuario.cpf}}</td>
                                        <td>{{usuario.email}}</td>
                                        <td>{{usuario.telefone}}</td>
                                        <td>{{usuario.permissao.permissao}}</td>
                                        <td>
                                            <a ng-show="usuario.ativo == 1" class="btn"><i class="material-icons text-green">thumb_up</i></a>
                                            
                                            <a ng-hide="usuario.ativo == 1" class="btn"><i class="material-icons text-red">thumb_down</i></a>
                                        </td>
                                        <td>
                                            <center>
                                                <a ng-click="visualizar(usuario)" class="btn button"><i class="material-icons">visibility</i></a>
                                                <a ng-show="usuario.ativo == 1" class="btn button" ng-click="bloquear(usuario)"><i class="material-icons">block</i></a>
                                                
                                                <a ng-show="usuario.ativo == 0" class="btn button" ng-click="desbloquear(usuario)" disabled><i class="material-icons">block</i></a>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                              <ul class="col-sm-12 pagination" style="margin-left: 16px;padding-left: 16px">
                                
                              </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalBloquear" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Aviso!</h5>
                        <p>Deseja bloquear o usuário <b>{{usuario.nome}}</b> de acessar o sistema ?</p>
                    </div>
                    <div class="modal-footer">
                        <button ng-click="bloquearUsuario()" type="button" class="btn btn-success"><i class="material-icons left text-white">thumb_up</i> Sim</button>
                        
                        <button onclick="$('#modalBloquear').modal('hide')" type="button" class="btn btn-danger"><i class="material-icons left text-white">thumb_down</i> Não</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalDesbloquear" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Aviso!</h5>
                        <p>Deseja desbloquear o usuário <b>{{usuario.nome}}</b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button ng-click="bloquearUsuario()" type="button" class="btn btn-success"><i class="material-icons left text-white">thumb_up</i> Sim</button>
                        
                        <button onclick="$('#modalDesbloquear').modal('hide')" type="button" class="btn btn-danger"><i class="material-icons left text-white">thumb_down</i> Não</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalUsuario" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>{{usuario.nome}}</h5>
                        <p><b>CPF:</b> {{usuario.cpf}}</p>
                        <p><b>Email:</b> {{usuario.email}}</p>
                        <p><b>Telefone:</b> {{usuario.telefone}}</p>
                        <p><b>Data de nascimento:</b> {{usuario.data_nascimento}}</p>
                    </div>
                    <div class="modal-footer">
                        <button onclick="$('#modalUsuario').modal('hide')" type="button" class="btn btn-dark"><i class="material-icons left text-white">thumb_up</i> OK</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?= $this->element('footer') ?>
