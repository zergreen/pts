<?php
    include "session.php";
    include "connectdb.php";
    $data = $_SESSION["data"];
    $id = "";
    $counter = 0;

    $getlastrecord="SELECT 
                        Order_ID
                    FROM 
                        pts_order
                    ORDER BY 
                        Order_ID 
                    DESC LIMIT 1;
    ";
    $result = $conn->query($getlastrecord);
    $row = $result->fetch_assoc();

    $lastorderid = ($row["Order_ID"]+1);


    $insertorder="INSERT INTO pts_order 
                    (Order_ID, E_ID, Order_Date, Order_Price)
                VALUES 
                    (".$lastorderid.", ".$_SESSION['id']." , CURRENT_TIMESTAMP, ".$_SESSION["sum"].")";
    $result = $conn->query($insertorder);


    foreach($data as $value){
        $showdata ="SELECT 	
                        Stock_ID,
                        Stock_Name,
                        Priceperunit,
                        Quantity
                    FROM 
                        pts_stock
                    WHERE
                        Stock_ID = $value[0];";
        $result = $conn->query($showdata);       
        $row = $result->fetch_assoc();
        // print "ID: ".$value[0]."   Quantity: ".$row["Quantity"]."   <br>";

        $updatedata="UPDATE 
                        pts_stock
                    SET 
                        Quantity = ".($row["Quantity"]-$value[1])."
                    WHERE 
                        Stock_ID = $value[0];";

        $result = $conn->query($updatedata);

        $price = $value[1]*$row["Priceperunit"];

        $insertorderdetail ="INSERT INTO pts_orderdetail 
                                (Order_ID, Stock_ID, Stock_Name, Price, Priceperunit, Amount, Update_Date)
                            VALUES 
                            (".$lastorderid.", '".$row["Stock_ID"]."', '".$row["Stock_Name"]."', ".$price.", ".$row["Priceperunit"].", ".$value[1].", CURRENT_TIMESTAMP);";
        
        $result = $conn->query($insertorderdetail);

    }
    header("Location: index.php");
?>