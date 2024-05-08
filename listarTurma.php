<div class="card text-center">
    <div class="card-header bg-dark text-white">
        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-3" style="text-decoration-line: underline">#Turmas</p>

            <div class="d-flex float-end align-items-center">
                <button class="btn btn-md btnbonitoo botaoAddEvento"
                        onclick="abrirModalJsTurma('nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao','cadTurma', 'A', 'btnCadTurma', 'addTurma', 'frmCadTurma')">
                    Cadastrar
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="containers text-white">
            <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="15%">Número da turma</th>
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
                    <tr>
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
                                <button class="btn btn-danger btn-md"
                                        onclick="ativarDesativar('desativarTurma.php','<?php echo $id ?>','listarTurma')">
                                    Desativar
                                </button>
                                <?php
                            } else {
                                ?>
                                <button class="btn btn-success btn-md"
                                        onclick="ativarDesativar('ativarTurma.php','<?php echo $id ?>','listarTurma')">
                                    Ativar
                                </button>
                                <?php
                            } ?>

                            <button class="btn btn-primary btn-md"
                                    onclick="abrirModalJsTurma('<?php echo $id ?>', 'idEditTurma', '<?php echo $numero ?>', 'editNumeroTurma', '<?php echo $nome ?>', 'editNomeTurma', '<?php echo $codigo ?>', 'editCodigoTurma','editTurma', 'A', 'btnEditTurma', 'editTurma', 'frmEditTurma')">
                                Alterar
                            </button>
                            <button class="btn btn-danger btn-md"
                                    onclick="abrirModalJsTurma('<?php echo $id ?>', 'idDeleteTurma', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'deleteTurma', 'A', 'btnDeleteTurma', 'deleteTurma', 'frmDeleteTurma')">
                                <span class="mdi mdi-trash-can"></span>
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
    <div class="card-footer bg-dark text-white">
        <?php
        echo DATAATUAL
        ?>
    </div>
</div>



