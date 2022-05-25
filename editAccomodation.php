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
<h1>Edit Accomodation</h1>
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
Edit Accomodation
</li>
</ol>
</div>
</div>
</div>
</div>
</div>
<!--page title end-->

<div class="container-fluid">
<!-- state start-->
<div class="row">
    <?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $result = $db->prepare("SELECT * FROM accomodation WHERE id= :id");
    $result->bindParam(':id', $id);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
?>
<div class="col-xl-12">
<div class="card card-shadow mb-4">
<div class="card-header">
<div class="card-title" style="text-align: center;">
<h2>Accomodation Details</h2>
</div>
</div>
<div class="card-body">
<form class="container" id="needs-validation" method="POST" action="updateAccomodation?id=<?php echo $row['id'];?>">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="validationCustom01">Title</label>
				<input type="text" class="form-control" id="validationCustom01" name="title" value="<?php echo $row['title'];?>">
                <input type="text" name="id" value="<?php echo $row['id']?>" hidden>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validationCustom03">Category</label>
				<select class="form-control" name="category">
					<option value="<?php echo $row['category'];?>" selected><?php echo $row['category'];?></option>
					<option value="Hotel">Hotel</option>
					<option value="Lodge">Lodge</option>
					<option value="Apartement">Apartement</option>
					<option value="Resort">Resort</option>
				</select>
				</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-12">
				<label for="validationCustom04">Description</label>
				<textarea class="form-control" placeholder="Short Tour Description" name="description" rows="5" id="editor1"><?php echo $row['description'];?></textarea><br>
				<button class="btn-save" type="submit" name="update"><i class="fa fa-refresh"></i> Update</button>
			</div>
			
		</div>

</div>
</div>
<?php
}
?>
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