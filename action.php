<?php

    include "functions.php";

    if ($_GET['logout'] == 1){
        $_SESSION['id'] = "";
        header("Location:index.php");
    }

    if (!$_SESSION['id']) {


        if ($_GET['action'] == "loginSignup") {

            $error = "";
            $ok = "";

            if (!$_POST['email']) {

                $error = "Il campo email è richiesto";

            } else if (!$_POST['password']) {

                $error = "il campo password è richiesto";

            } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

                $error = "Inserisci un indirizzo email valido!";

            }

            if ($error != "") {
                echo $error;
                exit();
            }

            if ($_POST['loginActive'] == 1) {

                $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email']) . "'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);

                if ($row['password'] == md5(md5($row['id']) . $_POST['password'])) {

                    $error = "Login Effettuato!";
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['ruolo'] = $row['posizione'];
                    header("Location:index.php");

                } else {
                    $error = "Email e password sono errati";
                }

            }

            if ($error != "") {
                echo $error;
                echo $ok;
                exit();
            }

        };

    }

    if ($_POST['email-text']){

        if (!$_POST['nome-text']){

            $error = "Manca il nome utente";

        } elseif (!$_POST['cognome-text']){

            $error = "Manca il Cognome";

        } elseif (!$_POST['tel-text']) {

            $error = "Manca il telefono";

        }

        if ($error != "") {
            echo $error;
            echo $ok;
            exit();
        }

        $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email-text']) . "'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            $error = "l'email è già stata usata";
        } else {
            $query = "insert into utente(nome,cognome,telefono,email,password) values ('" . mysqli_real_escape_string($link, $_POST['nome-text']) . "','" . mysqli_real_escape_string($link, $_POST['cognome-text']) . "','" . mysqli_real_escape_string($link, $_POST['tel-text']) . "','" . mysqli_real_escape_string($link, $_POST['email-text']) . "','" . mysqli_real_escape_string($link, $_POST['password-text']) . "')";
            if (mysqli_real_query($link, $query)) {

                $query1 = "UPDATE utente SET password ='" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' WHERE id = " . mysqli_insert_id($link) . "";
                mysqli_real_query($link, $query1);

                $error = "Utente registrato!";
                header("Location:index.php");

            } else {

                $error = "L'utente non è stato registrato.";
            }
        }

    } else {

        /*$query = "update utente set nome = '".mysqli_real_escape_string($link,$_POST['nome-text'])."', cognome = '".mysqli_real_escape_string($link,$_POST['cognome-text'])."', telefono = '".mysqli_real_escape_string($link,$_POST['tel-text'])."', posizione = '".$_POST['pos-text']."' where id = ".$_SESSION['id']." ";
        if(mysqli_real_query($link, $query)) {

            echo "Utente modificato";

        } else{

            echo "utente non modificato";

        }*/

    }

?>