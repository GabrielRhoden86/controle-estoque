//################ CONTROI TABELA ################//

$(document).ready(function() {
    //Captura ID Delete
    $("#example").on("click", "td", function(event) {
      var id = $(this).attr("id");
      $("#id").val(id)
    });
  

  constroiTabProduto();
function  constroiTabProduto(){
   tabelaOcorAtivas = $('#example').DataTable({
      scrollX: true,
      dom: '<"html5buttons"B>lTfgitp',
      language: {
        url: "file:///C:/xampp/htdocs/controle-estoque/public/lib/DataTables/pt_br.json"
      }
   });     
  }

listarProdutos();
function listarProdutos() {

    $('#spinnerBox').addClass('spinner-border');

  var DIRPAGE = document.createElement('a');
  DIRPAGE.href = window.location.href + "/getRead";
  objData = new Object();
  $.ajax({
      url: DIRPAGE,
      method: "POST",
      data: objData,
      dataType:"json",
     success: function (obj) {

       tabelaOcorAtivas.destroy();
       $("#linhaCab").html(obj.result.tabCab);
       $("#linhaTab").html(obj.result.tabLinha);
     //  $('#spinnerBox').removeClass('spinner-border');
       constroiTabProduto();
    },
    error: function (xhr, ajaxOptions, thrownError) {
       var erroJson = JSON.stringify(xhr);
       alert("ERRO! Buscar risco/afetação " + thrownError + "-" + erroJson);
       //var msgLog = 'Buscar risco/afetação , ERRO :' + erroJson;
       //var acaoLog = "erro_ajax";
       //gravarLog(msgLog, acaoLog);
    }
   });
  } 
});