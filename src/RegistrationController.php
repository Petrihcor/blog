<?php

namespace Src;

use App\Controller;

class RegistrationController extends Controller
{
    public function execute()
    {
        $this->view->render('registration');
    }

    public function register()
    {
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $this->database->add("users", [
            'id' => NULL,
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $hashedPassword
        ]);
        $this->redirect("/");
    }
}