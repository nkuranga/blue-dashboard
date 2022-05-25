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
<div class="row">
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
$show  = "SELECT * FROM aboutus WHERE status='Active' ORDER BY dateInserted DESC LIMIT $starting_limit, $limit";

$r = $db->prepare($show);
$r->execute();

        if ($row = $r->fetch()) {
            ?>
            <?php
        do{
            ?>
<div class="col-md-3">
<div class="card" style="background-image: url(../images/<?php echo $row["image"];?>); height: 270px; background-repeat: no-repeat; width: 100%; background-position: center; background-size: 360px;">
<a href="editAccomodation?id=<?php echo $row['id'];?>"><button class="btn btn-info" style="margin-left: 70px; margin-top: 200px;"><i class="fa fa-edit"></i>Edit Image</button></a>
</div>
</div>
<div class="col-md-9">
<div class="card" style="margin-bottom: 15px;">
<div class="card-body">
    <p class="card-text">
        <?php echo $row['description'];?>
    </p>
    <p><a href="editAbout?id=<?php echo $row['id'];?>"><button class="btn btn-success"><i class="fa fa-edit"></i>   Edit</button></a>&nbsp;&nbsp;
        <a href="delete-about?id=<?php echo $row['id']?>" title="click for delete"onclick="return confirm('Sure to delete this record?')">
            <button class="btn btn-danger"><i class="fa fa-trash"></i>   Delete</button></a></p>
        </div>
</div>
</div>
</div>
<?php
}while($row = $r->fetch());
?>
<?php
}
else{
?>
<div class="alert alert-danger-lg"> No ABout us content Uploaded</div>
<?php
}
?>

<div class="col-md-12">
<?php
                 for ($page=1; $page <= $total_pages ; $page++):?>
                      <ul class="pagination pagination-sm" style="margin: 25px;  " >
                        <li class="page-item"><a class="page-link" href='<?php echo "alltours.php?page=$page"; ?>' style="background-color: #0E0B39; color: white; border: 0px; font-size: 12px;border-radius: 5px; margin-top: 100px; ">Page <?php  echo $page; ?></a></li>
                      </ul>
                    <?php endfor; 
                    ?>   
                        </ul>
</div>
</div>
 
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