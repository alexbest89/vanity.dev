<?php

    include "functions.php";

    if (!$_POST['nome-text']) {

        $error = "Manca il nome";

    } elseif (!$_POST['cognome-text']) {

        echo "Manca il cognome";

    } elseif (!$_POST['tel-text']){

        echo "Manca il telefono";

    } elseif (!$_POST['email-text']){

        echo "Manca l'email";

    } elseif (!$_POST['pass-text']){

        echo "Manca la password";

    } else {

        $query = "select * from utente where email='" . mysqli_real_escape_string($link, $_POST['email-text']) . "'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "l'email è già stata usata";
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

                echo "Utente registrato!";
				$_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
				header("location:index.php");
				
            } else {

                echo "L'utente non è stato registrato.";
                header("location:index.php");
            }
        }

    }