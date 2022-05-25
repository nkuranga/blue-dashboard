<?php 
    if(isset($_GET['id']))
    {    
        require 'connection_pdo.php';
        $status= 'Pending';
        $id= $_GET['id'];
        $sql = "UPDATE slide 
            SET status=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($status, $id));
        if($sql){
            ?>
            <script>
            alert("Slide Record Trashed successfully");
            window.location.href=('viewSlide');
            </script>
            <?php 
        }else
 
        ?>
            <script>
            alert("Slide not Trashed");
            window.location.href=('viewSlide');
            </script>
            <?php 
    }
    ?>