<?php
 if(isset($_POST['update'])){
    // configuration
    include("connection_pdo.php");
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $id= $_POST['id'];
    $description= $_POST['description'];
    // query
    $sql = "UPDATE tour 
            SET name=?, category=?, description=?, price=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($name, $category, $description, $price, $id));
    echo '<script>
        alert("Data Updated SuccessFully");
        window.location= "alltours.php";
    </script>';
    
     }
     
    ?>