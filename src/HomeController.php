<?php

namespace Src;

use App\Controller;

class HomeController extends Controller
{
    public function execute()
    {
        $this->view->render('main');
    }
}