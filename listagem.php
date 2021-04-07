<?php require_once('./includes/header.php'); ?>
<?php require_once('./classes/db.php'); ?>
<?php
    $db = new Db();

    $conn = $db->connect();

    $sql = "SELECT * FROM filmes";
    $result = $conn->query($sql);
    $filmes = array();

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            array_push($filmes, $row);
        }

    }

    $conn = NULL;

?>

    <div class="container">
        <h2>Lista de filmes disponíveis</h2>
        
        <ul>
            <?php foreach($filmes as $filme): ?>
                <li>Nome: <?php echo $filme['nome']; ?> | Preço : R$ <?php echo $filme['valor']; ?> |
                 <a href="filme.php?id=<?php echo $filme['id']; ?>" class="btn btn-info btn-detalhes">Detalhes</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="./" class="btn btn-info">Voltar</a>
    </div>

<?php require_once('./includes/footer.php'); ?>