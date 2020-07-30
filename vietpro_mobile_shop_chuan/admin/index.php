<script src="ckeditor/ckeditor.js"></script>
<?php
    session_start();
    define("TEMPLATE", true);
    include_once("connect.php");
    if(isset($_SESSION["user"]["mail"]) && isset($_SESSION["user"]["pass"])){
        include_once("admin.php");
    }else{
        include_once("login.php");
    }
?>