<?php 
    session_start();
    require_once('./classes/usuario.php');

    $user = unserialize($_SESSION['usuario']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Nome do filme: A odisséia</h2>

        <p class="sinopse">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, vero? Asperiores, repudiandae labore. Quibusdam asperiores temporibus placeat, nisi tempora ducimus laudantium accusantium mollitia commodi nesciunt in. Eligendi aspernatur id sint.
        </p>

        <a href="#" class="btn btn-success">Comprar Ingresso</a>
        <a href="listagem.php" class="btn btn-info">Voltar</a>
    </div>
</body>
</html>