<?php

namespace App\Controller;

use Exception;
use Src\Classes\ClassRender;
use App\Model\ClassCadastroImagem;
use Src\Interfaces\InterfaceView;

class ControllerCadastroImagem extends ClassCadastroImagem
{
    protected $id;
    protected $descricao;
    protected $id_produto;
    protected $imagem_produto;

    use \Src\Traits\TraitUrlParse;

    public function __construct()
    {
            $render = new ClassRender();
            $render->setTitle("Cadastro imagem");
            $render->setDescription("Faça seu upload");
            $render->setKeywords("Cadastro de Imagem");
            $render->setDir("upload");
            $render->renderLayout();
        
    }

    public function recVariaveis()
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

         isset($dados['id']) ? $this->id = $dados['id'] : "Falha Id";
         isset($dados['id_produto']) ? $this->id_produto = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";
         isset($dados['descricao']) ? $this->descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS) : "FALHA POST";

    }

  
    function uploadImages(){

      $this-> recVariaveis();

      $this->imagem_produto = $_FILES['imagem_produto'];

      for($count= 0; $count < count($this->imagem_produto["name"]); $count++){
    
          $destino = "C:/xampp/htdocs/mercado/public/img/img_produto/".$this->imagem_produto["name"][$count];
    
        if(move_uploaded_file($this->imagem_produto['tmp_name'][$count],$destino)){

           
          if( $this->descricao !== ""){  
            echo "<script>Swal.fire({
                title: 'Imagem Cadastrada com sucesso!',
                    text: '',
                    type: 'success',
                    confirmButtonText: 'Ok',
                    allowOutsideClick: false,
                  })</script>";
                }
             }
           }

     parent::cadastroImagem($this->id_produto, $this->descricao,  $this->imagem_produto);

    }
  
    public function deletar()
    {
        $this->recVariaveis();

        foreach ($this->id as $idDelete):
            $this->deletarProduto($idDelete);
        endforeach;
    }

}
