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
        <title>Monkey Tuxedo - Home</title>
        <link href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
        <link href="css/style.css" rel="stylesheet">
        <link href="css/homeSPstyle.css" rel="stylesheet">
    </head>

    <body>
        <!-- header -->
        <div class="container">
            <div class="nav-bar">
                <a href="homeSP.php">
                    <img src="img/monkey-logo.png" alt="logo.jpg">
                </a>
                <ul>
                    <li><a href="homeSP.php" style="text-decoration: underline">Home</a></li>
                    <?php
                        if (!isset($_SESSION['id'])) {
                            echo '<li><a href="../signupPage.php">Sign up</a></li>';
                        }
                    ?> 
                    <li><a href="diverseSP.php">Diverse</a></li>
                    <li><a href="blackjackSP.php">Blackjack</a></li>
                    <li><a href="galerieSP.php">Galerie foto</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
        
        <!-- main body; contact -->
         <div class="second-container">
             <div class="container">
                <div class="info-cont">
                    <br>
                    <p>Contul tau</p><br>
                    <p>Nume: &nbsp; <?php echo $_SESSION['nume'] ?></p>
                    <p>Prenume: &nbsp; <?php echo $_SESSION['prenume'] ?></p>
                    <p>Utilizator: &nbsp; <?php echo $_SESSION['utilizator'] ?> <br></p>
                    <p>Email: &nbsp; <?php echo $_SESSION['email'] ?> </p><br>
                    <p>Poza de profil</p><br>

                    <div>
                        <form action="php/poza_profil.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="imagine"><br><br>
                            <input type="submit" value="Incarca poza">
                        </form>
                    </div><br>
                    <div class="poza_profil">
                        <?php                        
                        $dirname = "poze_profil/" . $_SESSION['nume'] . "_" . $_SESSION['prenume'] . ".jpg";                       
                        echo '<img src="' . $dirname . '" alt="Poza de profil nu exista inca. Incarcati o poza"><br>';
                        ?>
                    </div><br>

                    <form action="../php/logout.inc.php" method="post">
                        <input type="submit" Value="Log out">
                    </form>
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
