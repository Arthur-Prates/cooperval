<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//    echo json_encode($Dados);
if (isset($Dados) && !empty($Dados)) {


    $id = isset($Dados['idEdit']) ? addslashes($Dados['idEdit']) : 0;
    $nome = isset($Dados['tituloEdit']) ? addslashes($Dados['tituloEdit']) : '';
    $turma = isset($Dados['turmaEdit']) ? addslashes($Dados['turmaEdit']) : 0;
    $curso = isset($Dados['cursoEdit']) ? addslashes($Dados['cursoEdit']) : 0;
    $comentario = isset($Dados['comentarioEdit']) ? addslashes($Dados['comentarioEdit']) : '';
    $dataHoraIn = isset($Dados['dataInEdit']) ? addslashes($Dados['dataInEdit']) : '';
    $dataHoraEnd = isset($Dados['dataEndEdit']) ? addslashes($Dados['dataEndEdit']) : '';
    $cor = isset($Dados['corEdit']) ? addslashes($Dados['corEdit']) : '';
    $retornoInsert = alterar7Item('calendario','titulo','idturma','idcurso','comentario','dataIn','dataEnd','cor',$nome,$turma,$curso,$comentario,$dataHoraIn,$dataHoraEnd,$cor,'idcalendario',$id);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Evento alterado com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Evento Não alterado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Evento Não alterado! Error Variável"], JSON_THROW_ON_ERROR);
}

