<?php

namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes
{
    private $method;
    private $param = [];
    private $obj;

    protected function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    protected function getParam()
    {
        return $this->param;
    }

    public function setParam($param)
    {
        $this->param = $param;
    }

    public function __construct()
    {
        self::addController();
    }

    #Método de adição de controller
    public function addController()
    {
        $rotaController =  $this->getRota();
        $nameSpace = "App\\Controller\\{$rotaController}";
        $this->obj = new $nameSpace;

        if (isset($this->parseUrl()[1])) {
            self::addMethod();
        }
    }

    #Método de adição método de controller
    public function addMethod()
    {
        if (method_exists($this->obj, $this->parseUrl()[1])) {
            $this->setMethod("{$this->parseUrl()[1]}");
            self::addparam();
            call_user_func_array([$this->obj, $this->getMethod()], $this->getParam());
        }
    }

    #Método de adição de parâmetros controller
    public function addparam()
    {
        $countArray  = count($this->parseUrl());

        if ($countArray > 1) {
            foreach ($this->parseUrl() as $key => $value) {
                if ($key > 1) {
                    $this->setParam($this->param += [$key=>$value]);
                }
            }
        }
    }
}
