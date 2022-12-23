<?php

    include "db.inc.php";

    if(isset($_POST["submit"])){
        $itemName = $_POST['itemName'];
        $itemPrice = $_POST['itemPrice'];
        
            $sql = "insert into itemstb (item_name, price) values ('$itemName', '$itemPrice')";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("Location: ../index.php");
            }
    }
?>
