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
        
    } else {
        echo "0 results";
    }

    $conn = NULL;

?>

    <div class="container">
        <h2>Lista de filmes disponíveis</h2>
        
        <ul>
            <?php foreach($filmes as $filme): ?>
                <li>Nome: <?php echo $filme['nome']; ?> | Preço : R$ <?php echo $filme['valor']; ?> | Detalhes</li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php require_once('./includes/footer.php'); ?>