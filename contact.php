<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Monkey Tuxedo - Contact</title>
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
                    <li><a href="home.php">Home</a></li>
                    <?php
                        if (!isset($_SESSION['id'])) {
                            echo '<li><a href="signupPage.php">Sign up</a></li>';
                        }
                    ?> 
                    <li><a href="contact.php"style="text-decoration: underline">Contact</a></li>
                </ul>
            </div>
        </div>
        
        <!-- main body; contact -->
        <div class="container">
            <div class="login">
                <form method="POST" action="php/contact.inc.php">
                    <p style="text-decoration: none">Contact</p>
                    <h1 style="text-align: center">Pentru orice fel de intrebari si probleme, adresati-va administratorului site-ului completand casutele de mai jos</h1><br>
                    <input type="text" name="name" placeholder="Nume" required><br>
                    <input type="email" name="email" placeholder="Email" required><br>
                    <textarea name="zona-text" cols="40" rows="5" placeholder="Mesajul tau..." required></textarea><br>
                    <input type="submit" value="Submit">
                </form>                
            </div>           
        </div>
        <?php
            if (isset($_GET['info']) && $_GET['info'] == 'mesaj_trimis') {
                echo '<p style="text-align: center; font-size: 20px; color: green; text-decoration: none">Mesajul tau a fost trimis cu succes! :)<br>
                Administratorul site-ului te va contacta, pe adresa de email furnizata, cat de curand posibil</p>';
            } else if (isset($_GET['info']) && $_GET['info'] == 'mesaj_esuat') {
                echo '<p style="text-align: center; font-size: 20px;color: red; text-decoration: none">Mesajul tau nu a putut fi trimis! :( <br>
                Asigurate ca toate casutele sunt completate si mesajul are minim 10 caractere</p>';
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
