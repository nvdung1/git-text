<?php
    session_start();
    define('TEMPLATE',true);
    include_once("connect.php");
    if(isset($_SESSION["user"]['mail']) && isset($_SESSION["user"]['pass'])){
        $user_id = $_GET['user_id'];
        include_once('connect.php');
        $sql = "DELETE FROM user WHERE user_id= $user_id ";
        $query = mysqli_query($conn,$sql);
        header('location: index.php?page_layout=user');
    }
?>