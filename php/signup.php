<?php
    
    require 'conectare.php';

    if (!empty($_POST['name']) && !empty($_POST['surname']) && 
        !empty($_POST['username']) && !empty($_POST['email']) && 
        !empty($_POST['password']) && !ctype_space($_POST['name']) && 
        !ctype_space($_POST['surname']) && !ctype_space($_POST['username']) && 
        !ctype_space($_POST['email']) && !ctype_space($_POST['password'])) {

        if (strlen($_POST['password']) < 7) {
            header("Location: ../signupPage.php?info=parola_incorecta");
        } else {
            $nume = $_POST['name'];
            $prenume = $_POST['surname'];
            $utilizator = $_POST['username'];
            $mail = $_POST['email'];
            $parola = $_POST['password'];
            $parolaRe = $_POST['repeat_password'];


            $sql = "SELECT utilizator FROM users WHERE utilizator='$utilizator'";
            $result = mysqli_query($conectare, $sql);
            $check = mysqli_num_rows($result);

            if ($check > 0) {
                header("Location: ../signupPage.php?info=exista");
            } else {
                if ($parola == $parolaRe) {
                    $parola_hashed = password_hash($parola, PASSWORD_DEFAULT);
        
                    $sql = "INSERT INTO users (nume, prenume, utilizator, email, parola) VALUES ('$nume', '$prenume', '$utilizator', '$mail', '$parola_hashed')";
                    
                    $result = mysqli_query($conectare, $sql);
            
                    header("Location: ../signupPage.php?info=ok");
                } else {
                    header("Location: ../signupPage.php?info=parola_incorecta");
                }
            }
        }
    } else {
        header("Location: ../signupPage.php?info=eroare");
    }
?>
