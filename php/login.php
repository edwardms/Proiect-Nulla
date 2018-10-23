<?php
    session_start();
    require 'conectare.php';

    if (!empty($_POST['username']) && !empty($_POST['password']) &&
        !ctype_space($_POST['username']) && !ctype_space($_POST['password'])) {

        $utilizator = $_POST['username'];
        $parola = $_POST['password'];

        $sql = "SELECT * FROM users WHERE utilizator='$utilizator'";
        $result = mysqli_query($conectare, $sql);

        $row = $result -> fetch_assoc();
        $hash = $row['parola'];
        $check = password_verify($parola, $hash);
        if ($check == 0) {
            header("Location: ../home.php?info=gresit");
        } else {
            $sql = "SELECT * FROM users WHERE utilizator='$utilizator' AND parola='$hash'";
            $result = mysqli_query($conectare, $sql);

            if (!$row = $result -> fetch_assoc()) {
                echo 'Parola sau username-ul nu se potrivesc';
            } else {
                $_SESSION['id'] = $row['id'];
                $_SESSION['nume'] = $row['nume'];
                $_SESSION['prenume'] = $row['prenume'];
                $_SESSION['utilizator'] = $row['utilizator'];
                $_SESSION['email'] = $row['email'];
            }

            header("Location: ../home.php?info=logat");
        }
    } else {
        header("Location: ../home.php?info=gresit");
        session_destroy();
    }

?>
