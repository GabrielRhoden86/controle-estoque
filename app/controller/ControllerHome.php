<?php

namespace App\Controller;

use Exception;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerHome extends ClassRender implements InterfaceView
{
    public function __construct()
    {
        $this->setTitle("Página Inícial");
        $this->setDescription("Este é nosso site MVC");
        $this->setDir("home");
        $this->setKeywords("mvc completo, curso de mvc, website");
        $this->renderLayout();
}
 
}
