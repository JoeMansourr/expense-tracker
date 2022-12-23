<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "expensetracker";


    $conn = mysqli_connect($server, $user, $password, $db);

    if(!$conn){
        echo "Connection Failure" . mysqli_connect_error();
    }

?>