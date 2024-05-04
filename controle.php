<?php

include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);

//if ($_SESSION['idadm']) {
//    $idUsuario = $_SESSION['idadm'];
//    $senhaAdm = $_SESSION['senhaAdm'];
//
//    $resultadoSenha = verificarSenhaAutomatica($idUsuario, $senhaAdm);
//
//    if ($resultadoSenha !== 'deBOA') {
//        session_destroy();
//        header('location: index.php?error=404');
//    }
//} else {
//    session_destroy();
//    header('location: index.php?error=404');
//}

if (!empty($controle) && isset($controle)) {
    switch ($controle) {
        case 'listarCalendario':
            include_once('listarCalendario.php');
            break;
        case 'addEvento':
            include_once('addEvento.php');
            break;
        default:
            include_once('index.php');
            break;

    }

} else {
    ?>
    <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
        <h1>Página Vazia, Retorne. </h1><sup>Error 404</sup>
        <img src="./img/vazio.gif" alt="ERROR 404">
    </div>
    <?php
}
