<?php
namespace App\Controller;

use Src\Classes\ClassRender;

class ControllerCadastroPedido 
{
   
    use \Src\Traits\TraitUrlParse;

    public function __construct()
    {
            $render = new ClassRender();
            $render->setTitle("Cadastro Produto");
            $render->setDescription("Faça seu cadastro");
            $render->setKeywords("Cadastro de Pedido, cadastro");
            $render->setDir("cadastro-pedido");
            $render->renderLayout();
      }
    }
