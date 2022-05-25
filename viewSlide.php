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
<!--main contents start-->
<main class="content_wrapper">
<!--page title start-->
<div class="page-heading">
<div class="container-fluid">
<div class="row d-flex align-items-center">
<div class="col-md-6">
<div class="page-breadcrumb">
<h1>All About us Content</h1>
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
View All About us
</li>
</ol>
</div>
</div>
</div>
</div>
</div>

<div class="container">
<?php
$limit = 6;
$query = "SELECT count(*) FROM aboutus";

$s = $db->query($query);
$total_results = $s->fetchColumn();
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}
$starting_limit = ($page-1)*$limit;
$show  = "SELECT * FROM slide WHERE status='Active' ORDER BY dateInserted DESC LIMIT $starting_limit, $limit";

$r = $db->prepare($show);
$r->execute();

        if ($row = $r->fetch()) {
            ?>
            <?php
        do{
            ?>
<div class="row">
<div class="col-md-5">
<div class="card" style="background-image: url(../images/<?php echo $row["image"];?>); height: 270px; background-repeat: no-repeat; width: 100%; background-position: center; background-size: 420px;">
<a href="editImageSlide?id=<?php echo $row['id'];?>"><button class="btn btn-info" style="margin-left: 70px; margin-top: 200px;"><i class="fa fa-edit"></i>Edit Image</button></a>
</div>
</div>
<div class="col-md-7">
<div class="card" style="margin-bottom: 15px;">
<div class="card-body">
    <h1 class="card-title">SLIDE TITLE</h1>
    <h2>
        <?php echo $row['title'];?><br>
    </h2>
    <p><a href="editSlide?id=<?php echo $row['id'];?>"><button class="btn btn-success"><i class="fa fa-edit"></i>   Edit</button></a>&nbsp;&nbsp;
        <a href="delete-slide?id=<?php echo $row['id']?>" title="click for delete"onclick="return confirm('Sure to delete this record?')">
            <button class="btn btn-danger"><i class="fa fa-trash"></i>   Delete</button></a></p>
        </div>
</div>
</div>
</div>
<div style="margin-top: 10px;"></div>
<?php
}while($row = $r->fetch());
?>
<?php
}
else{
?>
<div class="alert alert-danger-lg"> Slides Uploaded</div>
<?php
}
?>
</div>
</main>
<!--main contents end-->
<div style="margin-top: 20px;"></div>
<!-- Content_right_End -->
<?php
require 'footer.php';
?>
</div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/popper.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!--datatables-->
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>
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