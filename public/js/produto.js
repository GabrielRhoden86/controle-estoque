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
        $("#tabelaHeader").html(obj.result.tabelaHeader);

        //alert(obj.msgAcao);

        //#################### INÍCIO PAGINAÇÃO ####################
        var dados = obj.result.itemsLoja;
        var rowsPerPage = 5;
        var totalPages = Math.ceil(dados.length / rowsPerPage);
        var currentPage = 1;
        var maxPagesToShow = 10; // Número máximo de páginas a serem exibidas na paginação.

        function updateTable() {
          $("#table-body").empty();
          var start = (currentPage - 1) * rowsPerPage;
          var end = start + rowsPerPage;

          for (var i = start; i < end && i < dados.length; i++) {
            var row = $("<tr></tr>");
            row.append($("<td></td>").text(dados[i]));
            row.append($("<td></td>").text(dados[i]));
            row.append($("<td></td>").text(dados[i].productCode));
            row.append($("<td></td>").text(dados[i].productName));
            row.append($("<td></td>").text(dados[i].productLine));
          
            row.append(
              $("<td class='p-0'></td>").append(
                  $("<textarea rows='5' cols='60' class='mb-1 p-2 mt-2 text-muted' style='max-width: 100%; width: 100%;'></textarea>").text(dados[i].productDescription)

              )
          );
          
            $("#table-body").append(row);
          }

          $("#pagination").empty();
          var startPage = Math.max(1, currentPage - Math.floor(maxPagesToShow / 2));
          var endPage = Math.min(totalPages, startPage + maxPagesToShow - 1);

          console.log("startPage: " + startPage + " EndPage: " + endPage);

          // Adiciona o botão "Anterior"
          var liPrev = $("<li></li>").addClass("page-item");
          var aPrev = $("<a></a>").addClass("page-link").text("Anterior").attr("href", "#");
          liPrev.append(aPrev);

          $("#pagination").append(liPrev);

          for (var i = startPage; i <= endPage; i++) {
            var li = $("<li></li>").addClass("page-item");
            if (i == currentPage) {
              li.addClass("active");
            }
            var a = $("<a></a>").addClass("page-link").text(i).attr("href", "#");
            li.append(a);

            $("#pagination").append(li);
          }

          // Adiciona o botão "Próximo"
          var liNext = $("<li></li>").addClass("page-item");
          var aNext = $("<a></a>").addClass("page-link").text("Próximo").attr("href", "#");
          liNext.append(aNext);
          $("#pagination").append(liNext);

        }

        updateTable();

        $("#pagination").on("click", "a", function (event) {
          event.preventDefault();
          var text = $(this).text();
          if (text === "Anterior" && currentPage > 1) {
            currentPage--;
          } else if (text === "Próximo" && currentPage < totalPages) {
            currentPage++;
          } else {
            currentPage = parseInt(text);
          }
          updateTable();
        });

        //#################### FIM PAGINAÇÃO ####################
        constroiTabProduto();

        $('.mask-loading').hide();
      },

      error: function (xhr, ajaxOptions) {
        var erroJson = JSON.stringify(xhr);

        //alert("ERRO! listarProdutos risco/afetação " + thrownError + "-" + erroJson);

        Swal.fire({
          title: 'Erro !',
          type: 'warning',
          confirmButtonText: 'Ok',
          confirmButtonClass: 'custom-confirm-button', //através dessa classe é possivel alterar o css
          allowOutsideClick: false,
          width: '900px',
          html: '<div style="max-height:400px; overflow-y: auto;">Erro!' + erroJson + '</div>'
        });
      }
    });
  }
});
