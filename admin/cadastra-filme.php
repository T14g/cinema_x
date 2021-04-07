<?php require_once('../includes/header.php'); ?>
<?php require_once('../classes/db.php'); ?>
<?php 

    $db = new Db();
  
    // Test the connection
    // if($conn){
    //     echo "sucessfuly connected";
    // }

    if(isset($_POST['submit'])){
        $conn = $db->connect();

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor  = $_POST['valor'];
        
        $sql = "INSERT INTO filmes (nome, descricao, valor)
        VALUES('" .$nome. "', '" .$descricao."', '" .$valor. "')";

        if($conn->query($sql) === TRUE){
            echo "Filme adicionado!";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn = NULL;
    }
    
?>
    <div class="container">
        <h2>Cadastrar novo filme</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nomeFilme" class="form-label">Nome do filme</label>
                <input type="text" class="form-control" id="nomeFilme" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="precoFilme" class="form-label">Preço do filme</label>
                <input type="text" class="form-control" id="precoFilme" name="valor" required>
            </div>
            <div class="mb-3">
                <label for="descricaoFilme" class="form-label">Descrição do filme</label>
                <textarea class="form-control" id="descricaoFilme" name="descricao" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Salvar</button>
            <a href="../" class="btn btn-info">Voltar</a>
        </form>
    </div>
<?php require_once('../includes/footer.php'); ?>