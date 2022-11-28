<?php

namespace App\Controller;

use App\Entity\Post;
use App\Factory\Pdo;
use App\Manager\PostManager;

class PostController extends AbstractController
{
    public function home()
    {
        // Instancier le PostManager
        // Demander au postmanager de récupérer tous les posts
        // envoyer tous les posts à la vue

        require_once dirname(__DIR__, 2) . '/views/login.php';
        exit;
    }

    public function post()
    {
        // Instancier le PostManager
        // Demander au postmanager de récupérer tous les posts
        // envoyer tous les posts à la vue

        $manager = new PostManager(new Pdo());

        /** @var Post[] $posts */
        $posts = $manager->getPosts();

        require_once dirname(__DIR__, 2) . '/views/blog.php';
        exit;
    }

    public function profil($user)
    {
        // Instancier le PostManager
        // Demander au postmanager de récupérer tous les posts
        // envoyer tous les posts à la vue

        $manager = new PostManager();

        /** @var Post[] $posts */
        $posts = $manager->getByUsername($user);

        require_once dirname(__DIR__, 2) . '/views/profil.php';
        exit;
    }

    public function users()
    {
        // Instancier le PostManager
        // Demander au postmanager de récupérer tous les posts
        // envoyer tous les posts à la vue

        $manager = new PostManager();

        /** @var Post[] $posts */
        $posts = $manager->getAllUsers();

        require_once dirname(__DIR__, 2) . '/views/users.php';
        exit;
    }

    public function createPost($id)
    {
        // Instancier le PostManager
        // Demander au postmanager de récupérer tous les posts
        // envoyer tous les posts à la vue

        $manager = new PostManager();

        /** @var Post[] $posts */
        $posts = $manager->createPost($id);

        require_once dirname(__DIR__, 2) . '/views/createPost.php';
        exit;
    }

    public function blog()
    {
        // Instancier le PostManager
        // Demander au postmanager de récupérer tous les posts
        // envoyer tous les posts à la vue

        $manager = new PostManager(new Pdo());

        $posts = $manager->getPosts();

        $this->render("blog.php", ["posts" => $posts], "Tous les posts");

    }

}