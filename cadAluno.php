<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['cadNomeAluno']) ? addslashes($dados['cadNomeAluno']) : '';
    $sobrenome = isset($dados['cadSobrenomeAluno']) ? addslashes($dados['cadSobrenomeAluno']) : '';
    $celular = isset($dados['cadCelularAluno']) ? addslashes($dados['cadCelularAluno']) : '';
    $cpf = isset($dados['cadCpfAluno']) ? addslashes($dados['cadCpfAluno']) : '';
    $nascimento = isset($dados['cadNascimentoAluno']) ? addslashes($dados['cadNascimentoAluno']) : '';
    $email = isset($dados['cadEmailAluno']) ? addslashes($dados['cadEmailAluno']) : '';
    $turma = isset($dados['turmaDoAluno']) ? addslashes($dados['turmaDoAluno']) : '';

    $retornoInsert = insert8Item('aluno', 'idturma, nomeAluno, sobrenomeAluno, nascimentoAluno, cpfAluno, emailAluno, celularAluno, cadastro', "$turma", "$nome", "$sobrenome", "$nascimento", "$cpf", "$email", "$celular", DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => 'Aluno cadastrado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Aluno não cadastrado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Aluno não encontrado.']);
}