<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['id']) ? addslashes($dados['id']) : '';

    $retornoDesativar = alterar1Item('turma','ativo','D','idturma',"$id");
    if ($retornoDesativar > 0) {
        echo json_encode(['success' => true, 'message' => 'Turma desativada com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Turma não desativada.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Turma não encontrada.']);
}