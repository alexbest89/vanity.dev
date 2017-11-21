<?php

    include "functions.php";

    if ($_GET['logout'] == 1){
        $_SESSION['id'] = "";
        $_SESSION['email'] = "";
        header("Location:index.php");
    }

    if (!$_SESSION['id']) {


        if ($_GET['action'] == "loginSignup") {

            $_SESSION['err'] = "";

            if (!$_POST['email']) {

                $_SESSION['err'] = "Il campo email è richiesto";
                header("Location:index.php");


            } else if (!$_POST['password']) {

                $_SESSION['err'] = "il campo password è richiesto";
                header("Location:index.php");


            } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

                $_SESSION['err'] = "Inserisci un indirizzo email valido!";
                header("Location:index.php");


            }

            /*if ($error != "") {
                $_POST['err'] = $error;
                exit();
            }*/

            if ($_POST['loginActive'] !== 0) {

                $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email']) . "'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);

                if ($row['password'] == md5(md5($row['id']) . $_POST['password'])) {

                    $_SESSION['err'] = "Login Effettuato!";
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    header("Location:index.php");

                } else {
                    $_SESSION['err'] = "Email e password sono errati";
                    header("Location:index.php");
                }

            }

            /*if ($error != "") {
                $_POST['err'] = $error;
                exit();
            }*/

        }

    }
?>