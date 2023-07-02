
  $(document).ready(function() {

   //----------------Formulário Cadastro pedido-------------------//

   // esconde o botão remover do primeiro produto
   $(".remover-produto").first().hide();

   // calcula o total inicial
   calcularTotal();

   // adiciona um novo produto ao clicar no botão adicionar
   $(".adicionar-produto").click(function() {
     // clona o primeiro produto
     var novoProduto = $(".produto").first().clone();

     // limpa os valores dos inputs
     novoProduto.find("input").val("");

     // mostra o botão remover
     novoProduto.find(".remover-produto").show();

     // adiciona o novo produto ao div produtos
     $("#produtos").append(novoProduto);
   });

   // remove um produto ao clicar no botão remover
   $(document).on("click", ".remover-produto", function() {
     // remove o elemento pai do botão clicado (o produto)
     $(this).parent().remove();

     // recalcula o total
     calcularTotal();
   });

   // recalcula o total ao mudar a quantidade ou o valor de um produto
   $(document).on("change", ".quantidade, .valor", function() {
     calcularTotal();
   });
   });

 function calcularTotal() {
   // inicializa a variável total com zero
   var total = 0;

   // percorre todos os produtos
   $(".produto").each(function() {
     // obtém a quantidade e o valor do produto como números
     var quantidade = Number($(this).find(".quantidade").val());

     var valor = Number($(this).find(".valor").val());    

     // multiplica a quantidade pelo valor e soma ao total
     total += quantidade * valor;
   });

   // arredonda o total para duas casas decimais
   valor_total = total.toFixed(2);
   // atualiza o valor do input total
   $("#total").val(valor_total);
  }

      // // Inicializa o contador
      // var counter = 1;
      // // Adiciona o evento de click ao elemento div
      // $("#div1").click(function(){
      //     // Incrementa o contador
      //     counter++;
      //     // Gera o novo id usando o contador
      //     var newId = "div" + counter;
      //     // Altera o id do elemento div para o novo valor
      //     $(this).attr("id", newId);
      // });
  
//################### Insere dados cadastro ##################//
$("#form_pedido").on("submit", function (event) {
    event.preventDefault(event);

    var DIRPAGE = document.createElement('a');
    DIRPAGE.href = window.location.href + "/cadastrarProduto"

       var produto = $(`#produto`).val();
       var quantidade = $(`#quantidade`).val();
       var valor = $(`#valor`).val();

       objData = new Object();
       objData.id_pedido = 3;
       objData.produto = produto;
       objData.unidade = quantidade;
       objData.valor_unidade = valor;
       objData.valor_total = valor_total;

       $.ajax({
          //url: DIRPAGE,
          url:'http://localhost/mercado/pedido/toCreate',
          data: objData,
          method: "POST",
          dataType: "json",
          success: function (obj) {

             Swal.fire({
                title: obj.result.msg,
                text: '',
                type: 'success',
                confirmButtonText: 'Ok',
                allowOutsideClick: false,
             })
          },
          error: function (xhr, ajaxOptions, thrownError) {
             var erroJson = JSON.stringify(xhr);
             alert("ERRO! Buscar risco/afetação " + thrownError + "-" + erroJson);
             //var msgLog = 'Buscar risco/afetação , ERRO :' + erroJson;
             //var acaoLog = "erro_ajax";
             //gravarLog(msgLog, acaoLog);
          }
       })
  });



  