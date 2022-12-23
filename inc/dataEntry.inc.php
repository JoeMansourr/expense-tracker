<?php

    include "db.inc.php";

    if(isset($_POST["submit"])){
        $itemName = $_POST['itemName'];
        $itemPrice = $_POST['itemPrice'];

        // if($itemPrice < 0){
        //     $sql = "insert into negativevalues (negativeValues) values ('$itemPrice')";
        //     $result = mysqli_query($conn, $sql);
        //     if($result){
        //         header("Location: ../index.php");
        //     }
        // }
        
            $sql = "insert into itemstb (item_name, price) values ('$itemName', '$itemPrice')";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("Location: ../index.php");
            }
    }
?>