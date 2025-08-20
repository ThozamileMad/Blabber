<?php
    session_start();
    /*
    if (isset($_SESSION)) {
        if (time() - $_SESSION["last_activity"] > 1800) {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit()
    }
    */
    // Store Inputs In Session
    $_SESSION["fname"] = "John";
    $_SESSION["lname"] = "Doe";
    $_SESSION["username"] = "JohnDoe";
    $_SESSION["email"] = "JohnDoe@gmail.com";
    $_SESSION["profile_picture"] = "./uploads/profile_pictures/1.jpg";

    
?>