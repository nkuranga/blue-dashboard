<?php
 if(isset($_POST['update'])){
    // configuration
    include("connection_pdo.php");
    $model = $_POST['model'];
    $ac = $_POST['ac'];
    $doors = $_POST['doors'];
    $person = $_POST['person'];
    $driver = $_POST['driver'];
    $id= $_POST['id'];
    $description= $_POST['description'];
    // query
    $sql = "UPDATE carrental 
            SET model=?, driver=?, ac=?, person=?, doors=?, description=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($model, $driver, $ac, $person, $doors, $description, $id));
    echo '<script>
        alert("Car Updated SuccessFully");
        window.location= "allCars";
    </script>';
    
     }
     
    ?>