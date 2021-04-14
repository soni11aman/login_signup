<?php 
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_rely');
    session_start();
    if($_SESSION['logout']=="1")
    header("Location:index.php");
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM details WHERE email='$email'";
    $res = mysqli_query($con,$sql);
    $p = mysqli_fetch_row($res);
    $user = $p['1'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body{
            background-image:url('welcome.webp');
            background-size:cover;
            background-position:center;
            background-attachment:fixed;
            background-repeat: no-repeat;
            overflow: hidden;
        }
        a{
            text-decoration:none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-default" style="border-bottom: 2px solid rgb(138, 132, 132);">
	  <a class="navbar-brand"  style="text-align:left; color:black;" href="#"><u>RELY-LABS</u></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link"   style="font-family:algerian;text-align:right; color:black" href="logout.php"><i>LOGOUT</i> </a>
            </ul>
	    </div>
	</nav>
    <h2 style="margin-top:200px; text-align:center">WELCOME <?php echo $user ; ?></h2>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</html>