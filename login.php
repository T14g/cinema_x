<?php require_once('./includes/header.php'); ?>
<?php require_once('./classes/usuario.php'); ?>

<?php

    $db = new Db();
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $user = new Usuario();
        $user->login($email, $senha);

        
    }

?>

    <div class="container">
        <h2>Faça Login para Continuar</h2>
        
        <form action="" method="POST">
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
            </div>
    
            <a href="./" class="btn btn-info">Voltar</a>
            <button type="submit" class="btn btn-success" name="submit">Logar</button>

        </form>
        
    </div>

<?php require_once('./includes/footer.php'); ?>
