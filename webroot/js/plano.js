mainApp.controller("planoController", function($scope, $http, $location){
    
    $scope.plano = {};
    $scope.planos = [];
    $scope.total = 0;
    $scope.state = '';
    $scope.pagina = 1;
    $scope.search = {};
    
    
    $scope.pesquisar = function(){
        $scope.state = 'search';
        
        $scope.search.pagina = $scope.pagina;
        loading();
        $http.post(URL+"/plano/pesquisar", $scope.search)
        .then(function(data){
            end();
            $scope.planos = data.data.data;
            $scope.total = data.data.total;
            
        });
    };
    
    $scope.preparaInserir = function(){
      $scope.state = 'insert';
      $scope.plano = {ativo: false, coletivo: false};
    };
    
    $scope.visualizar = function(plano){
      $scope.plano = plano;
      $('#modalVisualizar').modal('show');
    };
    
    $scope.salvar = function(){
        
        var retorno = $scope.validar();
        if( retorno.status == false ){
            var array = []; array.push(retorno.mensagem);
            aviso(array);
        }else{
            
            $scope.plano.taxa_mensal = $scope.plano.taxa_mensal.replace('.','');
            $scope.plano.taxa_mensal = $scope.plano.taxa_mensal.replace(',','.');
            
            loading();
            $http.post(URL+"/plano/add", $scope.plano)
            .then(function(data){
                end();
                var retorno = data.data;
                var array = [];array.push(retorno.mensagem);
                if(retorno.status == true){
                    $scope.pesquisar();
                    aviso_sucesso(array);
                }else{
                    aviso(array);
                }
                
            });
            
        }
        
      console.log($scope.plano);  
    };
    
    $scope.validar = function(){
      
        var retorno = {status: true};
        
        if( $scope.plano.plano != undefined ){
            if( $scope.plano.plano.length <=0 || $scope.plano.plano.length > 255 ){
                retorno.status = false;
                retorno.mensagem = "Descrição do plano de investimento com quantidade de caracteres inválido! Máximo permitido é 255";
            }
        }else{
            retorno.status = false;
            retorno.mensagem = "Descrição do plano de investimento não informado";
        }
        
        if( $scope.plano.periodo != undefined ){
            if( parseInt($scope.plano.periodo) <=0 ){
                retorno.status = false;
                retorno.mensagem = "Período de investimento inválido!";
            }
        }else{
            retorno.status = false;
            retorno.mensagem = "Período de investimento não informado!";
        }
        
        if( $scope.plano.taxa_mensal != undefined ){
            if( $scope.plano.taxa_mensal.length <=0 ){
                retorno.status = false;
                retorno.mensagem = "Taxa mensal inválida!";
            }
        }else{
            retorno.status = false;
            retorno.mensagem = "Taxa mensal não informada!";
        }
        
        if( $scope.plano.agencia != undefined ){
            if( $scope.plano.agencia.length <=0 || $scope.plano.agencia.length > 6 ){
                retorno.status = false;
                retorno.mensagem = "Número da agência inválida!";
            }
        }else{
            retorno.status = false;
            retorno.mensagem = "Agência não informada!";
        }
        
        if( $scope.plano.conta != undefined ){
            if( $scope.plano.conta.length <=0 || $scope.plano.conta.length > 6 ){
                retorno.status = false;
                retorno.mensagem = "Número da conta inválida!";
            }
        }else{
            retorno.status = false;
            retorno.mensagem = "Conta não informada!";
        }
        
        if( $scope.plano.banco != undefined ){
            if( $scope.plano.banco.length <=0 ){
                retorno.status = false;
                retorno.mensagem = "Banco não selecionado!";
            }
        }else{
            retorno.status = false;
            retorno.mensagem = "Banco não informado!";
        }
        
        
        return retorno;
        
    };
    
});