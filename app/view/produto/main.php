<div class="row col-md-12">
  <div class="col-md-12 button-cadastro">
    <a type="button" href="<?php echo DIRPAGE . "cadastro-produto"; ?>" class="  btn btn-primary mt-2 mr-5 float-right font-weight-bold text-light"><i class="bi bi-plus"></i>
      </i>
    </a>

    <div class="container table-produto">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-hover text-center bg-white">
            <thead>
              <tr>
                <th class="sub-title-tab" style="width:10%;">Id usuário</th>
                <th>Imagem</th>
                <th>Nome</th>
              </tr>
            </thead>
            <tbody id="table-body">
      ->
            </tbody>
          </table>
        </div>
        <div id="pagination" class="pagination   ml-auto mb-2"></div>
      </div>
    </div>

    <div class="mask-loading">
      <img id="img-gif" src="public/gif/spinner.gif" alt="carregando..." width="100" height="100">
      <!-- <span class="loading-text"><span class="mr-3">Carregando...</span> -->
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