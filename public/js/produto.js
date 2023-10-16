//################ CONTROI TABELA ################//

$(document).ready(function() {
    //Captura ID Delete
    $("#example").on("click", "td", function(event) {
      var id = $(this).attr("id");
      $("#id").val(id)
    });
  

  constroiTabProduto();
function  constroiTabProduto(){
   tabelaOcorAtivas = $('#example').DataTable({
      scrollX: true,
      dom: '<"html5buttons"B>lTfgitp',
      language: {
        url: "file:///C:/xampp/htdocs/controle-estoque/public/lib/DataTables/pt_br.json"
      }
   });     
  }

listarProdutos();

function listarProdutos() {

    $('#spinnerBox').addClass('spinner-border');

  var DIRPAGE = document.createElement('a');
  
  DIRPAGE.href = window.location.href + "/getRead";
  objData = new Object();
  $.ajax({
      url: DIRPAGE,
      method: "POST",
      data: objData,
      dataType:"json",
     success: function (obj) {

       alert(obj.result.tabLinha);
       

       tabelaOcorAtivas.destroy();

       $("#linhaCab").html(obj.result.tabCab);
       $("#linhaTab").html(obj.result.tabLinha);
     //  $('#spinnerBox').removeClass('spinner-border');
       constroiTabProduto();
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


$(document).ready(function() {

  let data = [{
      id_usuario: 1,
      nome: "Nome do Usuário 1",
      tags: ["tag1", "tag2", "tag3"]
    },
    {
      id_usuario: 2,
      nome: "Nome do Usuário 2",
      tags: ["tag4", "tag5", "tag6"]
    },
    {
      id_usuario: 3,
      nome: "Nome do Usuário 3",
      tags: ["tag7", "tag8", "tag9"]
    },
    {
      id_usuario: 4,
      nome: "Nome do Usuário 4",
      tags: ["tag10", "tag11", "tag12"]
    },
    {
      id_usuario: 5,
      nome: "Nome do Usuário 5",
      tags: ["tag13", "tag14", "tag15"]
    },
    {
      id_usuario: 6,
      nome: "Nome do Usuário 6",
      tags: ["tag16", "tag17", "tag18"]
    },
    {
      id_usuario: 7,
      nome: "Nome do Usuário 7",
      tags: ["tag19", "tag20", "tag21"]
    },
    {
      id_usuario: 8,
      nome: "Nome do Usuário 8",
      tags: ["tag22", "tag23", "tag24"]
    }
  ];


  var rowsPerPage = 5;
  var totalPages = Math.ceil(data.length / rowsPerPage);
  var currentPage = 1;

  function updateTable() {
    $("#table-body").empty();

    var start = (currentPage - 1) * rowsPerPage;
    var end = start + rowsPerPage;

    for (var i = start; i < end && i < data.length; i++) {
      var row = $("<tr></tr>");
      row.append($("<td></td>").text(data[i].id_usuario));
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

  $("#pagination").on("click", "a", function(event) {
    event.preventDefault();
    currentPage = parseInt($(this).text());
    updateTable();
  });
});
