<?php

namespace App\Manager;

use App\Entity\Post;
use App\Entity\User;
use App\Factory\Pdo;

class PostManager extends BaseManager {

    public function createPost(string $content, string $title, User $author, string $image)
    {
        $currentDate = new \DateTime();

        $query =$this->pdo->query("INSERT INTO Post (content, title, image, timemodif, author) (:content, :title, :image, :currentDate, :author)");
        $query->bindValue('content', $content);
        $query->bindValue('title', $title);
        $query->bindValue('image', $image);
        $query->bindValue('currentDate', $currentDate);
        $query->bindValue('author', $author->getId());
        $query->execute();

        return null;

    }
    public function getPosts(): array
    {
        $query = $this->pdo->query("SELECT * FROM Post");

        $posts = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)){
            $posts[] = new Post($data);
        }

        return $posts;
    }

    public function getPostByID(int $id): ?Post
    {
        $query = $this->pdo->query("SELECT * FROM Post WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data){
            return new Post($data);
        }

        return null;
    }

    public function getPostByAuthor(int $author): ?Post
    {
        $query = $this->pdo->query("SELECT * FROM Post WHERE author = :author");
        $query->bindValue("author", $author, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data){
            return new Post($data);
        }

        return null;
    }

    public function getPostByTitle(int $title): ?Post
    {
        $query = $this->pdo->query("SELECT * FROM Post WHERE title = :title");
        $query->bindValue("title", $title);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data){
            return new Post($data);
        }

        return null;
    }

    public function deletePostById(int $id)
    {
        $query = $this->pdo->query("DELETE * FROM Post WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();

        return null;
    }

    public function modifyPost(int $id, string $content, string $title, string $image)
    {
        $currentDate = new \DateTime();
        $query = $this->pdo->query("UPDATE Post SET content = :content AND title = :title AND timemodif = :currentDate AND image = :image WHERE id = :id");
        $query->bindValue(':content', $content);
        $query->bindValue(':title', $title);
        $query->bindValue(':id', $id);
        $query->bindValue(':currentDate', $currentDate);
        $query->bindValue('image', $image);
        $query->execute();

        return null;
    }

}