<?php

namespace Src\Classes;

use Src\Traits\TraitUrlParse;

class ClassRoutes
{
    use TraitUrlParse;

    private $rota;

    #Método de retorno da Rota
    public function getRota()
    {
        $url = $this->parseUrl();

        $i = $url[0];

        $this->rota = array(
            "" => "ControllerHome",
            "home" => "ControllerHome",
            "editar-produto" => "ControllerEditarProduto",
            "produto" => "ControllerProduto",
            "upload" => "ControllerCadastroImagem",
            "cadastro-produto" => "ControllerCadastroProduto",
            "pedido" => "ControllerPedido",
            "cadastro-pedido" => "ControllerCadastroPedido",
            "erro404" => "ControllerError404"
        );

        if (array_key_exists($i, $this->rota)) {

            if (file_exists(DIRREQ . "app/controller/{$this->rota[$i]}.php")) {

                return $this->rota[$i];
                
            } else {

                return "ControllerHome";
            }
     }
          else {
            return "ControllerError404";
        }
    }
}
