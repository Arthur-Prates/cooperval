<?php
//include_once("./config/constantes.php");
//include_once("./config/conexao.php");
//include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idEditAdm']) ? addslashes($dados['idEditAdm']) : '';
    $nome = isset($dados['editNomeAdm']) ? addslashes($dados['editNomeAdm']) : '';
    $sobrenome = isset($dados['editSobrenomeAdm']) ? addslashes($dados['editSobrenomeAdm']) : '';
    $celular = isset($dados['editCelularAdm']) ? addslashes($dados['editCelularAdm']) : '';
    $cpf = isset($dados['editCpfAdm']) ? addslashes($dados['editCpfAdm']) : '';
    $nascimento = isset($dados['editNascimentoAdm']) ? addslashes($dados['editNascimentoAdm']) : '';
    $email = isset($dados['editEmailAdm']) ? addslashes($dados['editEmailAdm']) : '';
    $senha = isset($dados['editSenhaAdm']) ? addslashes($dados['editSenhaAdm']) : '';

    $senhaHash = criarSenhaHash($senha);


    $retornoInsert = alterar7Item('adm', 'nome', 'sobrenome', 'nascimento', 'celular', 'cpf', 'email', 'senha', "$nome", "$sobrenome", "$nascimento", "$celular", "$cpf", "$email","$senhaHash", 'idadm',"$id");
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => 'Administrador alterado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Administrador não alterado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Administrador não encontrado.']);
}