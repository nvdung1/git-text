<?php
	if(!defined("TEMPLATE")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="index.php">Trở về</a></button>
	<?php	die('');
	}?>
    <?php
        if(isset($_POST['sbm'])){
            $mail = $_POST['user_mail'];
            $name = $_POST['user_full'];
            $pass = $_POST['user_pass'];
            $re_pass = $_POST['user_re_pass'];
            $level = $_POST['user_level'];
            $sql = "SELECT*FROM user where user_mail = '$mail' ";
            $query = mysqli_query($conn,$sql);
            $num_rows = mysqli_num_rows($query);
            if($num_rows >0){
                $error = '<div class="alert alert-danger">Email đã tồn tại !</div>';
            }else{
                if($re_pass == $pass){
                    $sql = "INSERT INTO user( user_full,user_mail,user_pass,user_level)
                    VALUES ('$name','$mail','$pass','$level')";
                    mysqli_query($conn,$sql);
                    header("location: index.php?page_layout=user");
                }else{
                    $error = '<div class="alert alert-danger">Mat khau nhap lai SAI! Vui long nhap lai.</div>';
                }
            }
        }
    ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="index.php?page_layout=user">Quản lý thành viên</a></li>
				<li class="active">Thêm thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm thành viên</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            	<?php if(isset($error)){ echo $error;}  ?>
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="user_full" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="user_mail" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="user_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="user_re_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Member</option>
                                    </select>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
