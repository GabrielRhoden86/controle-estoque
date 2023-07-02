<div class="row col-md-12">
  <div class="text-center mt-3 col-md-12">
    <script src="<?php echo DIRLIB . "jQuery/jquery-3.6.1.min.js"; ?>"></script>
    <div class="col-md-12">
      <a type="button" href="<?php echo DIRPAGE . "cadastro-pedido"; ?>" class="btn btn-primary mt-2 mr-5 pr-3 float-right font-weight-bold text-light">Cadastrar Pedido</a>
    </div>
    <!------------------------------------------TABELA PEDIDO-------------------------------------------------------->
    <div class="tab-content pb-3 pt-3 e-flex mt-5 col-md-12 rounded">
      <div id="home" class="container tab-pane bg-white active">
        <h4 class="font-weight-bold text-muted p-3">Pedidos</h4>
        <table id="example" class="display nowrap" style="width:100%;">
          <thead>
            <tr class="title_tab" id="cabecalho">
              <th>#</th>
              <th>#</th>
              <th>#</th>
              <th>#</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody id="linhasTab">
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</script>
<!------------------------------------------MODAL DELETE-------------------------------------------------------->
<div class="container d-flex justify-content-center">
  <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content border-0">
        <div class="modal-body p-0">
          <div class="card border-0 p-sm-3 p-2 justify-content-center">
            <div class="card-header pb-0 bg-white border-0 ">
              <div class="row">
                <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
              </div>
              <p class="font-weight-bold mb-2"> Tem certeja que deseja excluir o pedido ?</p>
            </div>
            <form id="formDelete" action="http://localhost/mercado/cadastro/deletar" method="POST">
              <p class="text-muted p-1 mr-2"><input class="ml-2" type='checkbox' id='id' name='id[]' value=''>Marque esta opção para excluir o produto!.</p>
              <span id="msgDelete"></span>
              <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                <div class="row justify-content-end no-gutters">
                  <div class="col-auto">
                    <button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button>
                  </div>
                <div class="col-auto">
              <button type="submit" class="btn btn-danger px-4">Excluir</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="row">
  <div class='container'>
    <form name='formDeletar' id='formDeletar' action="<?php echo  DIRPAGE . 'cadastro/deletar' ?>" method='POST'>
      <div class="cover-spin"></div>
      <table class='table'>
        <tr id="cabecalho">
        </tr>
        <tbody id="linhasTab">
        </tbody>
      </table>
  </div>
  <!-- <button type='submit' class='btn btn-secondary'>Deletar</button> -->
  </form>
</div>
</div>