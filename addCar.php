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
<h1>Add Car</h1>
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
Add Car
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
                        require 'connection_pdo.php';
            
                        $ac=$_POST['ac'];
                        $driver=$_POST['driver'];
                        $model=$_POST['model'];
                        $description=$_POST['description'];
                        $person= $_POST['person'];
                        $doors= $_POST['doors'];

                        $images=$_FILES['image']['name'];
                        $tmp_dir=$_FILES['image']['tmp_name'];
                        $imageSize=$_FILES['image']['size'];

                        $upload_dir='Images/';
                        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
                        $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                        $photo=rand(1000, 1000000).".".$imgExt;
                        move_uploaded_file($tmp_dir, $upload_dir.$photo);
                        // second
                        
                        
                         $stmt=$db->prepare('INSERT INTO carrental (
                         model,
                         image, 
                         driver,
                         ac,
                         person,
                         doors,
                         description)VALUES(?,?,?,?,?,?,?)');
                        $stmt->bindParam(1, $model);
                        $stmt->bindParam(2, $photo);
                        $stmt->bindParam(3, $driver);
                        $stmt->bindParam(4, $ac);
                        $stmt->bindParam(5, $person);
                        $stmt->bindParam(6, $doors);
                        $stmt->bindParam(7, $description);
                                     
                if($stmt->execute())
                {
                ?>
                <script>
                    alert("Car Uploaded");
                    window.location.href=('addCar.php');
                </script>
                <?php
                }else
     
                     {
                 ?>
                <script>
                    alert("Error");
                    window.location.href=('error.php');
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
    <a href="allCars"><button class="btn bg-info" style="color: #fff; font-size: 17px;"><i class="fa fa-arrow-right"></i> View All Cars Uploaded</button></a>
<div class="card-header">
<div class="card-title" style="text-align: center;">
<h2>Car Details</h2>
</div>
</div>
<div class="card-body">
<form class="container" id="needs-validation" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="validationCustom01">Car Model</label>
				<input type="text" class="form-control" id="validationCustom01" placeholder="Enter Tour Name" name="model"  required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validationCustom03">Browse Image</label>
				<input type="file" name="image" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="validationCustom03">Driver</label>
				<select class="form-control" name="driver">
                    <option selected disabled>Select Driver Availability</option>
                    <option value="NO">NO</option>
                    <option value="YES">YES</option>            
                </select>
            </div>
			<div class="col-md-6 mb-3">
				<label for="validationCustom04">Number Of Door</label>
				<label class="custom-file">
				<input type="number" class="form-control" name="doors">
			</div>
            
		</div>
        <div class="row">
            
            <div class="col-md-6 mb-3">
                <label for="validationCustom04">Number Of Seat</label>
                <label class="custom-file">
                <input type="number" class="form-control" name="person">
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">AC</label>
                <select class="form-control" name="ac">
                    <option selected disabled>Select AC Availability</option>
                    <option value="NO">NO</option>
                    <option value="YES">YES</option>            
                </select>
            </div>
        </div>
		<div class="row">
			
			<div class="col-md-12">
				<label for="validationCustom04">Short Description</label>
				<textarea class="form-control" placeholder="Short Car Description" name="description" rows="5"></textarea><br>
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