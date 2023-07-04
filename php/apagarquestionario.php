<?php
include_once "dbconexao.php";

$idQuestn = filter_input(INPUT_GET, "idQuestn", FILTER_SANITIZE_NUMBER_INT);
$sql = "DELETE FROM questionario WHERE idQuestn=$idQuestn";
$resultado = mysqli_query($connect, $sql);
if (mysqli_affected_rows($connect)) {
    header("Location: meusquestionarios.php");
    exit();
} else {
    echo "erro ao apagar";
}
