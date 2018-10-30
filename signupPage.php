<?php
    session_start();
    if (isset($_SESSION['id'])) {
        header("Location: home.php");
    }    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Monkey Tuxedo - Sign up</title>
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
                    <li><a href="signupPage.php" style="text-decoration: underline">Sign up</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
        
        <!-- main body; sign up -->
        <div class="container">
            <div class="login">
                <form method="POST" action="php/signup.php">                    
                    <p style="text-decoration: none">Inregistreaza un cont</p>
                    <input type="text" name="name" placeholder="Nume" required><br>          
                    <input type="text" name="surname" placeholder="Prenume" required><br>
                    <input type="text" name="username" placeholder="Utilizator" required><br>
                    <input type="email" name="email" placeholder="Email" required><br>
                    <input type="password" name="password" placeholder="Parola" required><br>
                    <input type="password" name="repeat_password" placeholder="Repeta parola" required><br>
                    <div class="button-signup">
                        <input type="submit" value="Sign up">
                    </div>
                    <?php
                        if (isset($_GET['info']) && $_GET['info'] == 'ok') {
                            echo '<p style="text-align: center; font-size: 20px; color: green; text-decoration: none">Contul a fost creat cu succes! :)</p>';
                        } else if (isset($_GET['info']) && $_GET['info'] == 'eroare'){
                            echo '<p style="text-align: center; font-size: 20px;color: red; text-decoration: none">Contul nu a putut fi creat :(</p>';
                        } else if (isset($_GET['info']) && $_GET['info'] == 'exista'){
                            echo '<p style="text-align: center; font-size: 20px;color: red; text-decoration: none">Username-ul exista deja</p>';
                        } else if (isset($_GET['info']) && $_GET['info'] == 'parola_incorecta'){
                            echo '<p style="text-align: center; font-size: 20px;color: red; text-decoration: none">Parola trebuie sa aiba minim 7 caractere<br>
                            Parola din campul "Repeta parola" trebuie sa fie identica cu parola din campul "Parola"</p>';
                        }                   
                    ?>                    
                </form>
            </div>
        </div>

        <!-- footer -->
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
    </body>
</html>
