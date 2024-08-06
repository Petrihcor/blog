<?php

namespace App;

class Session
{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function end()
    {
        session_destroy();
    }
}