<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("connection_pdo.php");
        $selectUser = $db->prepare("SELECT * FROM users WHERE user_id = '".$_SESSION['user']."' AND status = 'Active' ");
        $selectUser->execute();
        if ($userFound = $selectUser->fetch()) {
            ?>
<!DOCTYPE html>
<html lang="en">
<?php
require 'header.php';
?>
<script src="ckeditor/ckeditor.js"></script>
<style>
.btn-save{
	background: #293fff;
	border: none;
	color: #fff;
	border-radius: 5px;
	cursor: pointer;
	padding: 5px;
	padding-right: 5px;
	font-size: 17px;
	padding-right: 10px;
}
.cancel{
	background: #333;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	padding: 5px;
	padding-right: 10px;
	font-size: 17px;
}
</style>

<!--main contents start-->
<main class="content_wrapper">
<!--page title start-->
<div class="page-heading">
<div class="container-fluid">
<div class="row d-flex align-items-center">
<div class="col-md-6">
<div class="page-breadcrumb">
<h1>Add Tour</h1>
</div>
</div>
<div class="col-md-6 justify-content-md-end d-md-flex">
<div class="breadcrumb_nav">
<ol class="breadcrumb">
<li>
<i class="fa fa-home"></i>
<a class="parent-item" href="index.php">Home</a>
<i class="fa fa-angle-right"></i>
</li>
<li class="active">
Add Tour
</li>
</ol>
</div>
</div>
</div>
</div>
</div>
<!--page title end-->
					
          <?php
                if (isset($_POST['send'])) {
             

                    $fname=$_POST['first_name'];
                    $lname=$_POST['last_name'];
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    //$password= $_POST['password'];
                    $salt1 = "!!!6544653_$$=-=-!";
                    $salt2 = "ADFNJVD ++sdf/*-&";
                    $passLock = $salt1 . $_POST['password'] . $salt2;
                    $passwordHash = password_hash($passLock, PASSWORD_DEFAULT);
                    $phone=$_POST['phone'];
                    $role= 'Admin';
                    $status= 'Active';

                    $stmt=$db->prepare('INSERT INTO users (
                         first_name,
                         last_name,
                         role, 
                         email,
                         username,
                         password,
                         phone,
                         status
                         )VALUES(?,?,?,?,?,?,?,?)');
                        $stmt->bindParam(1, $fname);
                        $stmt->bindParam(2, $lname);
                        $stmt->bindParam(3, $role);
                        $stmt->bindParam(4, $email);
                        $stmt->bindParam(5, $username);
                        $stmt->bindParam(6, $passwordHash);
                        $stmt->bindParam(7, $phone);
                        $stmt->bindParam(8, $status);
                                     
                if($stmt->execute())
                {
                ?>
                <script>
                    alert("New User added successfully");
                    window.location.href=('addUser');
                </script>
                <?php
                }else
     
                     {
                 ?>
                <script>
                    alert("Error");
                    window.location.href=('error');
                </script>
                <?php
                 }
             }
         ?>




<div class="container-fluid">
<!-- state start-->
<div class="row">
<div class="col-xl-12">
<div class="card card-shadow mb-4">
<div class="card-header">
<div class="card-title" style="text-align: center;">
<h2>User Details</h2>
</div>
</div>
<div class="card-body">
<form class="container" id="needs-validation" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="validationCustom01">First Name</label>
				<input type="text" class="form-control" id="validationCustom01" placeholder="Enter First Name" name="first_name"  required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validationCustom03">Last Name</label>
				<input type="text" class="form-control" id="validationCustom01" placeholder="Enter Last Name" name="last_name"  required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="validationCustom03">Email</label>
				<input type="email" class="form-control" id="validationCustom03" placeholder="Enter Your Email" name="email" required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validationCustom04">Phone</label>
				<label class="custom-file">
				<input type="text" id="file2" class="form-control" name="phone" placeholder="Enter your Phone Number">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="validationCustom04">UserName</label>
				<input type="text" id="file2" class="form-control" name="username">
			</div>
			<div class="col-md-6 mb-3">
				<label for="validationCustom04">Password</label>
				<input type="passoword" id="" class="form-control" name="password">
			</div>
			
			<div class="col-md-12">
				
				<button class="btn-save" type="submit" name="send"><i class="fa fa-save"></i> Save</button>
			</div>
			
		</div>

</div>
</div>
</div>
</form>
</div>
</div>
<!-- state end-->

</main>
<!--main contents end-->

</div>
<!-- Content_right_End -->
<?php
require 'footer.php';
?>
</div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!--Morris Chart-->
<script src="assets/js/index/morris-chart/morris.js"></script>
<script src="assets/js/index/morris-chart/raphael-min.js"></script>
<!--morris chart initialization-->
<script src="assets/js/index/morris-chart/morris-init.js"></script>


<!--flot chart -->
<script src="assets/js/index/flot-chart/jquery.flot.js"></script>
<script src="assets/js/index/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="assets/js/index/flot-chart/jquery.flot.resize.js"></script>
<script src="assets/js/index/flot-chart/jquery.flot.pie.js"></script>
<script src="assets/js/index/flot-chart/jquery.flot.stack.js"></script>
<script src="assets/js/index/flot-chart/jquery.flot.crosshair.js"></script>
<script src="assets/js/index/flot-chart/jquery.flot.time.js"></script>
<!--flot initialization-->
<script src="assets/js/index/flot-chart/flot-chart-init.js"></script>
<!--sparkline chart-->
<script src="assets/js/index/jquery.sparkline.js"></script>
<script src="assets/js/index/sparkline-init.js"></script>
<!--echarts-->
<script type="text/javascript" src="assets/js/index/echarts/echarts-all-3.js"></script>
<!--init echarts-->
<script type="text/javascript" src="assets/js/index/echarts/init-echarts.js"></script>

<script type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/custom.js" type="text/javascript"></script>
</body>
<script>
  var editor=CKEDITOR.replace( 'editor1',{
    extraPlugins : 'filebrowser',
    filebrowserBrowseUrl:'browser.php?type=Images',
    filebrowserUploadMethod:"form",
    filebrowserUploadUrl:"upload.php"
  });
</script>
</html>
<?php
	}
    else{
        header('location:index.php');   
    }
    }
    else{
        header('location:index.php');
    }
?>