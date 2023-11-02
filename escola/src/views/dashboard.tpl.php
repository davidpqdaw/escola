<?php 
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include_once 'partials/header.tpl.php' 
?>
<body>
    <h1><?=$title;?></h1>
    <form action="?url=dashboardaction" method="POST">
        <table>
            <tr>
                <th>Email</th>
                <th><input type="email" name="email" value="<?php print $_SESSION["email"]?>" required></th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th><input type="text" name="nombre" value="<?php print $_SESSION["nombre"]?>" required></th>
            </tr>
            <tr>
                <th>Apellido</th>
                <th><input type="text" name="apellido" value="<?php print $_SESSION["apellido"]?>" required></th>
            </tr>
            <tr>
                <th>Edad</th>
                <th><input type="number" name="edad" value="<?php print $_SESSION["edad"]?>" required></th>
            </tr>
            <tr>
                <th>DNI</th>
                <th><input type="text" name="dni" value="<?php print $_SESSION["dni"]?>" required></th>
            </tr>
        </table>
        <input type="submit" value="Cerrar Session">
    </form>
    <script src="/public/js/color.js"></script>
    <?php include_once 'partials/footer.tpl.php' ?>
</body>
</html>