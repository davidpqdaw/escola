<?php 
include_once 'partials/header.tpl.php' ?>
<body>
    <h1><?=$title;?></h1>
    <form action="?url=registeraction" method="POST">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <input type="text" name="nombre" id="nombre" required placeholder="Nombre">
        <input type="text" name="apellido" id="apellido" required placeholder="Apellido">
        <select name="id_rol">
            <option value="Alumno">Alumno</option>
            <option value="Profesor">Profesor</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
    <script src="/public/js/color.js"></script>
    <?php include_once 'partials/footer.tpl.php' ?>
</body>
</html>