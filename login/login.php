<?php
include_once("./config/conexao.php");
include_once("./config/constantes.php");
include_once("./func/funcao.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// echo json_encode($dados);

$email = $dados['email'];
$senha = $dados['senha'];
$retornoValidar = verificarSenhaCriptografada('*', 'adm', 'email', $email, 'senha', $senha, 'ativo', 'A');

if ($retornoValidar) {
    if ($retornoValidar == 'usuario') {
        echo json_encode(['success' => false, 'message' => 'Usuário invalido']);
    } else if ($retornoValidar == 'senha') {
        echo json_encode(['success' => false, 'message' => 'Senha invalida!']);
    } else {
        $_SESSION['idadm'] = $retornoValidar->idadm;
        $_SESSION['nome'] = $retornoValidar->nome;
        $_SESSION['cpfAdm'] = $retornoValidar->cpf;
        $_SESSION['senhaAdm'] = $dados['senha'];
        $aa = $_SESSION['cpfAdm'];
        echo json_encode(['success' => true, 'message' => "Logado com sucesso!"]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Usuario e Senha invalidos!']);
}