<?php
$this->layout = false;
?>
<?= $this->element('header') ?>

    <div class="row" ng-controller="planoController" ng-init="pesquisar()">
        <script>
            var URL = "<?=$url?>";
        </script>
        <div class="col-sm-12" ng-show="state == 'search'">
            <div class="card">
                <div class="card-body">
                        <h5 class="card-title"><i class="material-icons left">search</i>Pesquisa</h5>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                <label for="nome">Nome:</label>
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
        <div class="col-sm-12" ng-show="state=='search'">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="material-icons left">monetization_on</i>Planos</h5>
                    <div class="row">
                        <div class="input-group col-sm-12 col-lg-3">
                            <a ng-click="preparaInserir()" class="btn btn-success text-white"><i class="material-icons right text-white">add</i>Novo</a>
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
                                       <th>Plano</th>
                                       <th>Banco</th>
                                       <th>Taxa Mensal</th>
                                       <th>Plano Coletivo</th>
                                       <th>Ativo</th>
                                        <th><center>Opções</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="plano in planos">
                                        <td>{{plano.plano}}</td>
                                        <td>{{plano.banco}}</td>
                                        <td>{{plano.taxa_mensal}}</td>
                                        <td>
                                            <a ng-show="plano.ativo == 1" class="btn"><i class="material-icons text-green">thumb_up</i></a>
                                            
                                            <a ng-hide="plano.ativo == 1" class="btn"><i class="material-icons text-red">thumb_down</i></a>
                                        </td>
                                        <td>
                                            <a ng-show="plano.coletivo == 1" class="btn"><i class="material-icons text-green">thumb_up</i></a>
                                            
                                            <a ng-hide="plano.coletivo == 1" class="btn"><i class="material-icons text-red">thumb_down</i></a>
                                        </td>
                                        <td>
                                            <center>
                                            <a class="btn button" ng-click="visualizar(plano)"><i class="material-icons">visibility</i></a>
                                                
                                            <a ng-show="plano.ativo == 1" class="btn button" ><i class="material-icons">block</i></a>
                                                
                                            <a ng-show="plano.ativo == 0" class="btn button" disabled><i class="material-icons">block</i></a>
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

        <div class="col-sm-12" ng-show="state == 'insert' || state == 'update'">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="input-group col-sm-12">
                            <a ng-click="pesquisar()" class="btn btn-dark text-white"><i class="material-icons left text-white">keyboard_return</i>Voltar</a>
                        </div>
                    </div>
                    <h5 class="card-title"><i class="material-icons left">monetization_on</i>Novo Plano de Investimento</h5>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="plano">* Plano:</label>
                            <input type="text" id="plano" ng-model="plano.plano" name="plano" maxlength="255" class="form-control" />
                        </div>
                        
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="meses">* Quantidade de Meses:</label>
                            <input type="text" id="meses" ng-model="plano.periodo" name="periodo" maxlength="2" class="number-2 form-control" />
                        </div>
                        
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="taxa">* Taxa Mensal:</label>
                            <input type="text" id="taxa" ng-model="plano.taxa_mensal" name="taxa" class="money-two form-control"  />
                        </div>
                        
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        </div>
                        
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="meses">* Agência:</label>
                            <input type="text" id="meses" ng-model="plano.agencia" name="agencia" maxlength="6" class="number-6 form-control" />
                        </div>
                        
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="taxa">* Conta:</label>
                            <input type="text" id="taxa" ng-model="plano.conta" name="conta" maxlength="6" class="number-6 form-control"  />
                        </div>
                        
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                <label for="banco">* Banco:</label>
                                <select name="banco" id="tipo" class="custom-select" ng-model="plano.banco">
                                  <option selected value="">Selecione uma opção</option>
                                  <option value="Banco do Brasil">Banco do Brasil</option>
                                  <option value="Banco do Brasil">Banco do Nordeste</option>
                                  <option value="Banco do Brasil">Caixa Econômica Federal</option>
                                  <option value="Banco do Brasil">Itáu</option>
                                  <option value="Banco do Brasil">Santander</option>
                                  <option value="Bradesco">Bradesco</option>
                                </select>
                        </div>
                        
                        <div class="form-group form-check col-sm-12 col-md-6 col-lg-3" style="margin-left: 16px">
                            <input class="form-check-input" type="checkbox" ng-model="plano.ativo" id="ativar">
                            <label class="form-check-label" for="ativar">
                                Ativar Plano
                            </label>
                        </div>
                        
                        <div class="form-group form-check col-sm-12 col-md-6 col-lg-3" style="margin-left: 16px">
                            <input class="form-check-input" type="checkbox" ng-model="plano.coletivo" id="coletivo">
                            <label class="form-check-label" for="coletivo">
                                Plano Coletivo
                            </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-group col-sm-12 col-lg-3">
                            <a ng-click="salvar()" class="btn btn-success text-white"><i class="material-icons right text-white">done</i>Salvar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="modalVisualizar" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Plano de investimento</h5>
                        <p><b>Plano:</b> {{plano.plano}}</p>
                        <p><b>Banco:</b> {{plano.banco}}</p>
                        <p><b>Agência:</b> {{plano.agencia}}</p>
                        <p><b>Conta:</b> {{plano.conta}}</p>
                        <p><b>Período:</b> {{plano.periodo}}</p>
                        <p><b>Taxa Mensal:</b> {{plano.taxa_mensal}}</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-dark text-white" onclick="$('#modalVisualizar').modal('hide')"><i class="material-icons left text-white">thumb_up</i>OK</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

<?= $this->element('footer') ?>
