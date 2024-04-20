<?php
require_once("../model/LivroModel.php");
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setAutor($_POST['autor']);
        $this->cadastro->setQuantidade($_POST['quantidade']);
        $this->cadastro->setPreco($_POST['preco']);
        $this->cadastro->setData(date('Y-m-d',strtotime($_POST['data'])));
        $result = $this->cadastro->incluir($_POST['nome'], $_POST['autor'], $_POST['quantidade'], $_POST['preco'], date('Y-m-d', strtotime($_POST['data'])));


        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastro.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!, verifique se o livro não está duplicado');history.back()</script>";
        }
    }
}
new cadastroController();
