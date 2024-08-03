<?php

namespace App;

class View
{
    public function render(string $view, array|null $data = null)
    {
        if (is_array($data)) {
            extract($data);
        }
        return require_once __DIR__ . "/../views/$view.tpl.php";
    }

}