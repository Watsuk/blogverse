<?php

namespace App\Entity;

class Post extends BaseEntity {

    private int $id;
    private string $content;
    private int $author;
    private string $title;
    private string $timemodif;
    private string $image;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }




    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(int $content): Post
    {
        $this->content = $content;
        return $this;
    }




    public function getAuthor(): int
    {
        return $this->author;
    }

    public function setAuthor(int $author): Post
    {
        $this->author = $author;
        return $this;
    }





    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(int $title): Post
    {
        $this->title = $title;
        return $this;
    }





    public function getTimemodif(): string
    {
        return $this->timemodif;
    }

    public function setTimemodif(int $timemodif): Post
    {
        $this->timemodif = $timemodif;
        return $this;
    }





    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Post
    {
        $this->image = $image;
        return $this;
    }
}