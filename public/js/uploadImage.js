
//################### Form Cadastro ##################//
$(document).ready(function () {

    $("#form_upload").on("susbmit", function (event) {
  
       event.preventDefault(event);
       var DIRPAGE = document.createElement('a');
       DIRPAGE.href = window.location.href + "/uploadImages";
  
         var descricao = $("#descricao").val();
         var id_produto = $("#id_produto").val();


          objData = new Object();
          objData.id_produto = id_produto;
          objData.descricao = descricao;


  
          $.ajax({
             url: DIRPAGE,
             data: objData,
             method: "POST",
             dataType: "json",
             success: function (obj) {
  
                Swal.fire({
                   title: obj.result.msg,
                   text: '',
                   type: 'success',
                   confirmButtonText: 'Ok',
                  allowOutsideClick: false,          
                });
        
                $("#descricao").val("");
                $("#id_produto").val("");
        
          
             },
             error: function (xhr, ajaxOptions, thrownError) {
                var erroJson = JSON.stringify(xhr);
                alert("ERRO! Buscar risco/afetação " + thrownError + "-" + erroJson);
                //var msgLog = 'Buscar risco/afetação , ERRO :' + erroJson;
                //var acaoLog = "erro_ajax";
                //gravarLog(msgLog, acaoLog);
             }
          })
        });
});
  