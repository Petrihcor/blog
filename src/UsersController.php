<?php

namespace Src;

use App\Controller;
use Src\classes\Post;
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
            [
                'author_id' => $id
            ]
        );
        $user = new User($userdata['id'], $userdata['name'], $userdata['email'], $userdata['password']);
        $posts = [];
        foreach ($postsdata as $postdata) {
            $posts[] = new Post($postdata['id'], $postdata['title'], $postdata['content'], $postdata['date'], $postdata['updateDate'], $postdata['name']);
        }
        $this->view->render('user', [
            "user" => $user,
            'posts' => $posts
        ]);
    }
    
}