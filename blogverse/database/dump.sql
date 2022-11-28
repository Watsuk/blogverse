CREATE TABLE IF NOT EXISTS User
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    role      INT         NOT NULL
);


CREATE TABLE IF NOT EXISTS Post
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL ,
    author  INT NOT NULL,
    title TEXT NOT NULL ,
    timemodif DATETIME NOT NULL ,
    image VARCHAR NOT NULL
);

CREATE TABLE IF NOT EXISTS PostComment
(
    id            INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    postID        INT         NOT NULL,
    content       TEXT        NOT NULL,
    author        INT         NOT NULL,
    publishTime   DATETIME    NOT NULL
);

CREATE TABLE IF NOT EXISTS CommentReply
(
    postID          INT NOT NULL  PRIMARY KEY  AUTO_INCREMENT,
    id              INT NOT NULL,
    content         TEXT NOT NULL,
    author          INT NOT NULL,
    publishTime   DATETIME    NOT NULL
);