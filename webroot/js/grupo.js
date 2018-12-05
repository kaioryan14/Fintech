mainApp.controller("grupoController", function($scope, $http, $location){
   
    $scope.planos = [];
    $scope.plano = {};
    $scope.total = 0;
    $scope.search = {};
    $scope.pg = 1;
    $scope.investimento = {};
    $scope.valor_total = 0;
    
    $scope.vencedor = {};
    
    $scope.usuarios = [];
    
    $scope.status = 'search';
    
    
    $scope.pesquisar = function(){
        
        $scope.status = 'search';
        
        $scope.search.pagina = $scope.pg;
        $scope.search.id_usuario = ID_USUARIO;
        
        loading();
        $http.post(URL+"/grupo/pesquisar", $scope.search)
        .then(function(data){
            end();
            $scope.planos = data.data.data;
            $scope.total = data.data.total;
            console.log(data.data);
        });
        
    };
    
    $scope.aderir = function(plano){
        $scope.plano = plano;
        $('#modalAderir').modal('show');
    };
    
    $scope.preparaVisualizar = function(plano){
      $scope.plano = plano;
      $scope.status = 'resumo';  
    };
    
    $scope.preparaDeposito = function(plano){
      $scope.plano = plano;
      $("#modalDeposito").modal('show');
    };
    
    $scope.realizaDeposito = function(){
      
        $scope.investimento.id_usuario = ID_USUARIO;
        $scope.investimento.id_plano = $scope.plano.id;
        $scope.investimento.deposito = 100;
        
        loading();
        
        $http.post(URL+"/investimento/add", $scope.investimento)
        .then(function(data){
            end();
            
            var response = data.data;
            
            if( response.status == true ){
                var array = []; array.push(response.mensagem);
                aviso_sucesso(array);
            }else{
                var array = []; array.push(response.mensagem);
                aviso(array);
            }
            $scope.investimento = {};
            $scope.pesquisar();
        });
        
    };
    
    $scope.concluirAdesao = function(){
        loading();
        
        var data = {id_usuario: ID_USUARIO, id_plano: $scope.plano.id};
        
      $http.post(URL+"/grupo/add", data)
        .then(function(data){
          end();
         var result = data.data;
          if( result.status == false ){
              var array = [];array.push(result.mensagem);
              aviso(array);
          }else{
              var array = [];array.push(result.mensagem);
              aviso_sucesso(array);
              $scope.pesquisar();
          }
      });
    };
    
    $scope.preparaVencedor = function(){
      $("#modalVencedor").modal('show');  
    };
    
    $scope.buscaVencedor = function(){
      loading();
        
        var data = new Date();
        var mes = data.getMonth()+1;
        
        $http.post(URL+"/vencedor",{id_plano: $scope.plano.id, mes: mes})
        .then(function(data){
            end();
            console.log(data.data);
            
            if( data.data.length > 0 ){
                $scope.vencedor = data.data[0];
            }
        });
    };
    
    $scope.geraVencedor = function(){
      loading();
        
        var data = new Date();
        var mes = data.getMonth()+1;
        
        $http.post(URL+"/vencedor/add", {id_plano: $scope.plano.id, mes: mes})
        .then(function(data){
            end();
            var response = data.data;
            
            if( response.status == true ){
                var array = []; array.push(response.mensagem);
                aviso_sucesso(array);    
            }else{
                var array = []; array.push(response.mensagem);
                aviso(array); 
            }
            
            $scope.buscaVencedor();
            
        });
    };
    
    $scope.buscaGrupo = function(item){
        
        $scope.status = 'verGrupo';
        $scope.plano = item;
        
        loading();
        $http.post(URL+"/grupo/buscarGrupo", {id_grupo: item.grupo[0].id})
        .then(function(data){
            end();
            console.log(data);
            $scope.usuarios = data.data;
            
            $scope.valor_total = 0;
            $scope.usuarios.forEach(function(item){
               
                for( var investimento of item.usuario.investimento ){
                    $scope.valor_total += investimento.deposito;
                }
                
            });
            
            $scope.valor_total = $scope.valor_total + ($scope.valor_total * item.taxa_mensal);
            $scope.buscaVencedor();
        });
        
    };
    
});