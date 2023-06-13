<!-- made responsive -->
<!DOCTYPE html>  

<?php 
    include("./private/initialize.php");
?>

<html>
    <head>
        <meta charset="utf-8">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <title></title>
        <meta name="description" content="">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <link rel="stylesheet" href="./styles/home-page.css">
    </head>
    <body>
        <div id = "header-container">

            <div id = "nav-bar">
                <div id = "first-nav" class="nav-ul-container">
                    <img id = "logo-img" src="./imgs/logo.png" alt="cafe-logo">
                    <h1 id = "cafe-name">መዓድ</h1>
                </div>
                <div id = "more-nav" class="nav-ul-container">
                        <a href="">ስለእኛ</a>
                        <a href="">ያነጋግሩን</a>
                        <a href= <?php echo ROOT_PATH . "/login.php" ?>><button type="submit" id = "sign-up-button">ይግቡ</button></a>
                </div>
            </div>

            <div id = "middle-container">
               
                <div id = "mottos">
                    <p id ="motto"> እንኳን::</p>
                    <p id = "motto-1" class = "white" >በደህና መጡ፡፡</p>
                </div>
                <img id = "spinning-food" src="./imgs/spinning-food.png" alt="spinning-food">
                
            </div>

        </div>
        <div>

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