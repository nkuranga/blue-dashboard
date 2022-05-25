<?php 
    if(isset($_GET['id']))
    {    
        require 'connection_pdo.php';
        $status= 'Pending';
        $id= $_GET['id'];
        $sql = "UPDATE tour 
            SET status=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($status, $id));
        if($sql){
            ?>
            <script>
            alert("Tour Trashed successfully");
            window.location.href=('alltours');
            </script>
            <?php 
        }else
 
        ?>
            <script>
            alert("Can not Trashed");
            window.location.href=('alltours');
            </script>
            <?php 
    }
    ?>