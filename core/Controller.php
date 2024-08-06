<?php

namespace App;

abstract class Controller
{
    protected View $view;

    protected Database $database;

    protected Session $session;

    /**
     * @param View $view
     */
    public function __construct()
    {
        $this->database = new Database();
        $this->view = new View();
        $this->session = new Session();
    }

    public function redirect(string $path)
    {
        header('Location: ' . $path);
        exit;
    }

}