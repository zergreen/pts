<?php
    session_start();
    if ($_SESSION['key'] != "admin"){
        header('Location: /pts/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #styletable {
            border: 1px solid black;
        }
        #styletable2 {
            border: 1px solid black;
            border-collapse: collapse;          
        }
        .border {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        include "./connectdb.php";
        $orderid = $_SESSION['orderid'];
        $showdata = "SELECT 	
                    Order_ID,
                    Order_Price,
                    Order_Date,
                    E_ID
                    FROM 
                        pts_order WHERE Order_ID = $orderid;";
        $result = $conn->query($showdata);
        $a = $result->fetch_assoc();

        $showname = "SELECT
                        E_ID, 	
                        E_Name,		
                        E_Surname,
                        E_Address
                    FROM 
                        pts_employee WHERE E_ID = ".$a["E_ID"].";";
        // print_r ($showname);

        $result = $conn->query($showname);
        $header = $result->fetch_assoc();   
        // print_r ($header);          
    ?>
    <font size=2>
    <center>
        <table id="styletable" align="center" width="27%" height="100%">
            <tr>
                <td>
                    <table border=0 align="center" width="100%" height="100%">
                        <tr height= 10%>
                            <td align=center>
                                <h1>ใบกำกับภาษีแบบย่อ</h1>
                            </td>
                        </tr>
                        <tr height=60%>
                            <td valign=top>
                                <table width=100% height=15% border=0>
                                    <tr>
                                        <td width=19%><font style="margin-left:15px">รหัสลูกค้า</td>
                                        <td width=1%><font style="font-size:20px">:</td>
                                        <td width=40%><font style="margin-left:15px"><?php echo $header["E_ID"]; ?></td>
                                        <td width=20% rowspan=2 valign=bottom><font style="margin-left:25px">หมายเลข Order</td>
                                    </tr>
                                    <tr>
                                        <td width=19%><font style="margin-left:15px">ชื่อ-สกุล</td>
                                        <td width=1%><font style="font-size:20px">:</td>
                                        <td width=40%><font style="margin-left:15px"><?php echo $header["E_Name"]."   ".$header["E_Surname"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td width=19%><font style="margin-left:15px">ที่อยู่การสั่งซื้อ</td>
                                        <td width=1%><font style="font-size:20px">:</td>
                                        <td width=40%><font style="margin-left:15px"><?php echo $header["E_Address"]; ?></td>
                                        <td width=20% valign=top align=center style="font-size:30px" rowspan=2><font ><?php echo $a["Order_ID"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td width=19%><font style="margin-left:15px">เวลาที่ทำรายการ</td>
                                        <td width=1%><font style="font-size:20px">:</td>
                                        <td width=40%><font style="margin-left:15px"><?php echo $a["Order_Date"]; ?></td>
                                    </tr>
                                </table>
                                <hr>
                                <table width=100% height=75%>
                                    <tr height=5% >
                                        <td class="border" align=center colspan=6><h3>รายการสินค้า</h3></td>
                                    </tr>
                                    <tr height=50px>
                                        <th>Item</th>
                                        <th>Stock_ID</th>
                                        <th>Stock_Name</th>
                                        <th>Price Per Unit</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                    </tr>
                                    <?php
                                        // print $a["Order_ID"];
                                        $getdetail = "SELECT 	
                                                        Stock_ID,		
                                                        Stock_Name,
                                                        Priceperunit,
                                                        Amount,
                                                        Price 
                                                    FROM 
                                                        pts_orderdetail WHERE Order_ID = ".$a["Order_ID"].";";

                                        // print $getdetail;
                                        $result = $conn->query($getdetail);
                                        $row = $result->fetch_all();
                                        $rowcount = mysqli_num_rows($result);
                                        // print_r($row);

                                        for ($i=0; $i <$rowcount; $i++) { 
                                                echo "<tr valign=center align='center' height=35px>
                                                        <td>".($i+1)."</td>
                                                        <td>".$row[$i][0]."</td>
                                                        <td>".$row[$i][1]."</td>
                                                        <td>".$row[$i][2]."</td>
                                                        <td>".$row[$i][3]."</td>
                                                        <td>".$row[$i][4]."</td>
                                                    </tr>";
                                        }

                                        // for ($i=0; $i <8; $i++) { 
                                        //     if($i<$rowcount){
                                        //         echo "<tr valign=center align='center' height=10%>
                                        //                 <td>".($i+1)."</td>
                                        //                 <td>".$row[$i][0]."</td>
                                        //                 <td>".$row[$i][1]."</td>
                                        //                 <td>".$row[$i][2]."</td>
                                        //                 <td>".$row[$i][3]."</td>
                                        //                 <td>".$row[$i][4]."</td>
                                        //             </tr>";
                                        //     }else{
                                        //         echo "<tr valign=center align='center' height=10%>
                                        //                 <td></td>
                                        //                 <td></td>                                                        
                                        //                 <td></td>
                                        //                 <td></td>                                                        
                                        //                 <td></td>
                                        //                 <td></td>                                                    
                                        //                 </tr>";
                                        //     }
                                        // }


                                        // $i = 0;
                                        // while($row = $result->fetch_assoc()&&$i<8) {
                                        //     echo "<tr valign=center align='center' height=10%>
                                        //             <td>".$count."</td>
                                        //             <td>".$row['Stock_ID']."</td>
                                        //             <td>".$row['Stock_Name']."</td>
                                        //             <td>".$row['Priceperunit']."</td>
                                        //             <td>".$row['Amount']."</td>
                                        //             <td>".$row['Price']."</td>
                                        //         </tr>";
                                        //     $count++;   
                                        //     $i++;
                                        // }
                                    ?>
                                </table>
                                <hr>
                            </td>
                        </tr>
                        <tr height=15%>

                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
    </font>
</body>
</html>