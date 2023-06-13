<?php
include("./private/initialize.php");
include ("./conn.php");


if(isset($_POST['login']))
{
	
	try{

	
		if(empty($_POST['username'])){
			throw new Exception("Username is required!");
			
		}
		if(empty($_POST['password'])){
			throw new Exception("Password is required!");
			
		}

        if($_POST['logas'] == 'admin'){
            
		$row=0;
		$result=mysqli_query($conn,"select * from admin where username='$_POST[username]' and pass='$_POST[password]'");

		$row=mysqli_num_rows($result);

		if($row>0){
			session_start();
			$_SESSION['name']= "admin";
			header('location: admin/editMenu.php');
		}

		else{
			throw new Exception("Username,Password or Role is wrong, try again!");
			header('location: login.php');
		}
        }

        if ($_POST['logas'] == 'employee'){
        $row=0;
		$result=mysqli_query($conn,"select * from employee where username='$_POST[username]' and pass='$_POST[password]'");

		$row=mysqli_num_rows($result);

		if($row>0){
            session_start();
			$_SESSION['name']= "waiter";
			header('location: employee/seller.php');
		}

		else{
			throw new Exception("Username,Password or Role is wrong, try again!");
			header('location: login.php');
		}
        }
		

	}


	catch(Exception $e){
		$error_msg=$e->getMessage();
	}
}
?>
<!DOCTYPE html>   
  <html class="no-js"> 
<!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./styles/sign-in.css">
    </head>
    <body>
        <div id = "header-container">

            <div id = "nav-bar">
                <div id = "first-nav" class="nav-ul-container">
                    <img id = "logo-img" src="../imgs/logo.png" alt="cafe-logo">
                    <h1 id = "cafe-name">መዓድ</h1>
                </div>

                <div id = "more-nav" class="nav-ul-container">
                        <!-- <a href="">የምግብ ማውጫ</a> -->
                        <a href="">ስለእኛ</a>
                        <a href="">ያነጋግሩን</a>
                </div>
            </div>
            <div id = "sign-up-form">
                <form method="POST">
                    <div>
                        <label for="">የመለያ ስም</label>
                        <input type ="text" name="username" required> 
                    </div>
                    <div>
                        <label for="">የይለፍ ቃል</label>
                        <input type ="password" name="password" required>
                    </div>
                    <div>
                        <label for="">Log as </label>
                        <select name="logas">
                            <option value="employee" selected>employee</option>
                            <option value="admin">admin</option>
                    </div><br>
                    <div class = "make-center">
                        <input id="sign-in-button" type = "submit" name="login" value="ይግቡ">
                    </div>
                </form>
            </div>
        </div>
        <footer>
            <div>
                <a href="">Email us</a>    
                <p>Our <address>afkldjalks</address></p>
                <p>Our <address>afkldjalks</address></p>
                <p>Our <address>afkldjalks</address></p>
                <p>Our <address>afkldjalks</address></p>
                <p>Our <address>afkldjalks</address></p>
            </div>
            <div>
                <a href="">Email us</a>    
                <p>Our <address>afkldjalks</address></p>
                <p>Our <address>afkldjalks</address></p>
                <p>Our <address>afkldjalks</address></p>
                <p>Our <address>afkldjalks</address></p>
                <p>Our <address>afkldjalks</address></p>
            </div>
        </footer>
        <script src="" async defer></script>
    </body>
</html>