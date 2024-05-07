<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['cadNomeAdm']) ? addslashes($dados['cadNomeAdm']) : '';
    $sobrenome = isset($dados['cadSobrenomeAdm']) ? addslashes($dados['cadSobrenomeAdm']) : '';
    $celular = isset($dados['cadCelularAdm']) ? addslashes($dados['cadCelularAdm']) : '';
    $cpf = isset($dados['cadCpfAdm']) ? addslashes($dados['cadCpfAdm']) : '';
    $nascimento = isset($dados['cadNascimentoAdm']) ? addslashes($dados['cadNascimentoAdm']) : '';
    $email = isset($dados['cadEmailAdm']) ? addslashes($dados['cadEmailAdm']) : '';
    $senha = isset($dados['cadSenhaAdm']) ? addslashes($dados['cadSenhaAdm']) : '';

    $senhaHash = criarSenhaHash($senha);

    $retornoInsert = insert8Item('adm', 'nome, sobrenome, nascimento, celular, cpf, email, senha, cadastro', "$nome", "$sobrenome", "$nascimento", "$celular", "$cpf", "$email","$senhaHash", DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => 'Administrador cadastrado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Administrador não cadastrado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Administrador não encontrado.']);
}