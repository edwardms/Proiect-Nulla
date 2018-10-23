<?php
    session_start();
    require 'conectare.php';

    if (!empty($_POST['name']) && !empty($_POST['email']) && 
        !empty($_POST['zona-text']) && !ctype_space($_POST['name']) &&
        !ctype_space($_POST['email']) && !ctype_space($_POST['zona-text']) && 
        strlen($_POST['zona-text']) >= 10) {

        $nume = $_POST['name'];
        $mail = $_POST['email'];
        $zonaText = $_POST['zona-text'];

        $sql = "INSERT INTO mesaje_utlizatori (nume, email, mesaj) VALUES ('$nume', '$mail',       '$zonaText')";
        $result = mysqli_query($conectare, $sql);

        header("Location: ../contact.php?info=mesaj_trimis");
    } else {
        header("Location: ../contact.php?info=mesaj_esuat");
    }
?>