<?php


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteEvento']) ? addslashes($dados['idDeleteEvento']) : 0;

    $retornoDelete = deletarCadastro('calendario', 'idcalendario', $id);
    if ($retornoDelete === true) {
        echo json_encode(['success' => true, 'message' => 'Evento excluído com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Evento não excluído.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Evento não encontrado.']);
}