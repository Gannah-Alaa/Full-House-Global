<?php
include "connection.php";


$error=FALSE;
$empty=FALSE;

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    if(empty($email) || empty($pass)){
        $empty=TRUE;
    }else{
        $select="SELECT * FROM `admin` WHERE `Admin_email` = '$email'";
        $runSelect=mysqli_query($connect,$select);
        $rows=mysqli_num_rows($runSelect);

        if ($rows>0){
            $fetch=mysqli_fetch_Assoc($runSelect);
            $fetch_em=$fetch['Admin_email'];
            $fetchPass=$fetch['password'];


            if(password_verify($pass,$fetchPass)){
                $adminId=$fetch['Admin_id'];
                $_SESSION['Admin_id']=$adminId;
                header("location:index.html");  //change header later 
            }else{
                $error=TRUE;
            }
        }else{
            $error=TRUE;
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fullhouseglobal</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    

<div class="container"> 
    <div class="heading">Log In</div>
    <form action="" method="POST" class="form">
      <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
      <input required="" class="input" type="password" name="pass" id="password" placeholder="Password">
      <span class="forgot-password"><a href="#">Forgot Password ?</a></span>
      <input class="login-button" name="login" type="submit" value="Sign In">
      
    </form>

  </div>

</body>
</html>