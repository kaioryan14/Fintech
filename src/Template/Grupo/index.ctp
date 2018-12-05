<?php
$this->layout = false;
?>
<?= $this->element('header') ?>

    <div class="row" ng-controller="grupoController" ng-init="pesquisar()">
        <script>
            var URL = "<?=$url?>";
            var ID_USUARIO = <?= $user['id'] ?>;
        </script>
        <div class="col-sm-12" ng-show="status == 'search'">
            <div class="card">
                <div class="card-body">
                        <h5 class="card-title"><i class="material-icons left">search</i>Pesquisa</h5>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="nome">Plano:</label>
                                <input type="text" id="nome" ng-model="search.nome" name="nome" maxlength="255" class="form-control" />
                            </div>
                            
                            <!--<div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="tipo">Statuss:</label>
                                <select name="tipo" id="tipo" class="custom-select" ng-model="search.tipo">
                                  <option selected value="">Selecione uma opção</option>
                                  <option value="1">Administrador</option>
                                  <option value="3">Comum</option>
                                </select>
                            </div>-->
                            <div class="input-group col-sm-12">
                                <button type="button" ng-click="pesquisar()" class="btn btn-dark"><i class="material-icons left text-white">search</i>Buscar</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12" ng-show="status == 'search'">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="material-icons left">monetization_on</i>Planos de Investimento</h5>
                    <div class="row">
                    </div>
                    </br>
                    <div class="row">
                        <div class="input-group col-sm-3">
                            Total: 
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-12 table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                       <th>Plano</th>
                                       <th>Banco</th>
                                       <th>Taxa</th>
                                        <th><center>Opções</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="plano in planos">
                                        <td>{{plano.plano}}</td>
                                        <td>{{plano.banco}}</td>
                                        <td>{{plano.taxa_mensal}} %</td>
                                        <td>
                                            <center>
                                                
                                                <a ng-show="plano.grupo.length != 0" class="btn button" ng-click="preparaVisualizar(plano)"><i class="material-icons">visibility</i></a>
                                                
                                                <a ng-show="plano.grupo.length == 0" disabled class="btn button"><i class="material-icons">visibility</i></a>
                                                
                                                <a ng-click="preparaDeposito(plano)" ng-show="plano.grupo.length != 0" class="btn button"><i class="material-icons">monetization_on</i></a>
                                                
                                                <a disabled ng-show="plano.grupo.length == 0" class="btn button"><i class="material-icons">monetization_on</i></a>
                                                
                                                <a ng-show="<?= $user['id_permissao'] ?> == 1" ng-click="buscaGrupo(plano)" class="btn button"><i class="material-icons">group</i></a>
                                                
                                                <a ng-show="plano.grupo.length == 0" ng-click="aderir(plano)" class="btn button"><i class="material-icons">thumb_up</i></a>
                                                
                                                <a ng-show="plano.grupo.length != 0" disabled class="btn button"><i class="material-icons">thumb_up</i></a>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--<div class="row">
                              <ul class="col-sm-12 pagination" style="margin-left: 16px;padding-left: 16px">
                                
                              </ul>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12" ng-show="status == 'resumo'" >
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <a ng-click="pesquisar()" class="btn btn-dark text-white"><i class="text-white material-icons left">keyboard_return</i>Voltar</a>
                        </div>
                    </div>
                    <h5 class="card-title"><i class="material-icons left">visibility</i>Resumo do investimento</h5>
                    <div class="row">
                        <p class="col-sm-12"><b>Plano:</b> {{plano.plano}}</p>
                        <p class="col-sm-12"><b>Taxa:</b> {{plano.taxa_mensal}} %</p>
                        <p class="col-sm-12"><b>Conta:</b> {{plano.agencia}}</p>
                        <p class="col-sm-12"><b>Agência:</b> {{plano.agencia}}</p>
                        <p class="col-sm-12"><b>Banco:</b> {{plano.banco}}</p>
                        <p class="col-sm-12"><b>Vencedor:</b></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12" ng-show="status == 'verGrupo'" >
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <a ng-click="pesquisar()" class="btn btn-dark text-white"><i class="text-white material-icons left">keyboard_return</i>Voltar</a>
                        </div>
                    </div>
                    <h5 class="card-title"><i class="material-icons left">group</i>Grupo de Investimento</h5>
                    <div class="row">
                        <p class="col-sm-12">Lista de pessoas</p>
                        <div class="form-group col-sm-12">
                            <button ng-show="vencedor.usuario == undefined" ng-click="preparaVencedor()" class="btn btn-success"><i class="material-icons left text-white">add</i>Gerar Vencedor Mês</button>
                            
                            <button ng-show="vencedor.usuario != undefined" disabled class="btn btn-success"><i class="material-icons left text-white">add</i>Gerar Vencedor Mês</button>
                        </div>
                        <div class="form-group col-sm-12">
                            <p>Valor total mês: R${{valor_total}}</p>
                            <p ng-show="vencedor.usuario != undefined" class="text-success"><b>Vencedor do mês: </b>{{vencedor.usuario.nome}}</p>
                        </div>
                        <div class="input-group col-sm-12 table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                       <th>Usuário</th>
                                       <th>CPF</th>
                                       <th>Depósito Mês</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="usuario in usuarios">
                                        <td>{{usuario.usuario.nome}}</td>
                                        <td>{{usuario.usuario.cpf}}</td>
                                        <td>
                                            <a ng-show="usuario.usuario.investimento.length > 0" class="btn button"><i class="material-icons text-success">thumb_up</i></a>
                                            
                                            <a ng-show="usuario.usuario.investimento.length <= 0" class="btn button"><i class="material-icons text-danger">thumb_down</i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalAderir" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Atenção!</h5>
                        <p>Deseja participar do plano de investimento <b>{{plano.plano}}</b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-success text-white" ng-click="concluirAdesao()" onclick="$('#modalAderir').modal('hide')"><i class="material-icons left text-white">thumb_up</i>Sim</a>
                        <a class="btn btn-danger text-white" onclick="$('#modalAderir').modal('hide')"><i class="material-icons left text-white">thumb_down</i>Não</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalVencedor" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5>Atenção!</h5>
                                <p>Deseja gerar o vencedor do mês ?</p>
                            </div>
                            <div class="modal-footer">
                                <a ng-click="geraVencedor()" class="btn btn-success text-white" onclick="$('#modalVencedor').modal('hide')"><i class="material-icons left text-white">thumb_up</i>Sim</a>
                                <a class="btn btn-danger text-white" onclick="$('#modalVencedor').modal('hide')"><i class="material-icons left text-white">thumb_down</i>Não</a>
                            </div>
                </div>
            </div>
        </div>

        <div id="modalDeposito" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Atenção!</h5>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <p><b>Plano:</b> {{plano.plano}}</p>
                            </div>
                            <div class="col-sm-12 form-group">
                                <p><b>Conta:</b>{{plano.plano}} | <b>Agência:</b> {{plano.agencia}} | <b>Banco:</b> {{plano.banco}}</p>
                            </div>
                            <div class="col-sm-12 form-group">
                                <p>Confirma que realizou o depósito de R$100,00 ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a ng-click="realizaDeposito()" class="btn btn-success text-white" onclick="$('#modalDeposito').modal('hide')"><i class="material-icons left text-white">thumb_up</i>Confirmar</a>
                        <a class="btn btn-danger text-white" onclick="$('#modalDeposito').modal('hide')"><i class="material-icons left text-white">thumb_down</i>Cancelar</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalVerDeposito">
            
            
        </div>


    </div>

<?= $this->element('footer') ?>
