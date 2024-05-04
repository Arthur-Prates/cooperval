<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);

    $nome = isset($Dados['titulo']) ? addslashes($Dados['titulo']) : '';
    $dataHoraIn = isset($Dados['dataIn']) ? addslashes($Dados['dataIn']) : '';
    $dataHoraEnd = isset($Dados['dataEnd']) ? addslashes($Dados['dataEnd']) : '';
    $cor = isset($Dados['cor']) ? addslashes($Dados['cor']) : '';
    $cadastro = DATATIMEATUAL;
    $retornoInsert = insert5Item('calendario', 'titulo,dataIn,dataEnd,cor,cadastro', $nome, $dataHoraIn, $dataHoraEnd, $cor, $cadastro);

    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Evento <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Evento Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Evento Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
}

