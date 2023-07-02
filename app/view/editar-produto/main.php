    <!-----------------------------------------Formulário Inicio---------------------------------->
    <div class="row col-lg-8 d-flex justify-content-center mt-4 pb-5">
      <form class="bg-white col-lg-8 p-2" method="POST" id="form_updat" action="http://localhost/mercado/produto/putUpdate">
        <span id="numberId" class="text-center"></span>
      <h4 class="font-weight-bold text-muted mt-3 text-center">Editar Produtos</h4>
        <div class="form-row mt-3">
          <div class="form-group col-lg-12" id="desc">
            <input type="text" class="form-control form-control-sm rounded-0" name="descricao"  id="descricao">
          </div>
          <div class="form-group col-lg-12">
            <input  type="number" step="0.01" class="form-control form-control-sm rounded-0" name="valor_produto"  id="valor_produto">
          </div>
          <div class="form-group col-lg-12">
            <input type="number" class="form-control form-control-sm rounded-0" name="estoque"  id="estoque">
          </div>
          <div class="col-lg-6">
          <input type="hidden" id="inputId" name="id" value="">
          </div>
          <button type="submit" class="btn btn-primary buttons mb-3 mt-3 col-lg-12" id="btn-submit">Enviar</button>
      </form>
    </div>
    <!-----------------------------------------Formulário Fim---------------------------------------->
    <script src="<?php echo DIRLIB . 'jQuery/jquery-3.6.1.min.js' ?>"></script>


















