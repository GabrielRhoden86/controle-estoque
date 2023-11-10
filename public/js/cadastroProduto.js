  //################### FORM CADASTRO ##################//
  $(document).ready(function () {

    $("#form_produto").on("submit", function (event) {
  
       event.preventDefault(event);
       var DIRPAGE = document.createElement('a');
       DIRPAGE.href = window.location.href + "/toCreate";
    
      descricao = $("#descricao").val();
      valor_produto = $("#valor_produto").val();
      estoque = $("#estoque").val();
  
          objData = new Object();
          objData.descricao = descricao;
          objData.valor_produto = valor_produto;
          objData.estoque = estoque;
  
          $.ajax({
             url:'http://localhost/controle-estoque/produto/toCreate',
             data: objData,
             method: "POST",
             dataType: "json",
             success: function (obj) {
                Swal.fire({
                   title: obj.result.msg,
                   text: 'Produto cadastrado!. Agora cadastre imagens do produto',
                   type: 'success',
                   confirmButtonText: 'Ok',
                  allowOutsideClick: false,          
                }).then (function (result) {
                 if (result.value) {
                   window.location.href = "http://localhost/controle-estoque/upload/?id=2";
                 }
               });

                //----Limpar Inputs e Divs------//
                $("#descricao").val("");
                $("#valor_produto").val("");
                $("#estoque").val("");
             },
             error: function (xhr, ajaxOptions, thrownError) {
                var erroJson = JSON.stringify(xhr);
                //alert("ERRO!! Buscar risco/afetação " + thrownError + "-" + erroJson);
        
                Swal.fire({
                  title: 'Erro !',
                  type: 'warning',
                  confirmButtonText: 'Ok',
                  confirmButtonClass: 'custom-confirm-button', //através dessa classe é possivel alterar o css
                  allowOutsideClick: false,
                  width: '900px',
                  html: '<div style="max-height:400px; overflow-y: auto;">Erro!' + erroJson + '</div>'
                });


             }
          })
        });
     });



    