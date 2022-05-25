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
<h1>All Car Uploaded</h1>
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
All Car Uploaded
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
$query = "SELECT count(*) FROM carrental";

$s = $db->query($query);
$total_results = $s->fetchColumn();
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}
$starting_limit = ($page-1)*$limit;
$show  = "SELECT id,model,image,driver,ac,person,doors,LEFT(description,120),status,dateInserted FROM carrental WHERE status='Active' ORDER BY dateInserted DESC LIMIT $starting_limit, $limit";

$r = $db->prepare($show);
$r->execute();

        if ($row = $r->fetch()) {
            ?>
            <?php
        do{
            ?>
<div class="col-md-4">
<div class="card" style="height: 500px; margin-bottom: 15px;">
<img class="card-img-top img-fluid" src="images/<?php echo $row["image"];?>" alt="<?php echo $row['model'];?>" style="height: 200px;">
<div class="card-body">
    <h5 class="card-title"><?php echo $row['model'];?></h5>
    <p class="card-text">
        <?php echo "Driver: ".$row['driver']." &nbsp;&nbsp;| &nbsp;&nbsp; AC:".$row['ac'];?>
    </p>
    <p class="card-text">
        <?php echo "Person(s): ".$row['person']." &nbsp;&nbsp;| &nbsp;&nbsp; Door(s):".$row['doors'];?>
    </p>
    <p class="card-text">
        <?php echo $row["LEFT(description,120)"];?>
    </p>
    
    <p><a href="editCar?id=<?php echo $row['id'];?>"><button class="btn btn-success"><i class="fa fa-edit"></i>   Edit</button></a>&nbsp;&nbsp;
        <a href="delete-car?id=<?php echo $row['id']?>" title="click for delete"onclick="return confirm('Sure to delete this record?')">
            <button class="btn btn-danger"><i class="fa fa-trash"></i>   Delete</button></a></p>
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
<div class="alert alert-danger-lg"> No Tour Uploaded</div>
<?php
}
?>

<div class="col-md-12">
<?php
                 for ($page=1; $page <= $total_pages ; $page++):?>
                      <ul class="pagination pagination-sm" style="margin: 25px;  " >
                        <li class="page-item"><a class="page-link" href='<?php echo "alltours.php?page=$page"; ?>' style="background-color: #0E0B39; color: white; border: 0px; font-size: 12px;border-radius: 5px;">Page <?php  echo $page; ?></a></li>
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