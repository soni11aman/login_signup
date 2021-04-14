<?php
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_rely');
    session_start();
    $_SESSION['logout']="1";
    if(isset($_POST['submit'])){
        // check if email already exists or not
        $email = $_POST['email'];
        $nam = $_POST['name'];
        $pwd = $_POST['pwd'];
        $sql = "SELECT * FROM details WHERE email='$email' ";
        $res = mysqli_query($con,$sql);
        $n = mysqli_num_rows($res);
        if($n>0){
            echo "<script> alert('This email is already being used');</script>";
            header("Location: signup.php");
        }
        else {
            $sql = "INSERT INTO details(nam,email,pwd) VALUES('$nam','$email','$pwd')";
            mysqli_query($con,$sql);
            $_SESSION['name']= $nam;
            $_SESSION['email']= $email;
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="main">
        <div>
            <h2 class="center">CREATE ACCOUNT</h2>
        </div>
        <div class="form">
            <form action="signup.php" method="POST">
                <table>
                    <tr><td><input size="40" type="text" name="name" placeholder="Your name" required></td></tr>
                    <tr><td><input size="40" type="email" name="email" id="" placeholder="Your Email " required></td></tr>
                    <tr><td><input size="40" type="password" name="pwd" id="" placeholder="Password" required></td></tr>
                    <tr><td><input size="40" type="password" name="cpwd" id="confirm password" placeholder="Confirm password" required></td></tr>
                    <tr><td><input size="40" type="submit" name="submit" id="" value="SIGN UP" ></td></tr>
                </table>
                <h5>Have already an account?<a href="index.php">Login here</a></h5>
            </form>
        </div>
    </div>
</body>
</html>