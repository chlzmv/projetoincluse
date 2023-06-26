<?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($dados);

    include_once "dbconexao.php";

    if(isset($dados['btn-salvar'])){ 
        $sql1 = "INSERT INTO questionario (dscTituloQuestn, valTotQuestn, datCriacQuestn) VALUES (?, ?, CURRENT_DATE())";
        $resultado1 = $connect->prepare($sql1);
        $resultado1->bind_param('sd', $tituloForm, $valorTotQuestn);
        $resultado1->execute();

        $sql2 = "INSERT INTO questoes (dscEnuncQuest, numQuest, valUnitQuest) VALUES (?, ?, ?)";
        $resultado2 = $connect->prepare($sql2);
        $resultado2->bind_param('ssd', $caixaTexto, $numQuest, $valorQuest);
        $resultado2->execute();

        $sql3 = "INSERT INTO item (dscEnuncItem) VALUES (?)";
        $resultado3 = $connect->prepare($sql3);
        $resultado3->bind_param('s', $checkText);
        $resultado3->execute();

        
        
    }else{
        echo "erro";
    }
?>