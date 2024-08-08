<?php

namespace Src;

use App\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $this->view->render('main');
    }
}