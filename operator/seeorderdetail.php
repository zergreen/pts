<?php
    include "./session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is OrderDetail</title>
</head>
<body>
    <center>
        <?php
            $orderid = $_GET["orderid"];
            $_SESSION['orderid'] = $orderid;
            $count = 1;
        ?>
        <table border=1 width=40%>
                <tr width=100%>
                    <th>Item</th>
                    <th>Stock_ID</th>   
                    <th width=50%>Stock_Name</th>
                    <th>Price Per unit</th>
                    <th>Amount</th>
                    <th>Price</th>
                </tr>
                <?php
                    include "connectdb.php";

                    $showdata = "SELECT 	
                                    Order_ID,
                                    Order_Price
                                FROM 
                                    pts_order WHERE Order_ID = $orderid;";
                    $result = $conn->query($showdata);
                    $a = $result->fetch_assoc();
    
                    $showdata = "SELECT 	
                                    Stock_ID,		
                                    Stock_Name,
                                    Priceperunit,
                                    Amount,
                                    Price 
                                FROM 
                                    pts_orderdetail WHERE Order_ID = ".$a["Order_ID"].";";
                    $result = $conn->query($showdata);
                    $conn->close();

                    while($row = $result->fetch_assoc()) {
                        echo "<tr valign=center align='center'>
                                <td>".$count."</td>
                                <td>".$row['Stock_ID']."</td>
                                <td>".$row['Stock_Name']."</td>
                                <td>".$row['Priceperunit']."</td>
                                <td>".$row['Amount']."</td>
                                <td>".$row['Price']."</td>
                            </tr>";
                        $count++;   
                    }
                ?>
                <tr valign=center>
                    <td align=Center colspan=5>
                        <font size=4>TOTAL</font>
                    </td>
                    <td>
                        <?php echo"<font size=4>".$a["Order_Price"]."</font>";?>
                    </td>
                </tr>
            </table>
            <br><br>
            <form action="printreport.php" method="post">
                <button type="submit"><font size=4>PRINT REPORT</font></button>
            </form>
    </center>
</body>
</html>