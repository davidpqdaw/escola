<?php 
    include_once 'partials/header.tpl.php';
    if($_COOKIE['createCookie'] == 'true'){
        $coockie = true;
    }else{
        $coockie = false;
    }
?>
<body>
    <h1><?=$title;?></h1>
    <hr/>
    <form action="?url=loginaction" method="POST">
        <?php
            if(isset($_COOKIE['cookieLogin']) == true){
                print '<input type="email" name="email" required value="'.$_COOKIE['email'].'">';
                print '<input type="password" name="password" required value="'.$_COOKIE['password'].'">';
            }else{
                print '<input type="email" name="email" required placeholder="Email">';
                print '<input type="password" name="password" required placeholder="Contraseña">';
            }
            if($coockie==true){
                if(isset($_COOKIE['cookieLogin']) == true){
                    print '<label>Recordar</label><input type="checkbox" name="recordar" checked>';
                }else{
                    print '<label>Recordar</label><input type="checkbox" name="recordar">';
                }
                
            }

        ?>
        <button type="submit">Log in</button>
    </form>
    <script src="/public/js/color.js"></script>
    <?php include_once 'partials/footer.tpl.php' ?>
</body>
</html>