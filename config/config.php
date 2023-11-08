<?php

$pastaInterna = "controle-estoque/";

define("DIRPAGE", "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");

#Definindo a url raiz do projeto
if (substr($_SERVER['DOCUMENT_ROOT'], -1) == "/") {
    define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}{$pastaInterna}");
} else {
    define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}");
}

define("DIRLIB", DIRPAGE . "public/lib/");
define("DIRIMG", DIRPAGE . "public/img/");
define("DIRCSS", DIRPAGE . "public/css/");
define("DIRJS", DIRPAGE . "public/js/");
define("DIRFONTES", DIRPAGE . "public/fontes/");
define("DIRDS", DIRPAGE . "public/desing/");

#Banco de Dados
define("HOST", "localhost");
define("DB", "classicmodels");
define("USER", "root");
define("PASS", "");
