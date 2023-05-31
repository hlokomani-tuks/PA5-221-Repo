<?php
    include 'config.php';

    unset($_SESSION["Email"]);
    unset($_SESSION["UserName"]);
    $_SESSION['LoggedIN'] = false;

    unset($_COOKIE["Email"]);
    unset($_COOKIE["UserName"]);

    header("Location: index.php");
    die;
?>