<?php
require_once("livroDAO.php");
class Cadastro {


    private $id;
    private $nome;
    private $autor;
    private $quantidade;
    private $preco;
    private $flag;
    private $data;

    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function setAutor($string){
        $this->autor = $string;
    }
    public function setQuantidade($string){
        $this->quantidade = $string;
    }
    public function setPreco($string){
        $this->preco = $string;
    }
    public function setFlag($string){
        $this->flag = $string;
    }
    public function setData($string){
        $this->data = $string;
    }
    //Metodos Get
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
    public function getFlag(){
        return $this->flag;
    }
    public function getData(){
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    private $livroDAO;

    public function __construct(){
        $this->livroDAO = new LivroDAO();
    }
    // Métodos para manipulação dos livros
    public function incluir($nome, $autor, $quantidade, $preco, $data){
        return $this->livroDAO->setLivro($nome, $autor, $quantidade, $preco, $data);
    }
    // Editar o livro
    public function updateLivro($nome, $autor, $quantidade, $preco, $data, $flag, $id){
        return $this->livroDAO->putLivro($nome, $autor, $quantidade, $preco, $flag, $data, $id);
    }

    // Método para listar todos os livros
    public function listarTodos( ){
        return $this->livroDAO->getLivro( );
    }

    // Método para listar todos os livros
    public function pesquisaLivro($id ){
        return $this->livroDAO->pesquisaLivro($id );
    }

    // Método para deletar o livro
    public function deleteLivro($id){
        return $this->livroDAO->deletarLivro($id);
    }

}
?>
