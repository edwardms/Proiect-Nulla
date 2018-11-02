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
        <title>Monkey Tuxedo - Blackjack</title>
        <link href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
        <link href="css/style.css" rel="stylesheet">
        <link href="css/blackjackSPstyle.css" rel="stylesheet">
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
                    <li><a href="blackjackSP.php" style="text-decoration: underline">Blackjack</a></li>
                    <li><a href="#">Galerie foto</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
        
        <!-- main body; blackjack -->        
        <div class="blackjack-body">
            <div class="container">
                <div class="titlu">
                    <p id="welcome">Bun venit la Blackjack!</p>
                </div>
                <div class="joc">
                    <p id="mesaj-pre-joc">Vrei sa iti cheltuiesti tot salariul la Blackjack?</p><br>
                    <input type="submit" id="buton-da" value="DA">
                    <input type="submit" id="buton-nu" value="DA">
                    <p id="zona-jucator">JUCATOR:</p>
                    <p id="zona-scor-jucator">Scor Jucator:</p><br>
                    <p id="zona-dealer">DEALER:</p>
                    <p id="zona-scor-dealer">Scor Dealer:</p>
                    <input type="submit" value="New Game" id="buton-newgame">
                    <input type="submit" value="Deal" id="buton-deal">
                    <input type="submit" value="Stay" id="buton-stay">
                    <p id="zona-final-joc"></p>
                </div>
            </div>
        </div>

        <script src="js/blackjack.js"></script>

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
