<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign IN</title>
</head>
<body style="margin: 0px;padding: 0px;" bgcolor="#E9F3FF">  
    <font face="TH SarabunPSK" style="font-size: 20px;">
        <!--Table ใหญ่ 3x3-->
        <table border="0" bordercolor="black" width="100%" height="968px">
            <!--Row 1-->
            <tr width="100%" height="30%">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <!--Row 2-->
            <tr width="100%" height="40%">
                <td></td>
                <!--Center-->
                <td width="40%" align="center">
                    <form action="authen.php" method="post">
                        <div style="border: 3px solid #0072EF; width:40%; height:383.81px;border-radius: 10px;">
                            <table border="0" bgcolor="white" style="border-radius: 10px;"  width="100%" height="100%" bordercolor="black">
                                <!--header-->
                                <tr align="center"height="30%" >
                                    <td colspan="2">
                                        <font style="font-size: 60px;font-weight:1000;">Sign in</font> 
                                        <hr style="width:75%">
                                    </td>
                                </tr>
                                <!--Input-->
                                <tr align="center" height="45%">
                                    <td colspan="2">
                                        <table border="0" width="50%" height="100%">
                                            <tr>
                                                <td align="left" width="50%">
                                                    <!--Username-->
                                                    <font style="font-size: 25px;"><b>Username: </b></font><br> 
                                                    <input type="text"  placeholder=Username name="username">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  align="left" width="50%">
                                                    <!--Password-->
                                                    <font style="font-size: 25px;"><b>Password: </b></font><br> 
                                                    <input type="Password"  placeholder=Password name="password">                                                
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!--button-->
                                <tr align="center">
                                    <td width="50%">
                                        <!--Reset-->
                                        <button type="reset" style="  
                                        background-color: white;
                                        border: 1px solid rgb(255, 0, 0);
                                        width: 80px;
                                        height:  30px;
                                        text-align: center;
                                        border-radius: 10px;
                                        cursor: pointer;;">
                                            <font style="font-size:17px;"> Reset </font>
                                        </button>
                                    </td>                       
                                    <td>
                                        <!--Submit-->
                                        <button type="submit" style="
                                        background-color: white;
                                        border: 1px solid #0072EF;
                                        width: 80px;
                                        height:  30px;
                                        text-align: center;
                                        border-radius: 10px;">
                                            <font style="font-size:17px;"> Submit </font>
                                        </button> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--Table Layout login-->
                    </form>
                </td>
                <td></td>
            </tr>
            <!--Row 3-->
            <tr width="100%" height="30%">
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </font>
</body>
</html>