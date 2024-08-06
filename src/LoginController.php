<?php

namespace Src;

use App\Controller;
use Src\classes\User;

class LoginController extends Controller
{
    public function execute()
    {
        $this->view->render('login');
    }

    public function login()
    {
        $userdata = $this->database->find("users", [
            'email' => $_POST['email']
        ]);
        if (password_verify($_POST['password'], $userdata['password'])){
            $user = new User($userdata['id'], $userdata['name'], $userdata['email'], $userdata['password']);
            $this->session->set('name', $user->getName());
            $this->session->set('email', $user->getEmail());

            $this->redirect("/");

        } else {
            echo "Пользователя не существует";
        }
    }

    public function logout()
    {
        $this->session->end();
        $this->redirect("/");
    }
}