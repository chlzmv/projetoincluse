<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);

include_once "dbconexao.php";

if (isset($dados['btn-salvar'])) {
    // Inserir questionário
    $sql1 = "INSERT INTO questionario (dscTituloQuestn, valTotQuestn, datCriacQuestn) VALUES (?, ?, CURRENT_DATE())";
    $resultado1 = $connect->prepare($sql1);
    $resultado1->bind_param('sd', $dados['tituloForm'], $dados['valorTotQuestn']);
    $resultado1->execute();

    // Obter o ID do questionário recém-inserido
    $questionarioId = $resultado1->insert_id;

    // Inserir questões
    $sql2 = "INSERT INTO questoes (dscEnuncQuest, numQuest, valUnitQuest, questionario_idQuestn) VALUES (?, ?, ?, ?)";
    $resultado2 = $connect->prepare($sql2);
    $resultado2->bind_param('ssdi', $dados['caixaTexto'], $dados['numQuest'], $dados['valorQuest'], $questionarioId);
    $resultado2->execute();

    // Obter o ID da questão recém-inserida
    $questaoId = $resultado2->insert_id;

    // Inserir item
    $sql3 = "INSERT INTO item (dscEnuncItem, questoes_idQuest) VALUES (?, ?)";
    $resultado3 = $connect->prepare($sql3);
    $resultado3->bind_param('si', $dados['checkText'], $questaoId);
    $resultado3->execute();

    // Verificar se todas as inserções foram bem-sucedidas
    if ($resultado1 && $resultado2 && $resultado3) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados.";
    }
} else {
    echo "Erro: botão de salvar não foi pressionado.";
}
?>