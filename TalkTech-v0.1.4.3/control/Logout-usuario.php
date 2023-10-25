<?php

    header('Location: ../index.php');

    session_start();
    unset($_SESSION['login-id']);
    unset($_SESSION['login-nome']);
    unset($_SESSION['login-email']);
    unset($_SESSION['login-senha']);
    session_destroy();

?>