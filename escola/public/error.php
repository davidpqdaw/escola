<?php
    session_start();
    print $_SESSION["error"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body style="background-color:aquamarine">
        <h1>
        <?php
            print "El error es ".$_SESSION["error"];
        ?>
        </h1>
    </body>
</html>