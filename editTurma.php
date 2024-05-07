<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idEditTurma']) ? addslashes($dados['idEditTurma']) : '';
    $nome = isset($dados['editNomeTurma']) ? addslashes($dados['editNomeTurma']) : '';
    $numero = isset($dados['editNumeroTurma']) ? addslashes($dados['editNumeroTurma']) : '';
    $codigo = isset($dados['editCodigoTurma']) ? addslashes($dados['editCodigoTurma']) : '';

    $retornoUpdate = alterar3Item('turma', 'numeroTurma', 'nomeTurma', 'codigoTurma', "$numero", "$nome","$codigo", 'idturma',"$id");
    if ($retornoUpdate > 0) {
        echo json_encode(['success' => true, 'message' => 'Turma alterada com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Turma não alterada.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Turma não encontrada.']);
}