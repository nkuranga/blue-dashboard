<?php
 if(isset($_POST['update'])){
    // configuration
    include("connection_pdo.php");
    $description= $_POST['description'];
    $id= $_POST['id'];
    // query
    $sql = "UPDATE aboutus 
            SET description=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($description, $id));
    echo '<script>
        alert("Content Updated SuccessFully");
        window.location= "viewAbout";
    </script>';
    
     }
     
    ?>