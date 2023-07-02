
$(document).ready(function () {
   $("#example").on("click", "td", function(event){   
     var id = $(this).attr("id");
       $("#id").val(id);
     });
   });
   //############ Listar Dados Tabela Pag Cadastro ###########//
    listarRegistros();

   function listarRegistros() {
      var DIRPAGE = document.createElement('a');
      DIRPAGE.href = window.location.href + "/seleciona";
         objData = new Object();

      $.ajax({
          url: DIRPAGE,
         method: "POST",
         data: objData,
         dataType: "json",
         success: function (obj) {

            $("#cabecalho").html(obj.result.tabCab);
            $("#linhasTab").html(obj.result.tabLinha);
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

//################### Form Cadastro ##################//
$(document).ready(function () {

   $("#formCadastro").on("submit", function (event) {

      event.preventDefault();

      var DIRPAGE = document.createElement('a');

      DIRPAGE.href = window.location.href + "/cadastrar";

      nome = $("#nome").val();
      cidade = $("#cidade").val();
      sexo = $('[name^="sexo"]:checked').val();

      if (nome == "" || cidade == "" || sexo == "") {

         $("#inputVazio").html("Favor Preencher o Formulário").css(
            {
               "color": "red",
               "font-size": "12px"
            });
      } else {

         objData = new Object();
         objData.nome = nome;
         objData.sexo = sexo;
         objData.cidade = cidade;

         $.ajax({
            url: DIRPAGE,
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
            
               //-Listar o novo registro na tabel-//
               listarRegistros();

               //----Limpar Inputs e Divs------//
               $("#inputVazio").html("");
               $("#nome").val("");
               $("#cidade").val("");
               $('[name^="sexo"]').attr('checked', false);
         
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

   //############## Update Pag Cadastro ###########//
   $(document).on('click', '.imageEdit', function () {
      var imgRel = $(".imageEdit").attr('rel');
      alert(imgRel);
   })

});


  //----------Recusar Double click
      //$('formCadastro').preventDoubleSubmit();

      // jQuery.fn.preventDoubleSubmit = function () {
      //    $(this).submit(function () {
      //       if (this.beenSubmitted)
      //          return false;
      //       else
      //          this.beenSubmitted = true;
      //    });
      // };


