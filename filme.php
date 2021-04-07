<?php require_once('./includes/header.php'); ?>
<?php require_once('./classes/db.php'); ?>
<?php
    $db = new Db();

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $conn = $db->connect();

        $sql = "SELECT * FROM filmes WHERE id = ". $id. "";
        $result = $conn->query($sql);
        $filme = $result->fetch_assoc();

        $conn = NULL;
    }


?>

    <div class="container">

        <h2>Nome do Filme: <?php echo $filme['nome']; ?></h2>

        <p class="valor">Valor do ingresso: R$ <?php echo $filme['valor']; ?></p>

        <p class="sinopse"><?php echo $filme['descricao']; ?></p>

        <a href="#" class="btn btn-success">Comprar Ingresso</a>
        <a href="listagem.php" class="btn btn-info">Voltar</a>
    </div>


<?php require_once('./includes/footer.php'); ?>
    
