<?php

namespace Src\Traits;

trait TraitUrlParse
{
    public function parseUrl()
    {
        return explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);
    }

}
