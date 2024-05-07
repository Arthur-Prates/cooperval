<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idEditCurso']) ? addslashes($dados['idEditCurso']) : '';
    $nome = isset($dados['editNomeCurso']) ? addslashes($dados['editNomeCurso']) : '';
    $local = isset($dados['editLocalCurso']) ? addslashes($dados['editLocalCurso']) : '';

    $retornoUpdate = alterar2Item('curso', 'nomeCurso', 'localCurso', "$nome", "$local",'idcurso',"$id");
    if ($retornoUpdate > 0) {
        echo json_encode(['success' => true, 'message' => 'Curso alterado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Curso não alterado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Curso não encontrado.']);
}