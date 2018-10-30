<?php

    session_start();

    if (!empty($_FILES['imagine']['name'])) {
        $nume = $_FILES['imagine']['name'];
        $tmp_name = $_FILES['imagine']['tmp_name'];
        $size = $_FILES['imagine']['size'];
        move_uploaded_file($tmp_name, '../poze_profil/' . $_SESSION['nume'] . '_' . $_SESSION['prenume'] . '.jpg');

        header("Location: ../homeSP.php?info=poza_ok");
    } else {
        header("Location: ../homeSP.php?info=poza_error");
    }

?>