<?php

    include "db.inc.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from itemstb where id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../index.php?delete=success");
        }
    }
?>