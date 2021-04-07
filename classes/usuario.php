<?php 

class Usuario {
    public $name;

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

}

