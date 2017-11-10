<?php

    session_start();

    $link = mysqli_connect("localhost","root","password","Wurz");

    if (mysqli_connect_error()){

        print_r(mysqli_connect_error());
        exit();

    }

    function profilo($nome,$link) {

        global $query1;
        $query1 = "select * from utente where id =".$_SESSION['id'];
        $result = mysqli_query($link, $query1);
        $row = mysqli_fetch_assoc($result);
        echo $row[$nome];

    }


?>