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

            if ($_POST['loginActive'] == 0) {

                $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email']) . "'";
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
                }

            } else {

                $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email']) . "'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);

                if ($row['password'] == md5(md5($row['id']) . $_POST['password'])) {

                    $error = "Login Effettuato!";
                    $_SESSION['id'] = $row['id'];
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

?>