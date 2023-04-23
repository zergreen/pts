<?php
    include "./session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is my index</title>
</head>
<body>
    <center>
        <?php
            echo "<h1>User ID: ".$_SESSION['id']."  Name:  ".$_SESSION['name']."   ".$_SESSION['surname']."</h1>";
        ?>
        <form action="confirmbuy.php" method="post">
            <table border="1" align="center">
                <tr>
                    <th>Stock_ID</th>
                    <th>Stock_Name</th>
                    <th>Quantity</th>
                    <th>Price Per Unit</th>
                    <th>Amount</th>
                </tr>
                <?php
                    include "connectdb.php";
                    $showdata = "SELECT 	
                                    Stock_ID,
                                    Quantity,
                                    Stock_Name,
                                    Priceperunit
                                FROM 
                                    pts_stock;";

                    $result = $conn->query($showdata);
                    $conn->close();

                    while($row = $result->fetch_assoc()) {
                        echo "  <tr valign=center align='center'>
                                    <td>".$row["Stock_ID"]."</td>
                                    <td align='left'><b>".$row["Stock_Name"]."</b></td>
                                    <td>".$row["Quantity"]."</td>
                                    <td>".$row["Priceperunit"]."</td>
                                    <td><input type='number' name='amount[]' value='0'></td>
                                </tr>   ";
                    }
                ?>
            </table>
            <br>
            <button type="submit">BUY</button>
            <button type="reset">RESET</button>
        </form>
    </center>
</body>
</html>