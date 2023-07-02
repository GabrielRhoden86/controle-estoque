//################ CONTROI TABELA ################//
$(document).ready(function() {

    constroiTabProduto();
  
   function  constroiTabProduto(){
      tabelaOcorAtivas = $('#example').DataTable({
      scrollX: true,
         dom: '<"html5buttons"B>lTfgitp',
         language: {
           url: "<?php echo DIRLIB . 'DataTables/pt_br.json' ?>"
         }
      });     
    }
  
  //############### DADOS TABELA PRODUTO ##################//
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

         constroiTabProduto();

         $('#spinnerBox').removeClass('spinner-border');
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
  