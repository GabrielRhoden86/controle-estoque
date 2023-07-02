<?php

namespace App\Controller;

use Exception;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerEditarProduto extends ClassRender implements InterfaceView
{
    protected $id;
    protected $descricao;
    protected $valor_produto;
    protected $estoque;

    public function __construct()
    {
        $render = new ClassRender();
        $render->setTitle("Editar Produtos");
        $render->setDescription("Atualize os Dados");
        $render->setKeywords("Produtos,Editar");
        $render->setDir("editar-produto");    
        $render->renderLayout();
    }    
}





