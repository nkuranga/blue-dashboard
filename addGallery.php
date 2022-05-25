<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("connection_pdo");
        $selectUser = $db->prepare("SELECT * FROM users WHERE user_id = '".$_SESSION['user']."' AND status = 'Active' ");
        $selectUser->execute();
        if ($userFound = $selectUser->fetch()) {
            ?>
<!DOCTYPE html>
<html lang="en">
<?php
require 'header';
?>
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
<a class="parent-item" href="index">Home</a>
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
                        require 'connection_pdo';
            
                        $name=$_POST['name'];
                        $price=$_POST['price'];
                        $category=$_POST['category'];
                        $description=$_POST['description'];
                        $status= "Pending";

                        $images=$_FILES['image1']['name'];
                        $tmp_dir=$_FILES['image1']['tmp_name'];
                        $imageSize=$_FILES['image1']['size'];

                        $upload_dir='../images/';
                        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
                        $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                        $photo=rand(1000, 1000000).".".$imgExt;
                        move_uploaded_file($tmp_dir, $upload_dir.$photo);
                        // second
                        $images=$_FILES['image2']['name'];
                        $tmp_dir=$_FILES['image2']['tmp_name'];
                        $imageSize=$_FILES['image2']['size'];

                        $upload_dir='../images/';
                        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
                        $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                        $photo2=rand(1000, 1000000).".".$imgExt;
                        move_uploaded_file($tmp_dir, $upload_dir.$photo2);
                        // second
                        $images=$_FILES['image3']['name'];
                        $tmp_dir=$_FILES['image3']['tmp_name'];
                        $imageSize=$_FILES['image3']['size'];

                        $upload_dir='../images/';
                        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
                        $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                        $photo3=rand(1000, 1000000).".".$imgExt;
                        move_uploaded_file($tmp_dir, $upload_dir.$photo3);
                        // second
                        $images=$_FILES['image4']['name'];
                        $tmp_dir=$_FILES['image4']['tmp_name'];
                        $imageSize=$_FILES['image4']['size'];

                        $upload_dir='Images/';
                        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
                        $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                        $photo4=rand(1000, 1000000).".".$imgExt;
                        move_uploaded_file($tmp_dir, $upload_dir.$photo4);
                         $stmt=$db->prepare('INSERT INTO tour (
                         name,
                         category, 
                         image1,
                         image2,
                         image3,
                         image4,
                         description, price, status)VALUES(?,?,?,?,?,?,?,?,?)');
                        $stmt->bindParam(1, $name);
                        $stmt->bindParam(2, $category);
                        $stmt->bindParam(3, $photo);
                        $stmt->bindParam(4, $photo2);
                        $stmt->bindParam(5, $photo3);
                        $stmt->bindParam(6, $photo4);
                        $stmt->bindParam(7, $description);
                        $stmt->bindParam(8, $price);
                        $stmt->bindParam(9, $status);
                                     
                if($stmt->execute())
                {
                ?>
                <script>
                    alert("Tour Uploaded successfully");
                    window.location.href=('addTour');
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
<h2>Tour Details</h2>
</div>
</div>
<div class="card-body">
<form class="container" id="needs-validation" method="POST" enctype="multipart/form-data">
		
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="validationCustom03">Image Title</label>
				<input type="text" class="form-control" id="validationCustom03" placeholder="Enter Price" name="title" required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validationCustom04">Select Image</label>
				<label class="custom-file">
				<input type="file" id="file2" class="form-control" name="image">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label for="validationCustom04">Description</label>
				<textarea class="form-control" placeholder="Short Tour Description" name="description" rows="5"></textarea><br>
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
require 'footer';
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
</html>
<?php
	}
    else{
        header('location:index');   
    }
    }
    else{
        header('location:index');
    }
?>