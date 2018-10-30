<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Monkey Tuxedo - Home</title>
        <link href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- header -->
        <div class="container">
            <div class="nav-bar">
                <a href="home.php">
                    <img src="img/monkey-logo.png" alt="logo.jpg">
                </a>
                <ul>
                    <li><a href="home.php" style="text-decoration: underline">Home</a></li>
                    <?php
                        if (!isset($_SESSION['id'])) {
                            echo '<li><a href="signupPage.php">Sign up</a></li>';
                        }
                    ?>                    
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>

        <!-- main body; login -->
        <?php
            if (!isset($_SESSION['id'])) {
                echo '
                <div class="container">
                    <div class="login">
                        <form method="POST" action="php/login.php">
                            <p>Bine ai venit!</p>
                            <input type="text" name="username" placeholder="Utilizator"><br>
                            <input type="password" name="password" placeholder="Parola"><br>
                            <input type="submit" value="Sign in">
                        </form>                        
                    </div>
                </div>
                ';                
                if (isset($_GET['info']) && $_GET['info'] == 'gresit') {
                    echo '<p style="text-align: center; font-size: 20px;color: red; text-decoration: none">Parola este gresita</p>';
                }
            } else {
                header("Location: second_part/homeSP.php");
            }
        ?>             

        <!-- footer -->
        <div class="container">
            <div class="footer-bar">
                <div>
                    <p>Informatii site</p><br>
                </div>
                <div>
                    <p>Monkey Tuxedo &copy;All copyrights reserved 2018 | edwardms&reg;</p>
                </div>
                
            </div>
        </div>
    </body>
</html>
