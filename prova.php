<?php

    $_SESSION['err'] = "";

    include "functions.php";

    if (!$_POST['nome-text']) {

        $_SESSION['err'] = "Manca il nome";
        header("location:index.php");

    } elseif (!$_POST['cognome-text']) {

        $_SESSION['err'] = "Manca il cognome";
        header("location:index.php");

    } elseif (!$_POST['tel-text']){

        $_SESSION['err'] = "Manca il telefono";
        header("location:index.php");

    } elseif (!$_POST['email-text']){

        $_SESSION['err'] = "Manca l'email";
        header("location:index.php");

    } elseif (!$_POST['pass-text']){

        $_SESSION['err'] = "Manca la password";
        header("location:index.php");

    } else {

        $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email-text']) . "'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['err'] = "l'email è già stata usata";
            header("location:index.php");
        } else {
            $query = "insert into utente(nome,cognome,telefono,email,password) values ('" . mysqli_real_escape_string($link, $_POST['nome-text']) . "','" . mysqli_real_escape_string($link, $_POST['cognome-text']) . "','" . mysqli_real_escape_string($link, $_POST['tel-text']) . "','" . mysqli_real_escape_string($link, $_POST['email-text']) . "','" . mysqli_real_escape_string($link, $_POST['pass-text']) . "')";
            if (mysqli_real_query($link, $query)) {
                $query1 = "UPDATE utente SET password ='" . md5(md5(mysqli_insert_id($link)) . $_POST['pass-text']) . "' WHERE id = " . mysqli_insert_id($link) . " ";
                $result = mysqli_real_query($link, $query1);
				$row = mysqli_fetch_assoc($result);
				
				/*Questo è perchè non mi ricordo il comando per recuperare l'id dopo l'insert*/
				$query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email-text']) . "'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);

                $_SESSION['err'] = "Utente registrato!";
				$_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
				header("location:pagina_agenda.php");
				
            } else {

                $_SESSION['err'] = "L'utente non è stato registrato.";
                header("location:index.php");
            }
        }

    }