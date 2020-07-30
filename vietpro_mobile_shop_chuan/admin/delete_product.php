<?php
    session_start();
    define("TEMPLATE", true);
    include_once("connect.php");
    if(isset($_SESSION["mail"]) && isset($_SESSION["pass"])){
    $prd_id = $_GET['prd_id'];
    include_once("connect.php");
    $sql = "DELETE FROM product WHERE prd_id= $prd_id ";
    mysqli_query($conn,$sql);
    header('location: index.php?page_layout=product');
    }else{
        echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="index.php">Trở về</a></button>
	<?php	die('');
    }
    
?>