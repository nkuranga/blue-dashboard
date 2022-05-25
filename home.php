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
		<div class="content_wrapper">
			<div class="container-fluid">
				<!-- breadcrumb -->
				<div class="page-heading">
					<div class="row d-flex align-items-center">
						<div class="col-md-6">
							<div class="page-breadcrumb">
								<h1>Dashboard</h1>
							</div>
						</div>
						<div class="col-md-6 justify-content-md-end d-md-flex">
							<div class="breadcrumb_nav">
								<ol class="breadcrumb">
									<li>
										<i class="fa fa-home"></i>
										<a class="parent-item" href="index.html">Home</a>
										<i class="fa fa-angle-right"></i>
									</li>
									<li class="active">
										Dashboard
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb_End -->

				<!-- Section -->
				<!--state widget start-->
				<div class="row">
					<div class="col-xl-4 col-sm-6 mb-4">
						<div class="card card-shadow">
							<div class="card-body">
								<div class="row">
									<div class="col-3">
										<span class="bg-warning rounded-circle text-center wb-icon-box"> <i class="icon-basket-loaded text-light f24"></i> </span>
									</div>
									<div class="col-9">
										<h6 class="mt-1 mb-0">Booking</h6>
										<?php
                         				$stmt = $db->prepare("SELECT count(id) FROM tour");
                         				$stmt->execute();
		                                 $count = $stmt->fetchColumn();
                         				?>
										<p class="f12 mb-0">
											<span style="font-weight: 800; font-size: 16px;"><?php echo $count;?> Booking(s)</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-4">
						<div class="card card-shadow ">
							<div class="card-body ">
								<div class="row">
									<div class="col-3">
										<span class="bg-info rounded-circle text-center wb-icon-box"> <i class="fa fa-flag text-light f24"></i> </span>
									</div>
									<div class="col-9">
										<h6 class="mt-1 mb-0">Tours</h6>
										<?php
                         				$stmt = $db->prepare("SELECT count(id) FROM tour");
                         				$stmt->execute();
		                                 $count = $stmt->fetchColumn();
                         				?>
										<p class="f12 mb-0">
											<span style="font-weight: 800; font-size: 16px;"><?php echo $count;?> Tour(s)</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-4">
						<div class="card card-shadow">
							<div class="card-body ">
								<div class="row">
									<div class="col-3">
										<span class="bg-success rounded-circle text-center wb-icon-box"> <i class="fa fa-car text-light f24"></i> </span>
									</div>
									<div class="col-9">
										<h6 class="mt-1 mb-0">Car Rental </h6>
										<?php
                         				$stmt = $db->prepare("SELECT count(id) FROM  	carrental");
                         				$stmt->execute();
		                                 $count = $stmt->fetchColumn();
                         				?>
										<p class="f12 mb-0">
											<span style="font-weight: 800; font-size: 16px;"><?php echo $count;?> Car(s)</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--state widget end-->
			<div class="row">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63795.71575807485!2d29.30320626091155!3d-2.0630320149818915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x98db61c3d51968fc!2sKibuye%20Blue%20Monkey%20Tours%20%26%20boat%20trip!5e0!3m2!1sen!2srw!4v1603816496775!5m2!1sen!2srw" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div style="margin-bottom: 20px;"></div>
                 </div>   
            </div>

			</div>
		</div>
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