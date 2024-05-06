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
        case 'listarAdm':
            include_once('listarAdm.php');
            break;
        case 'addAdm':
            include_once('cadAdm.php');
            break;
        case 'editAdm':
            include_once('editAdm.php');
            break;
        case 'deleteAdm':
            include_once('deleteAdm.php');
            break;
        case 'listarAluno':
            include_once('listarAluno.php');
            break;
        case 'addAluno':
            include_once('cadAluno.php');
            break;
        case 'editAluno':
            include_once('editAluno.php');
            break;
        case 'deleteAluno':
            include_once('deleteAluno.php');
            break;
        case 'listarCurso':
            include_once('listarCurso.php');
            break;
        case 'addCurso':
            include_once('cadCurso.php');
            break;
        case 'editCurso':
            include_once('editCurso.php');
            break;
        case 'deleteCurso':
            include_once('deleteCurso.php');
            break;
        case 'listarTurma':
            include_once('listarTurma.php');
            break;
        case 'addTurma':
            include_once('cadTurma.php');
            break;
        case 'editTurma':
            include_once('editTurma.php');
            break;
        case 'deleteTurma':
            include_once('deleteTurma.php');
            break;
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
