<?php
    include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "connectdb.php";
        $amount = $_POST['amount'];
    ?>
    
    <center>
        <table border=1 align=center>
            <tr >
                <th>Stock_ID</th>
                <th>Stock_Name</th>
                <th>Price Per Unit</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>

            <?php
                $sql = "SELECT Stock_ID,Stock_Name,Quantity,Priceperunit FROM pts_stock WHERE Stock_ID Order By Stock_ID";
                $result = $conn->query($sql);
                $i = 0;
                $check = True;
                $sum =0;

                $data=array();

                while($row = $result->fetch_assoc()) {
                    if($amount[$i] > 0){
                        echo "  <tr valign=center align='center'>
                                    <td>". $row["Stock_ID"] ."</td>
                                    <td>". $row["Stock_Name"] ."</td>
                                    <td>". $row["Priceperunit"] ."</td>
                                    <td>". $amount[$i] ."</td>";
                                    
                            if($row["Quantity"] >= $amount[$i]){
                                echo "<td><font color='green'> Success!</font></td>";
                                $sum += $row["Priceperunit"]*$amount[$i];
                            }else{
                                echo "<td><font color='Red'> Not enough! </font></td>";
                                $check = FALSE;
                            }
                        echo    "</tr>";
                        array_push($data, array($row["Stock_ID"],$amount[$i]));
                    }
                    $i++;
                }
                $_SESSION["data"] = $data;
                $_SESSION["sum"] = $sum;
            ?>
        </table>
        <br>
        <h3>TOTAL : <?php echo $sum;?></h3>
        <br>
        <form action="buy.php" method="post">
            <?php
                if($check){
                    echo "  <button type='submit'>BUY</button></form>
                            <br>
                            <button onclick='history.back()'>CANCEL</button>";
                }else{
                    echo "<h4>Item Not Enough</h4> </form>";
                    echo "<button onclick='history.back()'>CANCEL</button>";
                }
            ?>
    </center>
    <?php
        $conn->close(); 
    ?>
</body>
</html>