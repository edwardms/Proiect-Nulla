<?php

    require 'conectare.php';

    if (!empty($_POST['username']) && !empty($_POST['password']) $$
        !ctype_space($_POST['username']) && !ctype_space($_POST['password'])) {

        $utilizator = $_POST['username'];
        $parola = $_POST['password'];
    }

?>
