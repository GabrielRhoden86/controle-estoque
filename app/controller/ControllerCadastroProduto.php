<?php

namespace App\Controller;
use Exception;
use Src\Classes\ClassRender;
use App\Model\ClassProduto;
use Src\Interfaces\InterfaceView;

class ControllerCadastroProduto extends ClassProduto
{

    protected $id;
    protected $descricao;
    protected $valor_produto;
    protected $estoque;

    use \Src\Traits\TraitUrlParse;

    public function __construct()
    {
        $render = new ClassRender();
        $render->setTitle("Cadastro Produto");
        $render->setDescription("Faça seu cadastro");
        $render->setKeywords("Cadastro de Produto, cadastro");
        $render->setDir("cadastro-produto");
        $render->renderLayout();
        
    }
}
