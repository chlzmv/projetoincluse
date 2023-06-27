<?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($dados);

    include_once "dbconexao.php";
    
     
    if(isset($dados['btn-salvar'])){ 
        $sql1 = "INSERT INTO questionario (dscTituloQuestn, valTotQuestn, datCriacQuestn) VALUES (?, ?, CURRENT_DATE())";
        $resultado1 = $connect->prepare($sql1);
        $resultado1->bind_param('sd', $tituloForm, $valorTotQuestn);
        $resultado1->execute();
        
        $sqlNovoId = "SELECT max(idQuestn) as id FROM questionario";
        $resultadoId = mysqli_query($connect, $sqlNovoId);
        if ($resultadoId) {
            if ($dadosNovoId = mysqli_fetch_assoc($resultadoId)) {
                $novoIdQuestn = $dadosNovoId['id']; 
                $sql2 = "INSERT INTO questoes (dscEnuncQuest, numQuest, valUnitQuest, questionario_idQuestn) VALUES (?, ?, ?, ?)";
                $resultado2 = $connect->prepare($sql2);
                $resultado2->bind_param('ssdi', $caixaTexto, $numQuest, $valorQuest, $novoIdQuestn);
                $resultado2->execute();

                echo $novoIdQuestn;
                }
        } else {
            echo "Erro na consulta: " . mysqli_error($connect);
        }

        // $sql3 = "INSERT INTO item (dscEnuncItem, item.questoes_idQuest) VALUES (?, )";
        // $resultado3 = $connect->prepare($sql3);
        // $resultado3->bind_param('s', $checkText);
        // $resultado3->execute();

        
        
    }else{
        echo "erro";
    }
?>