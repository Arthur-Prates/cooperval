<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteCurso']) ? addslashes($dados['idDeleteCurso']) : '';

    $retornoUpdate = deletarCadastro('curso', 'idcurso',"$id");
    if ($retornoUpdate > 0) {
        echo json_encode(['success' => true, 'message' => 'Curso excluído com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Curso não excluído.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Curso não encontrado.']);
}