<?php

namespace Src;

use App\Controller;

class PostController extends Controller
{
    public function index()
    {

        $this->view->render('createPost');
    }

    public function addPost()
    {
        $this->database->add("posts", [
            "title" => $_POST['title'],
            "content" =>$_POST['content'],
            "author_id" => $_POST['author_id'],
            "date" => date('Y-m-d H:i:s'),
            "updateDate" => date('Y-m-d H:i:s')
        ]);
        $this->redirect("/");
    }
}