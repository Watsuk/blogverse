<?php

    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $users = getAllUsers();

    if(password_verify($Password,$users[0]["password"])){
        header("Location: (blog)");
    }else{
        header("Location: (login)");
    }

?>