<?php
    $A_email = $_POST['A_email'];
    $A_password = $_POST['A_password'];
    $A_id = $_POST['A_id'];
    $A_Firstname = $_POST['A_Firstname'];
    $A_Lastname = $_POST['A_Lastname'];


    $con= new mysqli("localhost","root","","project");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);

    }else{
        $stmt = $con->prepare("select * from admin_db where A_email = ?");
        $stmt->bind_param("s",$A_email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['A_password'] === $A_password){
                Header("Location: admin/index.php");
            }else{
                echo "<script>";
                echo "alert(\" E-mail หรือ  password ของคุณไม่ถูกต้อง\");"; 
                echo "window.history.back()";
                echo "</script>";
            }

        }else{
            echo "<script>";
                echo "alert(\" E-mail หรือ  password ของคุณไม่ถูกต้อง\");"; 
                echo "window.history.back()";
            echo "</script>";

          }
    }
?>