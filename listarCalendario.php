<div class="card text-center">
    <div class="card-header bg-dark text-white">
        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-3" style="text-decoration-line: underline">#Agenda</p>

            <div class="d-flex justify-content-end">
                <button class="btn btn-md btnbonitoo botaoAddEvento" data-bs-toggle="modal"
                        onclick="abrirModalJsAddEvento('nao','nao', 'nao', 'nao','nao', 'nao', 'nao','nao', 'nao', 'nao','nao','nao','nao','nao','nao','nao','cadastrarEvento','A','btnAddEvento', 'addEvento', 'frmAddEvento')">
                    Cadastrar
                    Evento
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="containers text-white">
            <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="25%">Título</th>
                <th scope="col" width="20%">Data de Início</th>
                <th scope="col" width="15%">Data Final</th>
                <th scope="col" width="15%">Comentários</th>
                <th scope="col" width="20%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cont = 1;
            $adm = listarTabelaInnerJoinTriploOrdenada('*', 'calendario', 'curso', 'turma', 'idcurso', 'idcurso', 'idturma', 'idturma', 'idcalendario', 'DESC');
            if ($adm !== false) {
                foreach ($adm as $admItem) {
                    $id = $admItem->idcalendario;
                    $titulo = $admItem->titulo;
                    $dataIn = $admItem->dataIn;
                    $dataEnd = $admItem->dataEnd;
                    $cadastro = $admItem->cadastro;
                    $idturma = $admItem->nomeTurma;
                    $idcurso = $admItem->nomeCurso;
                    $comentario = $admItem->comentario;
                    $cor = $admItem->cor;


                    if ($comentario === '') {
                        $comentario = 'Nenhum comentário adicionado!';
                    }
                    ?>
                    <tr>
                        <th scope="row"><?php echo $cont ?></th>
                        <td><?php echo $titulo ?></td>
                        <td><?php dataHoraGlobal($dataIn, 'N'); ?></td>
                        <td><?php dataHoraGlobal($dataEnd, 'N'); ?></td>
                        <td>
                            <input type="text" value="<?php echo $comentario ?>" class="overflow-hidden text-center text-white"
                                   style="border: none;background: transparent; " disabled></td>
                        <td>
                            <form method="post" name="frmDeleteEvento<?php echo $id ?>"
                                  id="frmDeleteEvento<?php echo $id ?>">
                                <button type="button" class="btn btn-success btn-md"
                                        onclick="abrirModalJsAddEvento('<?php echo $id ?>','idVerMais','<?php echo $titulo ?>', 'tituloVerMais','<?php echo $dataIn ?>','dataInVerMais', '<?php echo $dataEnd ?>','dataEndVerMais','<?php echo $comentario ?>','comentarioVerMais','<?php echo $idcurso ?>','cursoVerMais','<?php echo $idturma ?>','turmaVerMais','<?php echo $cor ?>','corVerMais','verMaisEvento','A','btnVerMaisEvento', 'verMaisEvento', 'frmVerMaisEvento')">
                                    Ver Mais
                                </button>
                                <button type="button" class="btn btn-primary btn-md"
                                        onclick="abrirModalJsAddEvento('<?php echo $id ?>','idEdit','<?php echo $titulo ?>', 'tituloEdit','<?php echo $dataIn ?>','dataInEdit', '<?php echo $dataEnd ?>','dataEndEdit','<?php echo $comentario ?>','comentarioEdit','nao','nao','nao','nao','nao','nao','editEvento','A','btnEditEvento', 'editEvento', 'frmEditEvento')">
                                    Alterar
                                </button>
                                <input type="text" value="<?php echo $id ?>" name="idDeleteEvento" id="idDeleteEvento"
                                       hidden="hidden">
                                <button class="btn btn-danger btn-md" type="submit"
                                        onclick="deleteGeral('deleteEvento','frmDeleteEvento<?php echo $id ?>')">
                                    <span class="mdi mdi-trash-can"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    ++$cont;
                }
            } else {
                ?>
                <th colspan="6" class="fs-5 text-center">NENHUM EVENTO CADASTRADO!</th>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-dark text-white">
        <?php echo DATAATUAL ?>
    </div>
</div>