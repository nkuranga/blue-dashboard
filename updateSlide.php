<?php
 if(isset($_POST['update'])){
    // configuration
    include("connection_pdo.php");
    $title = $_POST['title'];
    $id= $_POST['id'];
   
    // query
    $sql = "UPDATE slide 
            SET title=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($title, $id));
    echo '<script>
        alert("Slide Updated SuccessFully");
        window.location= "viewSlide";
    </script>';
    
     }
     
    ?>