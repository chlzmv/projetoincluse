<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);

include_once "dbconexao.php";

if (isset($dados['btn-salvar'])) {
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
        foreach ($dados['numQuest'] as $key => $numQuest) {
            $valorQuest = $dados['valorQuest'][$key];
            $caixaTexto = $dados['caixaTexto'][$key];

            // Inserir questões
            $sql2 = "INSERT INTO questoes (dscEnuncQuest, numQuest, valUnitQuest, idQuestn) VALUES (?, ?, ?, ?)";
            $resultado2 = $connect->prepare($sql2);
            $resultado2->bind_param('ssdi', $caixaTexto, $numQuest, $valorQuest, $questionarioId);
            $resultado2->execute();

            // Verificar se a inserção das questões foi bem-sucedida
            if ($resultado2->affected_rows > 0) {
                // Obter o ID da questão recém-inserida
                $questaoId = $resultado2->insert_id;
            } else {
                echo "Erro ao inserir as questões.";
                var_dump($sql2);
            }

            // Loop foreach para percorrer os itens
            foreach ($dados['checkText'] as $key => $checkText) {
                $check = $dados['check'][$key];
                
                // Inserir item
                $sql3 = "INSERT INTO item (dscEnuncItem, idQuest) VALUES (?, ?)";
                $resultado3 = $connect->prepare($sql3);
                $resultado3->bind_param('si', $checkText, $questaoId);
                $resultado3->execute();

                // Verificar se a inserção do item foi bem-sucedida
                if ($resultado3->affected_rows > 0) {
                    echo "Dados inseridos com sucesso!";
                    echo "texto resp: $numQuest";
                    echo "texto resp: $valorQuest";
                    echo "texto resp: $caixaTexto";
                    echo "texto resp: $checkText";
                    echo "check: $check";
                } else {
                    echo "Erro ao inserir o item.";
                    var_dump($sql3);
                }
            }
        }
    } else {
        echo "Erro ao inserir o questionário.";
        var_dump($resultado1);
    }
} else {
    echo "Erro: botão de salvar não foi pressionado.";
}
?>