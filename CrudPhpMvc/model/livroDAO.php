<?php
require_once("../DAO/ConexaoBanco.php");
class LivroDAO
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = new ConexaoBanco();

    }

    public function setLivro($nome, $autor, $quantidade, $preco, $data)
    {
        $stmt = $this->conexao->getConexao()->prepare("INSERT INTO livros (`nome`, `autor`, `quantidade`, `preco`, `data`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $nome, $autor, $quantidade, $preco, $data);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getLivro()
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM livros");
        $livros = [];
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $livros[] = $row;
        }
        return $livros;
    }

    public function pesquisaLivro($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("SELECT * FROM livros WHERE id=?");
        // "i" indica que o parâmetro é um inteiro
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);

    }

    public function deletarLivro($id)
    {
        $stmt = $this->conexao->getConexao()->prepare("DELETE FROM `livros` WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" indica que o parâmetro é um inteiro
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function putLivro($nome, $autor, $quantidade, $preco, $flag, $data,$id)
    {
        $stmt = $this->conexao->getConexao()->prepare("UPDATE `livros` SET `nome` = ?, `autor` = ?, `quantidade` = ?, `preco` = ?, `flag` = ?, `data` = ? WHERE `id` = ?");
        $stmt->bind_param("ssssssi", $nome, $autor, $quantidade, $preco, $flag, $data,$id);

        if ($stmt->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
