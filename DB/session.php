<?php
    include('config.php');
    session_start();

    $user_check = $_SESSION['login_user'];

    $ses_sql = mysqli_query($db,"select User_ID, User_Name from users where User_Name = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_session = $row['User_Name'];
    $user_ID = $row['User_ID'];

    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
        die();
    }
?>