<?php
require_once("../model/LivroModel.php");
class deleta {
    private $deleta;

    public function __construct($id){
        $this->deleta = new Cadastro();
        if($this->deleta->deleteLivro($id)== TRUE){
            echo "<script>alert('Registro deletado com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
new deleta($_GET['id']);
?>
