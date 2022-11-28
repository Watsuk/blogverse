<?php

namespace App\Manager;

use App\Entity\Comment;
use App\Entity\User;
use App\Entity\Post;


Class postCommentManager extends BaseManager
{
    public array $comments;

    public function createComment(string $content, User $author,Post $postID)
    {
        $publishTime = new \DateTime();

        $query =$this->pdo->query("INSERT INTO Post (content, publishTime, author,postID) (:content, :publishTime, :author, :postID)");
        $query->binValue('content', $content);
        $query->binValue('publishTime', $publishTime);
        $query->binValue('author', $author->getId());
        $query->binValue('postID', $postID->getID());
        $query->execute();

        return null;

    }

    public function modifyComment(int $id, string $content)
    {
        $publishTime = new \DateTime();

        $query = $this->pdo->query("UPDATE PostComment SET content = :content AND publishTime = :currentDate WHERE id = :id");
        $query->bindValue(':content', $content);
        $query->bindValue(':id', $id);
        $query->bindValue(':publishTime', $publishTime);
        $query->execute();

        return null;
    }

    public function getComments(): array
    {
        $query = $this->pdo->query("SELECT * FROM PostComment");

        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)){
            $Comments[] = new PostComment($data);
        }

        return $comments;
    }

    public function getCommentByID(int $id): ?PostComment
    {
        $query = $this->pdo->query("SELECT * FROM Comment WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data){
            return new PostComment($data);
        }

        return null;
    }


    public function deleteCommentById(int $id)
    {
        $query = $this->pdo->query("DELETE * FROM PostComment WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_STR);
        $query->execute();

        return null;
    }
}

Class commentReplyManager extends BaseManager
{
    public function commentReply(string $content, User $author, Comment $commentID)
    {
        $publishTime = new \DateTime();

        $query =$this->pdo->query("INSERT INTO Post (content, publishTime, author,commentID) (:content, :publishTime, :author, :commentID)");
        $query->binValue('content', $content);
        $query->binValue('publishTime', $publishTime);
        $query->binValue('author', $author->getId());
        $query->binValue('commentID', $commentID->commentID());
        $query->execute();

        return null;
    }

    public function modifyComment(int $id, string $content)
    {
        $publishTime = new \DateTime();

        $query = $this->pdo->query("UPDATE PostComment SET content = :content AND publishTime = :currentDate WHERE id = :id");
        $query->bindValue(':content', $content);
        $query->bindValue(':id', $id);
        $query->bindValue(':publishTime', $publishTime);
        $query->execute();

        return null;
    }


    public function getComments(): array
    {
        $query = $this->pdo->query("SELECT * FROM PostComment");

        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)){
            $Comments[] = new PostComment($data);
        }

        return $comments;
    }

    public function getCommentByID(int $id): ?PostComment
    {
        $query = $this->pdo->query("SELECT * FROM Comment WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data){
            return new PostComment($data);
        }

        return null;
    }



    public function deleteCommentById(int $id)
    {
        $query = $this->pdo->query("DELETE * FROM PostComment WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_STR);
        $query->execute();

        return null;
    }


}
