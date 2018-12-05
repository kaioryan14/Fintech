mainApp.controller("usuarioController", function($scope, $http, $location){
   
    $scope.usuario = {};
    $scope.search = {};
    
    $scope.usuarios = [];
    $scope.total = 0;
    $scope.pagina = pg;
    
    $scope.buscar = function(){
      loading();
      
      $scope.search.pagina = $scope.pagina;
      if( $scope.search.ativo != null ){
        $scope.search.ativo = $scope.search.ativo == "0" ? false : true;
      }
      console.log($scope.search);
      $http.post(URL+"/usuario/buscar", $scope.search)
        .then(function(data){
          end();
          $scope.usuarios = data.data.data;
          $scope.total = data.data.total;
          $scope.montaPagination($scope.total, $scope.search.pagina);
      });
    };
    
    $scope.pesquisar = function(){
        $scope.pagina = 1;
        $scope.buscar();
    }
    
    $scope.visualizar = function(usuario){
        $scope.usuario = usuario;
        $scope.usuario.data_nascimento = formatDate($scope.usuario.data_nascimento);
        $("#modalUsuario").modal('show');
    };
    
    $scope.cadastrar = function(){
      var retorno = $scope.validar();
        
      if( retorno.status == false ){
          aviso(retorno.mensagem);
      }else{
       
          loading();
          $scope.usuario.data_nascimento = formatDateBase($scope.usuario.data_nascimento);
          $scope.usuario.cpf = $scope.usuario.cpf.replace(".", "");
          $scope.usuario.cpf = $scope.usuario.cpf.replace(".", "");
          $scope.usuario.cpf = $scope.usuario.cpf.replace("-", "");
          console.log($scope.usuario);
          $http.post("http://localhost/padrao-cakephp/usuario/adicionar", $scope.usuario)
          .then(function(data){
             end();
             var data = data.data;
              
             console.log(data);
             var array = []; array.push(data.mensagem);
             if( data.status == false ){
                 aviso(array);
             }else{
                 aviso_sucesso(array);
                 $scope.usuario = {};
             }
             
          });
          
      }
    };
    
    $scope.validar = function(){
    
        var retorno = {status: true, mensagem: []};
        
      if( $scope.usuario.nome != undefined ){
          if( $scope.usuario.nome.length <=0 || $scope.usuario.nome.length > 255 ){
               retorno.status = false;
               retorno.mensagem.push("Nome de usuário não informado! Máximo de 255 caracteres são permitidos");
          }
      }else{
          retorno.status = false;
          retorno.mensagem.push("Nome de usuário não informado!");
      }
        
      if( $scope.usuario.email != undefined ){
          if( $scope.usuario.email.length <=0 || $scope.usuario.email.length > 255 ){
               retorno.status = false;
               retorno.mensagem.push("Email inválido! Máximo de 255 caracteres são permitidos");
          }
      }else{
          retorno.status = false;
          retorno.mensagem.push("Email não informado!");
      }
        
      if( $scope.usuario.cpf != undefined ){
          if( $scope.usuario.cpf.length <=0 || $scope.usuario.cpf.length > 14 ){
               retorno.status = false;
               retorno.mensagem.push("CPF inválido! Máximo de 14 caracteres são permitidos");
          }
      }else{
          retorno.status = false;
          retorno.mensagem.push("CPF não informado!");
      }
        
      if( $scope.usuario.telefone != undefined ){
          if( $scope.usuario.telefone.length <=0 || $scope.usuario.telefone.length > 20 ){
               retorno.status = false;
               retorno.mensagem.push("Telefone inválido! Máximo de 20 caracteres são permitidos");
          }
      }else{
          retorno.status = false;
          retorno.mensagem.push("Telefone não informado!");
      }
        
      if( $scope.usuario.data_nascimento != undefined ){
          if( $scope.usuario.data_nascimento.length <=0 || $scope.usuario.data_nascimento.length > 14 || isValidDate($scope.usuario.data_nascimento) == false ){
               retorno.status = false;
               retorno.mensagem.push("Data de nascimento inválida!");
          }
      }else{
          retorno.status = false;
          retorno.mensagem.push("Data de nascimento não informada!");
      }
        
      if( $scope.usuario.senha != undefined ){
          if( $scope.usuario.senha != $scope.usuario.confsenha ){
               retorno.status = false;
               retorno.mensagem.push("Senhas estão distintas!");
          }
      }else{
          retorno.status = false;
          retorno.mensagem.push("Senha não informada!");
      }
        
    return retorno;
        
    };
    
    $scope.bloquear = function(usuario){
      $scope.usuario = usuario;
      $scope.usuario.active = false;
      $("#modalBloquear").modal('show');
    };
    
    $scope.bloquearUsuario = function(){
      loading();
      $http.post(URL+"/usuario/bloquear", {id: $scope.usuario.id, ativo: $scope.usuario.active})
        .then(function(data){
          end();
         var data = data.data;
          if( data.status == true ){
              $("#modalBloquear").modal('hide');
              $("#modalDesbloquear").modal('hide');
              var aviso = []; aviso.push(data.mensagem);
              aviso_sucesso(aviso);
          }
         $scope.buscar();
      });
    };
    
    $scope.desbloquear = function(usuario){
        $scope.usuario = usuario;
        $scope.usuario.active = true;
        $("#modalDesbloquear").modal('show');
    }
    
    
    $scope.montaPagination = function(total, pagina){
    $(".pagination").empty();
    var quantidade = parseInt(total/10);
    
    if( quantidade > 0 ){
        for( var i=0; i<(quantidade+1); i++ ){
            var index = i+1;
            if( pagina == index ){
                $(".pagination").append("<li class='page-item active'><a  class='page-link'>"+index+"</a></li>");
            }else{
                $(".pagination").append("<li class='page-item'><a class='page-link'>"+index+"</a></li>");
            }
        }
        
        $(".page-link").on('click', function(){
           $scope.pagina = $(this).text();
           $scope.buscar();
        });
    }
    
    }
});