<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: ../home.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Monkey Tuxedo - Galerie foto</title>
        <link href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
        <link href="css/style.css" rel="stylesheet">
        <link href="css/galerieSPstyle.css" rel="stylesheet">
    </head>

    <body>
        <!-- header -->
        <div class="container">
            <div class="nav-bar">
                <a href="homeSP.php">
                    <img src="img/monkey-logo.png" alt="logo.jpg">
                </a>
                <ul>
                    <li><a href="homeSP.php">Home</a></li>
                    <?php
                        if (!isset($_SESSION['id'])) {
                            echo '<li><a href="../signupPage.php">Sign up</a></li>';
                        }
                    ?> 
                    <li><a href="diverseSP.php">Diverse</a></li>
                    <li><a href="blackjackSP.php">Blackjack</a></li>
                    <li><a href="galerieSP.php" style="text-decoration: underline">Galerie foto</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
        
        <!-- main body; galerie -->        
        <div class="galerie">
            <div class="container">
                <div>
                    <img src="poze_galerie/xampp.jpg" alt="a">
                    <img src="poze_galerie/apachehttpserver.jpg" alt="b">
                    <img src="poze_galerie/mariadb.jpg" alt="c">
                </div>
                <div>
                    <img src="poze_galerie/php.jpg" alt="a">
                    <img src="poze_galerie/html.jpg" alt="b">
                    <img src="poze_galerie/css.jpg" alt="c">
                </div>
                <div>
                    <img src="poze_galerie/javascript.jpg" alt="a">
                    <img src="poze_galerie/phpmyadmin.jpg" alt="b">
                    <img src="poze_galerie/visualstudiocode.jpg" alt="c">
                </div>
            </div>
        </div>

        <!-- footer -->
        <footer>
        <div class="footer-bar">
            <div class="container">
                <div>
                    <p>Informatii site</p><br>
                </div>
                <div>
                    <p>Monkey Tuxedo &copy;All copyrights reserved 2018 | edwardms&reg;</p>
                </div>
            </div>
        </div>
        </footer>
    </body>
</html>
