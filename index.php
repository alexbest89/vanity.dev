<?php

    include("functions.php");

    include("views/header.php");

    if (!$_SESSION['id']) {
        include("views/home.php");
    } else{
        include("views/agenda.php");
    }

    include("views/footer.php");

    $_SESSION['err']="";

?>

<script type="text/javascript" src="script.js"></script>

