<?php 
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_rely');
    session_start();
    $_SESSION['logout']="1";
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $sql = "SELECT * FROM details WHERE email='$email'";
        $res = mysqli_query($con,$sql);
        $n = mysqli_num_rows($res);
        if($n==0){
            echo "<script> alert('Email or username is wrong..!!');</script>";
            header("Location: index.php");
        }
        else{
            $p = mysqli_fetch_row($res);
            $cpwd = $p['3'];
            if($pwd == $cpwd){
                $_SESSION['name']= $p['1'];
                $_SESSION['email']= $email;
                $_SESSION['logout']="0";
                header("Location: user.php");
            }
            else{
                echo "<script> alert('Email or username is wrong..!!');</script>";
                header("Location: index.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="main">
        <div class="logo">
            <img src="login.png" alt="">
        </div>
        <div class="cred">
            <div>
            <h2>Log In</h2>
            </div>
            <div class="form">
                <form action="index.php" method="POST">
                    <table>
                        <tr><td class="center" ><i class="fa fa-user icon"></i><input size="38" type="email" name="email" placeholder="Your email" required></td></tr>
                        <tr><td class="center"><i class="fa fa-lock icon"></i><input size="38" type="password" name="pwd" placeholder="Password" required></td></tr>
                        <tr><td class="center"><input type="submit" name="submit" value="Log In"></td></tr>
                    </table>
                </form>
            </div>
            <div class="right new">
                <a href="signup.php">Create an account</a>
            </div>
        </div>
    </div>
</body>
</html>