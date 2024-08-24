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
        //$postsdata = $this->database->findall('posts');
        $postsdata = $this->database->leftJoin(
            'posts',
            'users',
            [
                'id', 'title', 'date', 'updateDate', 'content'
            ],
            [
                'name'
            ],
            'author_id',
            'id',
            []
        );
        $posts = [];
        foreach ($postsdata as $postdata) {
            $posts[] = new Post($postdata['id'], $postdata['title'], $postdata['content'], $postdata['date'], $postdata['updateDate'], $postdata['name']);
        }
        $this->view->render('posts', [
            'posts' => $posts
        ]);
    }
    public function showPost(int $id) {


        $postdata = $this->database->leftJoin(
            'posts',
            'users',
            [
                'id', 'title', 'date', 'updateDate', 'content'
            ],
            [
                'name'
            ],
            'author_id',
            'id',
            [
                'id' => $id
            ]
        );

        $post = new Post($postdata[0]['id'], $postdata[0]['title'], $postdata[0]['content'], $postdata[0]['date'], $postdata[0]['updateDate'], $postdata[0]['name']);
        $this->view->render('post', [
            'post' => $post
        ]);

    }
}