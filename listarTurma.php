<div class="card text-center">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-3">#Turma(s)</p>

            <div class="d-flex float-end align-items-center">
                <button class="btn btn-sm btn-secondary"
                        onclick="abrirModalJsTurma('nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao','cadTurma', 'A', 'btnCadTurma', 'addTurma', 'frmCadTurma')">
                    Cadastrar
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover ">
            <thead>
            <tr class="table-secondary">
                <th scope="col" width="5%">#</th>
                <th scope="col" width="25%">Número da turma</th>
                <th scope="col" width="25%">Nome da turma</th>
                <th scope="col" width="15%">Código da turma</th>
                <th scope="col" width="15%">Status</th>
                <th scope="col" width="20%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cont = 1;
            $turma = listarTabelaSemAtivo('*', 'turma');
            if ($turma !== false) {
                foreach ($turma as $turmaItem) {
                    $id = $turmaItem->idturma;
                    $numero = $turmaItem->numeroTurma;
                    $nome = $turmaItem->nomeTurma;
                    $codigo = $turmaItem->codigoTurma;
                    $ativo = $turmaItem->ativo;


                    ?>
                    <tr class="table-secondary">
                        <th scope="row"><?php echo $cont ?></th>
                        <td><?php echo $numero ?></td>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $codigo ?></td>
                        <td><?php if ($ativo == 'A') {
                                echo 'Ativado';
                            } else {
                                echo 'Desativado';
                            } ?></td>
                        <td>
                            <?php if ($ativo == 'A') {
                                ?>
                                <button class="btn btn-danger btn-sm"
                                        onclick="ativarDesativar('desativarTurma.php','<?php echo $id ?>','listarTurma')">
                                    Desativar
                                </button>
                                <?php
                            } else {
                                ?>
                                <button class="btn btn-success btn-sm"
                                        onclick="ativarDesativar('ativarTurma.php','<?php echo $id ?>','listarTurma')">
                                    Ativar
                                </button>
                                <?php
                            } ?>

                            <button class="btn btn-primary btn-sm"
                                    onclick="abrirModalJsTurma('<?php echo $id ?>', 'idEditTurma', '<?php echo $numero ?>', 'editNumeroTurma', '<?php echo $nome ?>', 'editNomeTurma', '<?php echo $codigo ?>', 'editCodigoTurma','editTurma', 'A', 'btnEditTurma', 'editTurma', 'frmEditTurma')">
                                Alterar
                            </button>
                            <button class="btn btn-danger btn-sm"
                                    onclick="abrirModalJsTurma('<?php echo $id ?>', 'idDeleteTurma', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'deleteTurma', 'A', 'btnDeleteTurma', 'deleteTurma', 'frmDeleteTurma')">
                                Deletar
                            </button>
                        </td>
                    </tr>
                    <?php
                    ++$cont;
                }
            } else {
                ?>
                <th colspan="6" class="fs-5 text-center">NENHUMA TURMA CADASTRADA!</th>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
    <div class="card-footer text-body-secondary">
        <?php
        echo DATAATUAL
        ?>
    </div>
</div>



