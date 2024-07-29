<?php

namespace App;


class Container
{


    public function __construct()
    {
        $db = new Database();
    }
}