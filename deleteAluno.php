<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteAluno']) ? addslashes($dados['idDeleteAluno']) : '';
    $confirmacao = isset($dados['confimacaoDeleteAluno']) ? addslashes($dados['confimacaoDeleteAluno']) : '';

    $retornoDelete = deletarCadastro('aluno', 'idaluno',"$id");
    if ($retornoDelete === true) {
        echo json_encode(['success' => true, 'message' => 'Aluno excluído com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Aluno não excluído.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Aluno não encontrado.']);
}