
<?php 

require_once('db.php');

class Usuario {

    private $name;
    private $acesso;

    public function get_filmes(){

        $filmes = array(
            ['nome' => 'Robocop'],
            ['nome' => 'X-men'],
            ['nome' => 'Hulk']
        );
        return $filmes;

    }

    public function listar_filmes(){
        $filmes = $this->get_filmes();
        
        $html = "<ul>";

        foreach($filmes as $filme) {
            $html .= "<li><a href='filme.php'>" . $filme['nome'] ."</li>";
        }

        $html .= "</ul>";

        echo $html;
    }

    public function login($email, $senha) {

        $db = new Db();
        $conn = $db->connect();

        $sql = "SELECT * FROM usuarios WHERE email = '".$email ."' AND senha = '".  $senha. "'";

        $result = $conn->query($sql);
        $result = $result->fetch_assoc();

        if($result){
            echo "Logado!";
            //Se usuário objeto usuário

            //Se admin objeto Admin

            //Se funcionário objeto funcionário
        }else{
            echo "Falha ao logar!";
        }

        $conn = NULL;

    }

}

