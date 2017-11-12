<?php

    include "functions.php";

    if ($_GET['logout'] == 1){
        $_SESSION['id'] = "";
        $_SESSION['email'] = "";
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

            if ($_POST['loginActive'] !== 0) {

                /*$query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email']) . "'";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    $error = "l'email è già stata usata";
                } else {
                    $query = "insert into utente(email,password) values ('" . mysqli_real_escape_string($link, $_POST['email']) . "','" . mysqli_real_escape_string($link, $_POST['password']) . "')";
                    if (mysqli_real_query($link, $query)) {

                        $query1 = "UPDATE utente SET password ='" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' WHERE id = " . mysqli_insert_id($link) . "";
                        mysqli_real_query($link, $query1);

                        $error = "Utente registrato!";

                    } else {

                        $error = "L'utente non è stato registrato.";
                    }
                }*/

                $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email']) . "'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);

                if ($row['password'] == md5(md5($row['id']) . $_POST['password'])) {

                    $error = "Login Effettuato!";
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
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

        }

    }

/*
    if ($_POST['email-text']) {

        if (!$_POST['nome-text']) {

            $error = "Manca il nome utente";

        } elseif (!$_POST['cognome-text']) {

            $error = "Manca il Cognome";

        } elseif (!$_POST['tel-text']) {

            $error = "Manca il telefono";

        } elseif (!$_POST['pos-text']) {

            $error = "Manca il ruolo";

        }
    } else {

        $error = "Manca email";
        exit();

    }

    if ($error != "") {
        echo $error;
        echo $ok;
        exit();
    } else {

        echo "email ".$_POST['email-text'];
        $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email-text']) . "'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            $error = "l'email è già stata usata";
        } else {
            $query = "insert into utente(email,password) values ('" . mysqli_real_escape_string($link, $_POST['email-text']) . "','" . mysqli_real_escape_string($link, $_POST['pass-text']) . "')";
            if (mysqli_real_query($link, $query)) {
                $query1 = "UPDATE utente SET password ='" . md5(md5(mysqli_insert_id($link)) . $_POST['pass-text']) . "' WHERE id = " . mysqli_insert_id($link) . " ";
                mysqli_real_query($link, $query1);

                $error = "Utente registrato!";
                header("Location:index.php");

             } else {

                $error = "L'utente non è stato registrato.";
                header("Location:index.php");
            }
        }

    }

    if ($error != "") {
        echo $error;
        echo $ok;
        exit();
    }

?>