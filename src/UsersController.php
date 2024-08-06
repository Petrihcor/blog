<?php

namespace Src;

use App\Controller;

class UsersController extends Controller
{
    public function execute()
    {
        $usersdata = $this->database->findall('users');

        $this->view->render('main', [
            'usersdata' => $usersdata
        ]);
    }
}