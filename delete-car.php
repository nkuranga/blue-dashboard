<?php 
    if(isset($_GET['id']))
    {    
        require 'connection_pdo.php';
        $status= 'Pending';
        $id= $_GET['id'];
        $sql = "UPDATE carrental 
            SET status=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($status, $id));
        if($sql){
            ?>
            <script>
            alert("Car Record Trashed successfully");
            window.location.href=('allCars');
            </script>
            <?php 
        }else
 
        ?>
            <script>
            alert("Can not Trashed");
            window.location.href=('allCars');
            </script>
            <?php 
    }
    ?>