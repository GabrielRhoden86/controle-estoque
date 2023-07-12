<script src="<?php echo DIRLIB. "jQuery/jquery-3.6.1.min.js"; ?>"></script>
<script src="<?php echo DIRJS.'pedido.js'?>"></script>
<script src="<?php echo DIRLIB . 'DataTables/datatables.min.js' ?>"></script>



<script>
  //################## ControiTabela Pedido ######################
   $(document).ready(function() {
      function  constroiTabPedido(){
   
       tabelaOcorAtivas = $('#example').DataTable({
         scrollX: true,
         dom: '<"html5buttons"B>lTfgitp',
         language: {
           url: "<?php echo DIRLIB . 'DataTables/pt_br.json' ?>"
         }
        });
        
       }
       constroiTabPedido();

      });     

     listarPedido();

 //################## Tabela Pedido ######################
$(document).ready(function() {

   function listarPedido() {
   var DIRPAGE = document.createElement('a');
   DIRPAGE.href = window.location.href + "/seleciona";
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
         constroiTabPedido();
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
</script>
