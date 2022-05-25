<?php
 if(isset($_POST['update'])){
    // configuration
    include("connection_pdo.php");
    $title = $_POST['title'];
    $category = $_POST['category'];
    $id= $_POST['id'];
    $description= $_POST['description'];
    // query
    $sql = "UPDATE accomodation 
            SET title=?, category=?, description=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($title, $category, $description, $id));
    echo '<script>
        alert("Data Updated SuccessFully");
        window.location= "allAccomodation";
    </script>';
    
     }
     
    ?>