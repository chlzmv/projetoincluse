<?php
include_once "dbconexao.php";

$idQuestn = filter_input(INPUT_GET, "idQuestn", FILTER_SANITIZE_NUMBER_INT);
var_dump($idQuestn);
if (!empty($idQuestn)) {

    $sql = "DELETE FROM questionario WHERE idQuestn=:idQuestn";
    $resultado = $connect->prepare($sql);
    $resultado->bindParam(':idQuestn', $idQuestn);

    if($resultado->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuario apagado com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuario não apagado com sucesso!</div>"];
    }    
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuario encontrado!</div>"];
}

echo json_encode($retorna);
