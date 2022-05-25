<?php

require_once ('connection_pdo.php');

$id=$_REQUEST['id'];

move_uploaded_file($_FILES["image"]["tmp_name"],"../images/" . $_FILES["image"]["name"]);			
$location=$_FILES["image"]["name"];


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE slide SET image ='$location' WHERE id = '$id' ";

$db->exec($sql);
echo "<script>alert('Image Updated Successfully!!'); window.location='viewSlide'</script>";
?>