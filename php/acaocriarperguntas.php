<?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($dados);

    include_once "dbconexao.php";

    if(isset($dados['btn-salvar'])){ 
        $tituloForm = filter_input(INPUT_POST,'tituloForm',FILTER_SANITIZE_SPECIAL_CHARS);
        $valorTotQuestn = filter_input(INPUT_POST,'valorTotQuestn',FILTER_SANITIZE_NUMBER_INT); 
        $sql="INSERT INTO questionario (dscTituloQuestn, valTotQuestn, datCriacQuestn ) VALUES ('$tituloForm', '$valorTotQuestn', CURRENT_DATE())";
        
        $numQuest = filter_input(INPUT_POST,'numQuest',FILTER_SANITIZE_SPECIAL_CHARS);
        $valorQuest = filter_input(INPUT_POST,'valorQuest',FILTER_SANITIZE_NUMBER_FLOAT); 
        $dscEnuncQuest = filter_input(INPUT_POST,'dscEnuncQuest',FILTER_SANITIZE_SPECIAL_CHARS);
        $sql2="INSERT INTO questoes (numQuest, valorQuest,dscEnuncQuest ) VALUES ('$numQuest', '$valorQuest', '$dscEnuncQuest' )";
        
        $sqls = $sql . ";" . $sql2;
        if(mysqli_multi_query($connect, $sqls)){
            echo "Parabéns, dados salvos "  ;
            header("Location: criarperguntas.php ");   
            
        }else{
            echo "Erro ao cadastrar!";		                    
        } 
    }else{
        echo "erro";
    }
?>