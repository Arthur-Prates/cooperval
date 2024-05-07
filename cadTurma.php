<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['cadNomeTurma']) ? addslashes($dados['cadNomeTurma']) : '';
    $numero = isset($dados['cadNumeroTurma']) ? addslashes($dados['cadNumeroTurma']) : '';
    $codigo = isset($dados['cadCodigoTurma']) ? addslashes($dados['cadCodigoTurma']) : '';

    $retornoInsert = insert4Item('turma', 'numeroTurma, nomeTurma, codigoTurma, cadastro', "$numero", "$nome","$codigo", DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => 'Turma cadastrada com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Turma não cadastrada.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Turma não encontrada.']);
}