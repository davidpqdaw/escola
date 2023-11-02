<?php 
    include_once 'partials/header.tpl.php';
?>    
<body>
    <h1><?=$title;?></h1>
    <div class="filtro" id="filtro"></div>
    <select name="color" id="color">
        <?php
            if($_COOKIE['color'] == 'black'){
                print '<option value="white">Blanco</option><option value="black" selected>Negro</option>';
            }else{
                print '<option value="white" selected>Blanco</option><option value="black">Negro</option>';
            }
        ?>
    </select>
    <hr>
    <div class="heroSection">
        <a href="?url=login">Login</a>
        <a href="?url=register">Register</a>
    </div>
    <div class="coockie" id="coockie">
        <p>Aceptas las politicas de coockies</p>
        <button id="bt_acepto">Acepto</button><button id="bt_rechazar">Rechazar</button>
    </div>

    <script src="/public/js/coockie.js"></script>
    <script src="/public/js/color.js"></script>
    <?php include_once 'partials/footer.tpl.php' ?>
</body>
</html>