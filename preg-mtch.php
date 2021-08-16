<?php 

    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
    
    if(!preg_match($pattern, $email)){
        $_SESSION['email'] = "Invalid email address";
        header('location:index.php');
    }else{
        echo "Ok";
    }