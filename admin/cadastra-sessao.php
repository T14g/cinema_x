<?php require_once('../includes/header.php'); ?>
<?php require_once('../classes/db.php'); ?>
<?php 

    $db = new Db();

    $conn = $db->connect();

    //Get available times
    $horarios = array();
    $sql = "SELECT * FROM horarios WHERE livre = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($horarios, $row);
        }
    }

    //Get available movies
    $filmes = array();
    $sql = "SELECT id,nome FROM filmes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($filmes, $row);
        }
    }

    $conn = NULL;

    if(isset($_POST['submit'])){
        $conn = $db->connect();

        //Add new movie session
        $filme = $_POST['filme'];
        $horario = $_POST['horario'];
       
        $sql = "INSERT INTO sessoes (filme, horario)
        VALUES('" .$filme. "', '" .$horario."')";

        if($conn->query($sql) === TRUE){
            echo "Sessão adicionada!";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        //Block selected time

        $sql = "UPDATE horarios SET livre = 0 WHERE id = " .$horario. "";
        if($conn->query($sql) === TRUE){
            echo "Horário bloqueado!";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn = NULL;
    }
    
?>
    <div class="container">
        <h2>Cadastrar nova sessão</h2>
        <form action="" method="POST">
            <div class="mb-6">
                <label for="nomeFilme" class="form-label">Filme</label>
                <select class="form-control" name="filme">
                    <?php foreach($filmes as $filme): ?>
                        <option value="<?php echo $filme['id']; ?>"><?php echo $filme['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-6">
                <label for="precoFilme" class="form-label">Horário livre:</label>

                <select class="form-control" name="horario">
                        
                    <?php if(count($horarios) > 0): ?>
                        <?php foreach($horarios as $h): ?>
                            <option value="<?php echo $h['id']; ?>"><?php echo $h['horario']; ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="NULL">Sem horários disponíveis</option>
                    <?php endif; ?>
            
                </select>
            </div>
            
            <a href="../" class="btn btn-info">Voltar</a>
            <button type="submit" class="btn btn-success" name="submit" <?php echo count($horarios) === 0 ? "disabled" : ""; ?> >Salvar</button>
        </form>
    </div>
<?php require_once('../includes/footer.php'); ?>