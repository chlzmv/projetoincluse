<?php

$dados = json_decode(file_get_contents("php://input"), true);

include_once "dbconexao.php";

// Inserir questionário
$sql1 = "INSERT INTO questionario (dscTituloQuestn, valTotQuestn, datCriacQuestn, idUser) VALUES (?, ?, CURRENT_DATE(), ?) ";
$resultado1 = $connect->prepare($sql1);
$resultado1->bind_param('sdi', $dados['tituloForm'], $dados['valorTotQuestn'], $dados['idUser']);
$resultado1->execute();

// Verificar se a inserção do questionário foi bem-sucedida
if ($resultado1->affected_rows > 0) {
    // Obter o ID do questionário recém-inserido
    $questionarioId = $resultado1->insert_id;

    // Loop foreach para percorrer as questões
    foreach ($dados['questions'] as $question) {
        $numQuest = $question['numQuest'];
        $valorQuest = $question['valorQuest'];
        $caixaTexto = $question['caixaTexto'];
        $options = $question['opcoesResposta'];

        // Inserir questão
        $sql2 = "INSERT INTO questoes (dscEnuncQuest, numQuest, valUnitQuest, idQuestn) VALUES (?, ?, ?, ?)";
        $resultado2 = $connect->prepare($sql2);
        $resultado2->bind_param('ssdi', $caixaTexto, $numQuest, $valorQuest, $questionarioId);
        $resultado2->execute();

        // Verificar se a inserção da questão foi bem-sucedida
        if ($resultado2->affected_rows > 0) {
            // Obter o ID da questão recém-inserida
            $questaoId = $resultado2->insert_id;

            // Loop foreach para percorrer as opções de resposta
            foreach ($options as $option) {
                $checkText = $option['checkText'];
                $check = $option['check'];
                $respostaCorreta = ($check == "true") ? 'S' : 'N';

                // Inserir item
                $sql3 = "INSERT INTO item (dscEnuncItem, idQuest, indItemCorreto) VALUES (?, ?, ?)";
                $resultado3 = $connect->prepare($sql3);
                $resultado3->bind_param('sis', $checkText, $questaoId, $respostaCorreta);
                $resultado3->execute();

                // Verificar se a inserção do item foi bem-sucedida
                if ($resultado3->affected_rows > 0) {
                    echo "Item inserido com sucesso!";
                    echo "Texto da resposta: $checkText";
                    echo "É a resposta correta? $respostaCorreta";
                } else {
                    echo "Erro ao inserir o item.";
                }
            }
        } else {
            echo "Erro ao inserir a questão.";
        }
    }
} else {
    echo "Erro ao inserir o questionário.";
}
