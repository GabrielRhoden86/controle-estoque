
   <!--##################################### FORMULÁRIO CADASTRO ###########################-->
    <div class="row col-lg-8 d-flex justify-content-center mt-5 pb-5">
      <form class="bg-white col-lg-8 p-2" method="POST" id="form_produto">
      <h4 class="font-weight-bold text-muted mt-3 text-center">Cadastro de Produtos</h4>
        <div class="form-row mt-3">
          <div class="form-group col-lg-12">
            <input type="text" class="form-control form-control-sm rounded-0" name="descricao" required id="descricao" placeholder="Descrição">
          </div>
          <div class="form-group col-lg-12">
            <input  type="number" step="0.01" class="form-control form-control-sm rounded-0" name="valor_produto" required placeholder="Valor"  id="valor_produto">
          </div>
          <div class="form-group col-lg-12">
            <input type="number" class="form-control form-control-sm rounded-0" name="estoque" required id="estoque" placeholder="Estoque">
          </div>
          <div class="col-lg-6">
          </div>
          <button type="submit" class="btn btn-primary buttons mb-3 mt-3 col-lg-12" id="btn-submit">Enviar</button>
      </form>
    </div>















<style>
    .form-control{
    background-color: #F3F3F4 !important;
    border:none;
    }
</style>
