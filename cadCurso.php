<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['cadNomeCurso']) ? addslashes($dados['cadNomeCurso']) : '';
    $local = isset($dados['cadLocalCurso']) ? addslashes($dados['cadLocalCurso']) : '';

    $retornoInsert = insert3Item('curso', 'nomeCurso, localCurso, cadastro', "$nome", "$local", DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => 'Curso cadastrado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Curso não cadastrado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Curso não encontrado.']);
}