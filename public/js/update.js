

//################### Form Cadastro ##################//
$(document).ready(function () {

    var DIRPAGE = document.createElement('a');
    DIRPAGE.href = window.location.href;
    var url = new URL(DIRPAGE); 
    var id = url.searchParams.get("id"); 
    var descricao = url.searchParams.get("descricao"); 
    var valor_produto = url.searchParams.get("valor_produto"); 
    var estoque = url.searchParams.get("estoque"); 

    var validaDesc =  $("#descricao").val();
    var validaProduto =  $("#valor_produto").val();
    var validaEstoque =  $("#estoque").val();

    
     $("#descricao").attr("placeholder", "Descrição: "+descricao); 
     $("#valor_produto").attr("placeholder", "Valor: "+valor_produto); 
     $("#estoque").attr("placeholder", "Estoque: "+estoque); 
     $("#numberId").html("ID:"+id).css("color","gray");
     $("#inputId").attr("value", id); 

      if(validaDesc == ""){
        $("#descricao").attr("value", descricao);
        $("#descricao").attr("placeholder", "Descrição:"); 
        }
      
      if(validaProduto == ""){
         $("#valor_produto").attr("value", valor_produto);
         $("#valor_produto").attr("placeholder", "Valor:"); 
      }

      if(validaEstoque == ""){
         $("#estoque").attr("value", estoque);
         $("#estoque").attr("placeholder", "Estoque:"); 
      }


   //  $("#form_update").on("submit", function () {
  
   //     event.preventDefault();
   //     var DIRPAGE = document.createElement('a');
   //     DIRPAGE.href = window.location.href + "/updateDate";
   
   //        objData = new Object();
   //        objData.id = id;
   //        objData.descricao = descricao;
   //        objData.valor_produto = valor_produto;
   //        objData.estoque = estoque;
  
   //        $.ajax({
   //           url: "http://localhost/mercado/editar/updateDate",
   //           data: objData,
   //           method: "POST",
   //           dataType: "json",
   //           success: function (obj) {
  
   //              Swal.fire({
   //                 title: obj.result.msg,
   //                 text: '',
   //                 type: 'success',
   //                 confirmButtonText: 'Ok',
   //                 allowOutsideClick: false,
   //              })
  
   //              //----Limpar Inputs e Divs------//
   //              $("#descricao").val("");
   //              $("#valor_produto").val("");
   //              $("#estoque").val("");
          
   //           },
   //           error: function (xhr, ajaxOptions, thrownError) {
   //              var erroJson = JSON.stringify(xhr);
   //              alert("ERRO! Buscar risco/afetação " + thrownError + "-" + erroJson);
   //              //var msgLog = 'Buscar risco/afetação , ERRO :' + erroJson;
   //              //var acaoLog = "erro_ajax";
   //              //gravarLog(msgLog, acaoLog);
   //           }
   //        })
   //      });
     });

  

