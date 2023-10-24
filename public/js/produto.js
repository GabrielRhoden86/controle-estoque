//################ CONTROI TABELA ################//
$(document).ready(function () {
  //Captura ID Delete
  $("#example").on("click", "td", function (event) {
    var id = $(this).attr("id");
    $("#id").val(id)
  });


constroiTabProduto();
function constroiTabProduto() {
  tabelaOcorAtivas = $('#example').DataTable({
    scrollX: true,
    dom: '<"html5buttons"B>lTfgitp',
    language: {
      url: "file:///C:/xampp/htdocs/controle-estoque/public/lib/DataTables/pt_br.json"
    }
  });
}

listarProdutos();

$('.mask-loading').show();

function listarProdutos() {

  var DIRPAGE = document.createElement('a');
  DIRPAGE.href = window.location.href + "/getRead";

  objData = new Object();
  $.ajax({
    url: DIRPAGE,
    method: "POST",
    data: objData,
    dataType: "json",
    success: function (obj) {
      tabelaOcorAtivas.destroy();

      //################ PAGINAÇÃO ################//
      let dados = obj.result.itemsLoja;

      // Converter os dados para o formato desejado
      let data = [{
        codigo_produto: dados.productCode,
        nome: dados.productName,
        tags: [dados.productLine, dados.productDescription]
      }];

      var rowsPerPage = 5;
      var totalPages = Math.ceil(data.length / rowsPerPage);
      var currentPage = 1;

      function updateTable() {
        $("#table-body").empty();

        var start = (currentPage - 1) * rowsPerPage;
        var end = start + rowsPerPage;

        for (var i = start; i < end && i < data.length; i++) {
          var row = $("<tr></tr>");
          row.append($("<td></td>").text(data[i].codigo_produto));
          row.append($("<td></td>").text(data[i].nome));
          row.append($("<td></td>").text(data[i].tags.join(", ")));

          $("#table-body").append(row);
        }

        $("#pagination").empty();

        for (var i = 1; i <= totalPages; i++) {
          var li = $("<li></li>").addClass("page-item");
          if (i == currentPage) {
            li.addClass("active");
          }
          var a = $("<a></a>").addClass("page-link").text(i).attr("href", "#");
          li.append(a);
          $("#pagination").append(li);
        }
      }

      updateTable();

      $("#pagination").on("click", "a", function (event) {
        event.preventDefault();
        currentPage = parseInt($(this).text());
        updateTable();
      });

      constroiTabProduto();

      $('.mask-loading').hide();

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
