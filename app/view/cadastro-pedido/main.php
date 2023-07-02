  <div class="container col-md-8">
    <h4 class="text-muted text-center mt-3">Cadastrar Pedido</h4>
    <form action="pedido.php" method="post" id="form_pedido">
      <div id="produtos" >
        <div class="form-group produto p-3" style="border:solid #cfcfd1 2px">
          <label for="produto">Produto:</label>
          <select id="produto" name="produto[]" class="form-control">
            <option value="Guaraná 2 Litros">Guaraná 2 Litros</option>
            <option value="Leite 1 Litro">Leite 1 Litro</option>
            <option value="Arroz 2 kg">Arroz 2 kg</option>
            <option value="Café 1 KG">Café 1 KG</option>
            <option value="Sal">Sal</option>
          </select>
          <label for="quantidade">Quantidade:</label>
          <input type="number" id="quantidade" name="quantidade[]" class="form-control quantidade" min="1" required>
          <label for="valor">Valor:</label>
          <input type="number" id="valor" name="valor[]" class="form-control valor" min="0" step="0.01" required>
          <button type="button" class="btn btn-danger remover-produto mt-3">Remover</button>
        </div>
      </div>
      <button type="button" id=""class="btn btn-primary adicionar-produto mb-3">Adicionar mais um produto</button>
      <div class="form-group">
        <label for="total">Total:</label>
        <input type="number" id="total" name="total" class="form-control" readonly>
      </div>
      <input type="submit" value="Enviar pedido" class="btn btn-success">
    </form>
  </div>

  
