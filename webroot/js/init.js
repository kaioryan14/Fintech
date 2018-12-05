$(document).ready(function(){

    $("#cpf").mask("000.000.000-00");
    $("#telefone").mask("(00) 00000 - 0000");
    $(".data").mask("00/00/0000");
    $(".number-2").mask("00");
    $(".number-6").mask("000000");
    $('.money').mask("#.##0,00", {reverse: true});
    $('.money-two').mask('000.000.000.000.000,000', {reverse: true});
    
});

function isValidDate(date){
  var data = date.substring(0, 10);
  data = data.split("/");
  if( parseInt(data[0]) <= 0 || parseInt(data[0]) > 31 || parseInt(data[1]) <= 0 || parseInt(data[1]) > 12 || parseInt(data[2]) < 1000 ){
      return false;
  }else{
      return true;
  }
};

function formatDateBase(data){
  var data = data.substring(0, 10);
  data = data.split("/");
  return data[2]+"-"+data[1]+"-"+data[0];
}

function formatDate(data){
  var data = data.substring(0, 10);
  data = data.split("-");
  return data[2]+"/"+data[1]+"/"+data[0];
}

function loading(){
    $("body").css("pointer-events", "none");
    $("#modalLoading").modal('show');
};

function end(){
    $("body").css("pointer-events", "all");
    $("#modalLoading").modal('hide');
}

function aviso(mensagem){
    $(".mensagem-aviso").empty();
    for( var i=0; i<mensagem.length; i++ ){
        $(".mensagem-aviso").append("<p>"+mensagem[i]+"</p>");
    }
    
    $("#modalAviso").modal('show');
}

function aviso_sucesso(mensagem){
    $(".mensagem-aviso-sucesso").empty();
    for( var i=0; i<mensagem.length; i++ ){
        $(".mensagem-aviso-sucesso").append("<p>"+mensagem[i]+"</p>");
    }
    
    $("#modalAvisoSucesso").modal('show');
}

function guardaPagina(pagina){
    window.sessionStorage.setItem("pg", pagina);
}

function pagination(total, pagina, url){
    $(".pagination").empty();
    var quantidade = parseInt(total/10);
    
    if( quantidade > 0 ){
        $(".pagination").append("<li class='page-item'><a href='"+url+"?pg=1' class='page-link'><</a></li>");
        for( var i=0; i<(quantidade+1); i++ ){
            var index = i+1;
            if( pagina == index ){
                $(".pagination").append("<li class='page-item active'><a href='"+url+"?pg="+index+"' class='page-link'>"+index+"</a></li>");
            }else{
                $(".pagination").append("<li class='page-item'><a href='"+url+"?pg="+index+"' class='page-link'>"+index+"</a></li>");
            }
        }
        $(".pagination").append("<li class='page-item'><a href='"+url+"?pg="+i+"' class='page-link'>></a></li>");
    }
    
}