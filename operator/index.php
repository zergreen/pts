<?php
    include "./session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is Orderlist</title>
</head>
<body>
    <center>
        <?php
            echo "<h1>Admin ID: ".$_SESSION['id']."  Name:  ".$_SESSION['name']."   ".$_SESSION['surname']."</h1>";
        ?>
        <form action="index.php" method="post">
            <h3>Filter By ID</h3>
            <input type="text" name="id" value = 0>
            <button type="submit">Submit</button>
        </form>
            <table border=1 width=40%>
                <tr width=100%>
                    <th>Order_ID</th>   
                    <th>E_ID</th>
                    <th>Order_Date</th>
                    <th>Order_Price</th>
                    <th width=15%>Detail</th>
                </tr>
                <?php
                    include "connectdb.php";
                    $id = 0;
                    $id = $_POST["id"];
                    if($id == 0){
                        $showdata = "SELECT 	
                                    Order_ID,		
                                    E_ID,
                                    Order_Date,
                                    Order_Price 
                                FROM 
                                    pts_order;";
                    }else{
                        $showdata = "SELECT 	
                                        Order_ID,		
                                        E_ID,
                                        Order_Date,
                                        Order_Price 
                                    FROM 
                                        pts_order WHERE E_ID = $id;";
                    }
                    $result = $conn->query($showdata);
                    $conn->close();

                    while($row = $result->fetch_assoc()) {
                        echo "<tr valign=center align='center'>
                                <td>".$row['Order_ID']."</td>
                                <td>".$row['E_ID']."</td>
                                <td>".$row['Order_Date']."</td>
                                <td>".$row['Order_Price']."</td>
                                <td><a href='seeorderdetail.php?orderid=".$row['Order_ID']."'><button><font size=4>SEE ORDER DETAIL</font></button></a></td>
                            </tr>";
                    }
                ?>
            </table>
    </center>
</body>
</html>