<?php

namespace Src\Interfaces;

interface InterfaceView
{
    public function setTitle($title);
    public function setDescription($description);
    public function setDir($dir);
    public function setKeywords($keywords);
    public function renderLayout();
}
