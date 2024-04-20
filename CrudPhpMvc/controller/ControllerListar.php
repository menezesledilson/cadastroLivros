<?php
require_once("../model/LivroModel.php");
class listarController{

    private $lista;

    public function __construct(){
        $this->lista = new Cadastro();
        $this->listar();

    }

    private function listar(){
        // Chama o método correto para listar todos os livros
        $row = $this->lista->listarTodos();
        foreach ($row as $value){
            echo "<tr>";
            echo "<th>".$value['id'] ."</th>";
            echo "<th>".$value['nome'] ."</th>";
            echo "<td>".$value['autor'] ."</td>";
            echo "<td>".$value['quantidade'] ."</td>";
            echo "<td> R$:".$value['preco'] ."</td>";
            echo "<td>".$value['data'] ."</td>";
            echo "<td>".($value['flag'] == "0" ? "Desativado" : "Ativado")."</td>";

            echo "<td><a class='btn btn-warning' href='editar.php?id=".$value['id']."'>Editar</a><a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=".$value['id']."'>Excluir</a></td>";
            echo "</tr>";
        }
    }
}

