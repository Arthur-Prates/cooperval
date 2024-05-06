<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idEditAluno']) ? addslashes($dados['idEditAluno']) : '';
    $nome = isset($dados['editNomeAluno']) ? addslashes($dados['editNomeAluno']) : '';
    $sobrenome = isset($dados['editSobrenomeAluno']) ? addslashes($dados['editSobrenomeAluno']) : '';
    $celular = isset($dados['editCelularAluno']) ? addslashes($dados['editCelularAluno']) : '';
    $cpf = isset($dados['editCpfAluno']) ? addslashes($dados['editCpfAluno']) : '';
    $nascimento = isset($dados['editNascimentoAluno']) ? addslashes($dados['editNascimentoAluno']) : '';
    $email = isset($dados['editEmailAluno']) ? addslashes($dados['editEmailAluno']) : '';
    $turma = isset($dados['editTurmaDoAluno']) ? addslashes($dados['editTurmaDoAluno']) : '';

    $retornoUpdate = alterar7Item('aluno', 'idturma', 'nomeAluno', 'sobrenomeAluno', 'nascimentoAluno', 'cpfAluno', 'emailAluno', 'celularAluno', "$turma", "$nome", "$sobrenome", "$nascimento", "$cpf", "$email", "$celular",'idaluno',"$id");
    if ($retornoUpdate > 0) {
        echo json_encode(['success' => true, 'message' => 'Aluno alterado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Aluno não alterado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Aluno não encontrado.']);
}