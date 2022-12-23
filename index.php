<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/1e938fdd74.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Expense Tracker</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Expense Tracker</h1>
            <div class="balance">
                <h4>Your Balance</h4>

                <?php

                include "inc/db.inc.php";


                $query = "select sum(price) from itemstb";
                $res = mysqli_query($conn, $query);

                if(mysqli_num_rows($res) > 0){
                    while($data = mysqli_fetch_assoc($res)){
                        echo '<h1 id="balanceAmount">$' . $data['sum(price)'] . '</span>';
                    }
                }else{
                    echo '<h1 id="balanceAmount">$0</span>';
                }



                $sql = "select price, sum(price) from itemstb where price > 0";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){

                            
                        
                            echo '<div class="inc-exp-container">
                            <div class="inc">
                            <h4 class="black">Income</h4>
                            <p id="money-plus" class="money plus">$' . $row['sum(price)'] . '</p>
                            </div>';  
                        
                    }

                }else{
                    echo '<h1 id="balanceAmount">$0</span>';

                    echo '<div class="inc-exp-container">
                                <div class="inc">
                                <h4 class="black">Income</h4>
                                <p id="money-plus" class="money plus">$0</p>
                                </div>';
                }

                    $sql = "select sum(price) from itemstb where price < 0";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <div class="bal">
                        <h4 class="black">Expense</h4>
                        <p id="money-minus" class="money minus">$' . $row['sum(price)'] . '</p>
                        </div>
                        </div>';
                    }
                }else{
                    echo '<div class="bal">
                        <h4 class="black">Expense</h4>
                        <p id="money-minus" class="money minus">$</p>
                        </div>
                        </div>';
                }

                ?>
            </div>
        </div>
        <div class="history">
            <h4>History</h4>
            <hr>

            <?php 

                include "inc/db.inc.php";
            
                $sql = "select * from itemstb where price > 0";
                $result = mysqli_query($conn, $sql);


                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<div class='items-container'>
                            <div class='item'>
                                <div class='align-content'>
                                    <div class='addItems'>". $row['item_name'] ."</div>
                                </div>
                            </div>
                            <div class='itemCost'>
                                <p>$" . $row['price'] . "</p>
                            </div>
                            <a href='inc/deleteData.inc.php?id=" . $row['id'] . "'><i class='fa-solid fa-square-xmark mark'></i></a>
                        </div>";
                    }

                }else{
                    echo "<div class='items-container'>
                    <div class='item'>
                        <div class='align-content'>
                            <div class='addItems'>No Result Found!</div>
                        </div>
                    </div>
                    <div class='itemCost NA'>
                        <p>N/A</p>
                    </div>
                    </div>";
                }       

                $sql = "select * from itemstb where price < 0";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<div class='items-container'>
                            <div class='item'>
                                <div class='align-content'>
                                    <div class='addItems'>". $row['item_name'] ."</div>
                                </div>
                            </div>
                            <div class='itemCost exp'>
                                <p>$" . $row['price'] . "</p>
                            </div>
                            <a href='inc/deleteData.inc.php?id=" . $row['id'] . "'><i class='fa-solid fa-square-xmark mark'></i></a>
                        </div>";
                    }
                }
            
            ?>

        </div>
        <div class="addTransaction">
            <h4>Add Transaction</h4>
            <hr>
            <div class="text">
                <p>Text</p>
                <form action="inc/dataEntry.inc.php" method="POST">
                    <input type="text" class="itemName" name="itemName" placeholder="Enter Text" value="" required>
                    <p class="amount">Amount</p>
                    <p>(negative - expense,positive - income)</p>
                    <input type="number" class="itemAmount" name="itemPrice" placeholder="Enter Amount" step="any" required>
                    <input type="submit" class="submit" name="submit" value="Add transaction"></input>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>
