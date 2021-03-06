<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='../fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='../fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">Claudia Parrucchieri</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?page=parrucchieri">Parrucchieri<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=estetica">Estetica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=contatti">Contatti</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                    <?php if (!$_SESSION['id']) {
                        $tasto = '<button class="btn btn-outline-success my-2 my-sm-0" data-toggle = "modal" data-target = "#myModal" > Login / Registrati</button>';
                        echo $tasto;

                    } else {
                        echo "<form>";
                        $tasto = '<button type="submit" formaction = "action.php" name="logout" class="btn btn-outline-success my-2 my-sm-0" value="1">Logout</button >';
                        echo $tasto;
                        echo "</form>";
                    }
                    ?>
            </div>
        </div>
    </nav>