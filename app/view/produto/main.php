<div class="row col-md-12">
  <div class="col-md-12 button-cadastro">
   <a type="button" href="<?php echo DIRPAGE . "cadastro-produto"; ?>" class=" btn btn-primary mt-2 mr-5 float-right font-weight-bold text-light"><i class="bi bi-plus"></i>
</i>
</a>
   </div>
    <div class="text-center mt-3 col-md-12">
     <div class="tab-content pb-0 e-flex mt-0 col-md-12 rounded">
      <div id="home" class="container tab-pane bg-white active">
        <h4 class="font-weight-bold text-muted p-3">Lista de Produtos</h4>
        <span id="spinnerBox" class="spinner-border text-primary" role="status">
        </span>
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
            <tr class="title_tab" id="linhaCab">
              <th>#</th>
              <th>#</th>
              <th>#</th>
              <th>#</th>
              <th>#</th>
              <th>#</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody id="linhaTab">
            <td>#</td>
            <td>#</td>
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
  <!--------------------modal---------------------->
 <div class="container d-flex justify-content-center">
  <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content border-0">
        <div class="modal-body p-0">
          <div class="card border-0 p-sm-3 p-2 justify-content-center">
            <div class="card-header pb-0 bg-white border-0 ">
              <div class="row">
                <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
                </div>
              </div>
              <p class="font-weight-bold mb-2"> Tem certeja que deseja excluir o produto?</p>
            </div>
            <form id="formDelete" action="http://localhost/controle-estoque/produto/deleting" method="POST">
              <p class="text-muted p-1">
                <input class="mr-2 ml-3" type='checkbox' id='id' name='id[]' value=''>Marque esta opção para excluir o produto.
              </p>
              <span id="msgDelete"></span>
              <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                <div class="row justify-content-end no-gutters">
                  <div class="col-auto">
                    <button type="button" class="btn btn-light text-muted mr-2" data-dismiss="modal">Cancel</button>
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

