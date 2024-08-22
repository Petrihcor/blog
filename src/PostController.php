<?php

namespace Src;

use App\Controller;
use Src\classes\Post;

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

    public function showPosts()
    {
        $postsdata = $this->database->findall('posts');
        $posts = [];
        foreach ($postsdata as $postdata) {
            $posts[] = new Post($postdata['id'], $postdata['title'], $postdata['content'], $postdata['date'], $postdata['updateDate'], $postdata['author_id']);
        }
        $this->view->render('posts', [
            'posts' => $posts
        ]);
    }
    public function showPost() {
        $postdata = $this->database->find('posts', [
            'id' => $_GET["id"]
        ]);
        $post = new Post($postdata['id'], $postdata['title'], $postdata['content'], $postdata['date'], $postdata['updateDate'], $postdata['author_id']);
        $this->view->render('post', [
            'post' => $post
        ]);

    }
}