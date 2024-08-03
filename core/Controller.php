<?php

namespace App;

abstract class Controller
{
    protected View $view;

    /**
     * @param View $view
     */
    public function __construct()
    {
        $this->view = new View();
    }


}