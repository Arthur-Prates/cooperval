<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteTurma']) ? addslashes($dados['idDeleteTurma']) : '';

    $retornoInsert = deletarCadastro('turma', 'idturma', "$id");
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => 'Turma excluída com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Turma não excluída.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Turma não encontrada.']);
}