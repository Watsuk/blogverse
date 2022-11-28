<?php

namespace App\Entity;

class postComment extends BaseEntity
{
    private int $postID;
    private int $id;
    private string $content;
    private int $author;


    /**
     * @return int
     */
    public function getPostID(): int
    {
        return $this->postID;
    }

    /**
     * @param int $PostID
     * @return postComment
     */

    public function setCommentID(int $PostID): postComment
    {
        $this->postID = $PostID;
        return $this;
    }


    /**
     * @return int
     */

    public function getId(): int
    {
        return $this->id;
    }



    /**
     * @param int $id
     * @return postComment
     */

    public function setId(int $id): postComment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): postComment
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }


    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @param int $author
     * @return postComment
     */
    public function setAuthor(int $author): postComment
    {
        $this->author = $author;
        return $this;
    }

}





Class commentReply extends BaseEntity
{
    private int $commentID;
    private int $id;
    private string $content;
    private int $author;

    /**
     * @return int
     */
    public function getCommentID(): int
    {
        return $this->commentID;
    }

    /**
     * @param int $commentID
     * @return commentReply
     */

    public function setCommentID(int $commentID): commentReply
    {
        $this->commentID = $commentID;
        return $this;
    }


    /**
     * @return int
     */

    public function getId(): int
    {
        return $this->id;
    }



    /**
     * @param int $id
     * @return commentReply
     */

    public function setId(int $id): commentReply
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): commentReply
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }


    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @param int $author
     * @return commentReply
     */
    public function setAuthor(int $author): commentReply
    {
        $this->author = $author;
        return $this;
    }


}