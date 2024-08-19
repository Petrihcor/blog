<?php

namespace Src;

use App\Controller;
use Src\classes\User;

class UsersController extends Controller
{
    public function index()
    {
        $usersdata = $this->database->findall('users');
        $users = [];

        foreach ($usersdata as $userdata) {
            $users[] = new User($userdata['id'], $userdata['name'], $userdata['email'], $userdata['password']);
        }

        $this->view->render('users', [
            'users' => $users
        ]);
    }

    public function showUser($id)
    {
        $userdata = $this->database->find('users', [
            'id' => $id
        ]);
        $user = new User($userdata['id'], $userdata['name'], $userdata['email'], $userdata['password']);
        $this->view->render('user', [
            "user" => $user
        ]);
    }
    
}