<?php
    session_start();
    include "./connectdb.php";
?>
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    $showdata = "SELECT 	
                    E_ID,	
                    E_Name,	
                    E_Surname,
                    E_Role,
                    E_Address
                FROM pts_employee WHERE E_Username='$username' AND (E_Password = '$password');";
    $result = $conn->query($showdata);
    $conn->close();

    $rowcount = mysqli_num_rows($result);

    $row = $result->fetch_assoc();

    if($rowcount == 1){

        $_SESSION['id']=$row["E_ID"];
        $_SESSION['name']=$row["E_Name"];
        $_SESSION['surname']=$row["E_Surname"];
        $_SESSION['key']=$row["E_Role"];
        $_SESSION['address']=$row["E_Address"];
        
        if($_SESSION['key'] == "admin"){
            header("Location: ./operator/index.php");
        }else {
            header("Location: ./user/index.php");
        }
    }else {
        header("Location: index.php");
    }

    // if($rowcount == 1){

    //     $_SESSION['id']=101;
    //     $_SESSION['name']="John";
    //     $_SESSION['surname']="Admin";
    //     $_SESSION['key']="admin";
    //     $_SESSION['address']="amhome";
        
    //     if($_SESSION['key'] == "admin"){
    //         header("Location: ./operator/index.php");
    //     }else {
    //         header("Location: ./user/index.php");
    //     }
    // }else {
    //     header("Location: index.php");
    // }
?>