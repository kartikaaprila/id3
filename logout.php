<?php
    session_start();
    unset($_SESSION['id3_id']);
    unset($_SESSION['id3_username']);
    unset($_SESSION['id3_level']);
    unset($_SESSION['id3_key']);
    unset($_SESSION['id3_last_login']);
    session_destroy();
    header("location:login.php");