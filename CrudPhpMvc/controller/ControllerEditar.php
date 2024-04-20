<?php
require_once("../model/LivroModel.php");

class editarController {

    private $editar;
    private $id;
    private $nome;
    private $autor;
    private $quantidade;
    private $preco;
    private $data;
    private $flag;

    public function __construct($id){
        $this->editar = new Cadastro();
        $this->id = $id;
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $row = $this->editar->pesquisaLivro($id);
        if ($row) {
        $this->nome         =$row['nome'];
        $this->autor        =$row['autor'];
        $this->quantidade   =$row['quantidade'];
        $this->preco        =$row['preco'];
        $this->data         =$row['data'];
        $this->flag         =$row['flag'];
        } else {
            // Tratar o caso em que a pesquisa do livro não retornou resultados
            echo "Livro não encontrado.";
        }
    }

    public function editarFormulario($nome,$autor,$quantidade,$preco,$data,$flag,$id){
        if($this->editar->updateLivro($nome,$autor,$quantidade,$preco,$flag,$data,$id) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }


    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getData(){
        return $this->data;
    }
    public function getFlag(){
        return $this->flag;
    }


}
$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['nome'],$_POST['autor'],$_POST['quantidade'],$_POST['preco'],$_POST['data'],$_POST['flag'],$_POST['id']);
}

?>
