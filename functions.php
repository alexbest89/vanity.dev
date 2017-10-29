<?php

    $link = mysqli_connect("localhost","root","password","Wurz");

    if (mysqli_connect_error()){

        print_r(mysqli_connect_error());
        exit();

    }

?>