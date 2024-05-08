<div class="card text-center">
    <div class="card-header bg-dark text-white">
        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-3" style="text-decoration-line: underline">#Cursos</p>

            <div class="d-flex float-end align-items-center">
                <button class="btn btn-md btnbonitoo botaoAddEvento"
                        onclick="abrirModalJsCurso('nao', 'nao', 'nao', 'nao', 'nao', 'nao','cadCurso','A','btnCadCurso','addCurso','frmCadCurso')">
                    Cadastrar Curso
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="containers text-white">
            <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="30%">Nome</th>
                <th scope="col" width="35%">Local do curso</th>
                <th scope="col" width="10%">Status</th>
                <th scope="col" width="20%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cont = 1;
            $curso = listarTabelaSemAtivo('*', 'curso');
            if ($curso !== false) {
                foreach ($curso as $cursoItem) {
                    $id = $cursoItem->idcurso;
                    $nome = $cursoItem->nomeCurso;
                    $local = $cursoItem->localCurso;
                    $ativo = $cursoItem->ativo;

                    ?>
                    <tr>
                        <th scope="row"><?php echo $cont ?></th>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $local ?></td>
                        <td><?php if ($ativo === 'A') {
                                echo 'Ativado';
                            } else {
                                echo 'Desativado';
                            } ?></td>
                        <td>
                            <?php if ($ativo === 'A') {
                                ?>
                                <button class="btn btn-danger btn-md"
                                        onclick="ativarDesativar('desativarCurso.php','<?php echo $id ?>','listarCurso')">
                                    Desativar
                                </button>
                                <?php
                            } else {
                                ?>
                                <button class="btn btn-success btn-md"
                                        onclick="ativarDesativar('ativarCurso.php','<?php echo $id ?>','listarCurso')">
                                    Ativar
                                </button>
                                <?php
                            }
                            ?>
                            <button class="btn btn-primary btn-md"
                                    onclick="abrirModalJsCurso(<?php echo $id ?>, 'idEditCurso', '<?php echo $nome ?>', 'editNomeCurso', '<?php echo $local ?>', 'editLocalCurso','editCurso','A','btnEditCurso','editCurso','frmEditCurso')">
                                Alterar
                            </button>
                            <button class="btn btn-danger btn-md"
                                    onclick="abrirModalJsCurso('<?php echo $id ?>', 'idDeleteCurso', 'nao', 'nao', 'nao', 'nao','deleteCurso','A','btnDeleteCurso','deleteCurso','frmDeleteCurso')">
                                <span class="mdi mdi-trash-can"></span>
                            </button>
                        </td>
                    </tr>
                    <?php
                    ++$cont;
                }
            } else {
                ?>
                <th colspan="5" class="fs-5 text-center">NENHUM CURSO CADASTRADO!</th>
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



