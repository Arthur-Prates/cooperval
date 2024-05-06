<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//    echo json_encode($Dados);
if (isset($Dados) && !empty($Dados)) {


    $nome = isset($Dados['titulo']) ? addslashes($Dados['titulo']) : '';
    $turma = isset($Dados['turma']) ? addslashes($Dados['turma']) : 0;
    $curso = isset($Dados['curso']) ? addslashes($Dados['curso']) : 0;
    $comentario = isset($Dados['comentario']) ? addslashes($Dados['comentario']) : '';
    $dataHoraIn = isset($Dados['dataIn']) ? addslashes($Dados['dataIn']) : '';
    $dataHoraEnd = isset($Dados['dataEnd']) ? addslashes($Dados['dataEnd']) : '';
    $cor = isset($Dados['cor']) ? addslashes($Dados['cor']) : '';

   ;

    $cadastro = DATATIMEATUAL;
    $retornoInsert = insert8Item('calendario', 'titulo,dataIn,dataEnd,cor,cadastro,idturma,idcurso,comentario', $nome,  dataHoraGlobal($dataHoraIn),  dataHoraGlobal($dataHoraEnd), $cor, $cadastro,$turma,$curso,$comentario);

    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Evento <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Evento Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Evento Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
}

