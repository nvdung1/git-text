<?php
    session_start();
    define('TEMPLATE',true);
    include_once("connect.php");
    if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
        $cat_id = $_GET['cat_id'];
        include_once('connect.php');
        $sql = "DELETE FROM category WHERE cat_id= $cat_id ";
        $query = mysqli_query($conn,$sql);
        header('location: index.php?page_layout=category');
    }
?>