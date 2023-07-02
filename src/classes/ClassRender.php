<?php

namespace Src\Classes;

// use App\Controller\ControllerHome;

class ClassRender 
{
    private $dir;
    private $title;
    private $description;
    private $keywords;

    public function getDir()
    {
        return $this->dir;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    #Renderizando layout
    public function renderLayout()
    {
        include_once(DIRREQ . "app/view/Layout.php");
    }

    #Adicionando conteúdos - head, header, main e footer.
    public function  addHead()
    {
        if (file_exists(DIRREQ . "app/view/{$this->getDir()}/head.php")) {
            include_once(DIRREQ . "app/view/{$this->getDir()}/head.php");
        }
    }

    public function  addHeader()
    {
        if (file_exists(DIRREQ . "app/view/{$this->getDir()}/header.php")) {
            include_once(DIRREQ . "app/view/{$this->getDir()}/header.php");
        }
    }

    public function  addMain()
    {
        if (file_exists(DIRREQ . "app/view/{$this->getDir()}/main.php")) {
            include_once(DIRREQ . "app/view/{$this->getDir()}/main.php");
        }
    }

    public function  addFooter()
    {
        if (file_exists(DIRREQ . "app/view/{$this->getDir()}/footer.php")) {
            include_once(DIRREQ . "app/view/{$this->getDir()}/footer.php");
        }
    }
    
}
