    <!---------------------------------------------------Formulário Inicio--------- ---------------------------------------->
    <div class="row col-lg-6 d-flex justify-content-center mt-5 pb-5">
        <form class="bg-white col-lg-8 p-2"   action="http://localhost/mercado/upload/uploadImages"  method="POST" enctype="multipart/form-data" id="form_produto">
      <h4 class="font-weight-bold text-muted mt-3 text-center">Upload Imagens Produto</h4>
        <div class="form-row mt-4">
        <div class="form-group col-lg-12">
            <input  type="hidden" class="form-control form-control-sm rounded-0" name="id_produto" value="12" id="id">
          </div>
          <div class="form-group col-lg-12">
            <input type="text" class="form-control form-control-sm rounded-0" name="descricao" required id="descricao" placeholder="Descrição">
          </div>  
          <div class="form-group col-lg-12">
            <!-- <input  type="file" class="form-control  form-control-sm rounded-0" name="imagem_produto" multiple="multiple"  id="button_imagem"> -->
            <input  type="file" class="form-control  form-control-sm rounded-0" name="imagem_produto[]" multiple="multiple"  id="button_imagem">
          </div>
          <div class="col-lg-6">
          </div>
          <button type="submit" name="sendImage" class="btn btn-primary buttons mb-3 mt-3 col-lg-12" id="btn-submit">Enviar</button>
      </form>
    </div>
    <!---------------------------------------------------Formulário Fim---------------------------------------------------->











<style>
    .form-control{
    background-color: #F3F3F4 !important;
    border:none;
    }
</style>
