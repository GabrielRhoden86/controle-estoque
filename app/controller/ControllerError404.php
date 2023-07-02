<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerError404 extends ClassRender implements InterfaceView
{
    public function __construct()
    {
        $this->setTitle("Página não encontrada");
        $this->setDescription("Este é nosso site MVC");
        $this->setDir("erro404");
        $this->setKeywords("mvc completo, curso de mvc, website");
        $this->renderLayout();
}
 
}
