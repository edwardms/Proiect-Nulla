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
        <title>Monkey Tuxedo - Diverse</title>
        <link href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">  
        <link href="css/style.css" rel="stylesheet">
        <link href="css/diverseSPstyle.css" rel="stylesheet">
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
                    <li><a href="diverseSP.php" style="text-decoration: underline">Diverse</a></li>
                    <li><a href="blackjackSP.php">Blackjack</a></li>
                    <li><a href="galerieSP.php">Galerie foto</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
        
        <!-- main body; random stuff -->
        <div class="video-container">
            <div class="container">
                <video poster="img/poker_cats.jpg" width="1000px" height="580px" controls>
                    <source type="video/mp4" src="video/cat_plays_blackjack.mp4">
                </video>
            </div>       
        </div>

        <div class="ipsum">
            <div class="container">
                <h1> Ipsum Lorem </h1>
                <p>Duis posuere sodales accumsan. Quisque risus sem, ullamcorper eu porta in, pharetra vitae lectus. Vestibulum vel elit orci. Phasellus accumsan justo nulla, at rutrum enim pellentesque vel. Aenean consectetur efficitur odio. Etiam lobortis nunc a suscipit ornare. Aliquam pellentesque mauris magna, eget dignissim felis pretium et. Quisque egestas velit nunc, in vehicula nibh fermentum nec. Etiam elementum gravida maximus. Nulla non lobortis justo, iaculis laoreet justo. Suspendisse diam leo, molestie ac orci quis, tempor hendrerit ipsum. Donec luctus, turpis mollis aliquet porttitor, mi urna ultrices dui, a convallis mi tellus in metus. Phasellus a mi ante. Vestibulum imperdiet nunc sit amet lectus pharetra molestie. Morbi commodo imperdiet elementum. </p>
            </div>       
        </div>
        
        <div class="castele">
            <div class="container">
                <article class="peles">
                    <img src="img/peles.jpg" alt="peles.jpg">
                    <h1>Castelul Peles</h1>
                    <p>Castelul Peleș este un palat din Sinaia, construit între 1873 și 1914. Construită ca reședință de vară a regilor României, clădirea se află, în prezent, în proprietatea Familiei Regale a României și adăpostește Muzeul Național Peleș.
                    Castelul Peleș este situat în Sinaia, pe Valea Prahovei, (la 44 km de Brașov și la 122 km de București), pe drumul european E60 (DN1). Pe calea ferată există numeroase trenuri care pleacă din Ploiești sau Brașov cu destinația Sinaia. 
                    </P>
                </article>
                <article class="bran">
                    <img src="img/bran.jpg" alt="bran.jpg">
                    <h1>Castelul Bran</h1>
                    <p>Castelul Bran (în germană Törzburg, în maghiară Törcsvár) este un monument istoric și arhitectonic situat în Pasul Bran-Rucăr, la 30 de kilometri de Brașov.
                    Inițial, Castelul Bran a fost o cetate militară de apărare, având la bază forma unui patrulater neregulat. În timp, cetatea a suferit numeroase modificări, printre care: adăugarea turnului de sud (în 1622, după planurile principelui Gabriel Bethlen), construirea unui turn dreptunghiular la est, iar între 1883 și 1886, acoperișul a fost îmbrăcat cu țiglă.                    
                    </P>
                </article>
                <article class="corvinilor">
                    <img src="img/corvinilor.jpg" alt="corvinilor.jpg">
                    <h1>Castelul Corvinilor</h1>
                    <p>Castelul Corvinilor, numit și Castelul Huniazilor sau al Hunedoarei,este cetatea medievală a Hunedoarei, unul din cele mai importante monumente de arhitectură gotică din România.
                    Este considerat unul dintre cele mai frumoase castele din lume, fiind situat în „top 10 destinații de basm din Europa”.
                    Castelul Hunedoarei este cea mai mare construcție medievală cu dublă funcționalitate (civilă și militară) din România aflată încă "în picioare".</P>
                </article>
                <article class="neamt">
                    <img src="img/neamt.jpg" alt="neamt.jpg">
                    <h1>Cetatea Neamt</h1>
                    <p>Cetatea Neamț (cunoscută impropriu sub titulatura Cetatea Neamțului) este o cetate medievală din Moldova, aflată la marginea de nord-vest a orașului Târgu Neamț (în nord-estul României). Ea se află localizată pe stânca Timuș de pe Culmii Pleșului (numită și Dealul Cetății), la o altitudine de 480 m și la o înălțime de 80 m față de nivelul apei Neamțului. De aici, străjuia valea Moldovei și a Siretului, ca și drumul care trecea peste munte în Transilvania.</P>
                </article>
            </div>
        </div>

        <div class="poze_aleatorii">
            <div class="container">
                <h1>Poze aleatorii</h1>
                <p>Apasa butonul de mai jos pentru un set de poze aleatorii</p>
                <input type="submit" value="Apasa aici" id="buton_random"><br><br><br>

                <div>
                    <img src="img/monkey_1.jpg" alt="poza_1" id="imagine_1">
                </div>
                <div>
                    <img src="img/monkey_2.jpg" alt="poza_2" id="imagine_2">
                </div>
                <div>
                    <img src="img/monkey_3.jpg" alt="poza_3" id="imagine_3">
                </div>
            </div>
        </div>

        <div class="linkuri">
            <div class="container">
                <h1>Linkuri utile</h1>
                <a href="https://en.wikipedia.org/wiki/VKontakte">
                    <img src="img/logo_feisbuc.png" alt="facebook_logo">
                </a>
                <a href="https://www.google.ro/search?q=chinese+twitter&num=50&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiJob-GjqzeAhWIGuwKHf7rBPAQ_AUIDigB&biw=1920&bih=916">
                    <img src="img/logo_tuitar.png" alt="twitter_logo">
                </a>
                <a href="https://www.google.ro/search?biw=1920&bih=916&tbm=isch&sa=1&ei=6zrXW5KdJajikgXLk53gCw&q=indian+email&oq=indian+email&gs_l=img.3.0.35i39k1j0i7i30k1l3j0i8i30k1l2j0i24k1l4.3931.5303.0.6649.7.7.0.0.0.0.176.798.4j3.7.0....0...1c.1.64.img..1.6.699...0i8i7i30k1.0.ALe8aPsv9Mg">
                    <img src="img/logo_gimeil.png" alt="gmail_logo">
                </a>
                <a href="http://www.youku.com/">
                    <img src="img/logo_iutub.png" alt="youtube_logo">
                </a>
                <a href="https://www.volkswagen.ro/">
                    <img src="img/logo_volkswagen.png" alt="volkswagen_logo">
                </a>                
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
        <script src="js/image_generator.js"></script>
    </body>
</html>
