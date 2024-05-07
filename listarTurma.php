

<div class="card text-center">
    <div class="card-header">
        #Turma(s)
        <div class="d-flex float-end align-items-center">
            <button class="btn btn-sm btn-secondary" onclick="abrirModalJsTurma('cadTurma', abrirModal = 'A', 'btnCadTurma', 'addTurma', 'frmCadTurma')">Cadastrar</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="table-secondary">
                <th scope="col" width="5%">#</th>
                <th scope="col" width="25%">Número da turma</th>
                <th scope="col" width="25%">Nome da turma</th>
                <th scope="col" width="15%">Código da turma</th>
                <th scope="col" width="15%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cont = 1;
            $turma = listarTabela('*', 'turma');
            if ($turma !== false){
                foreach ($turma as $turmaItem) {
                    $id = $turmaItem->idturma;
                    $nome = $turmaItem->numeroTurma;
                    $email = $turmaItem->nomeTurma;
                    $nascimento = $turmaItem->codigoTurma;


                    ?>
                    <tr class="table-secondary">
                        <th scope="row"><?php echo $cont ?></th>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $nascimento ?></td>
                        <td>
                            <button class="btn btn-success btn-sm">Ativar</button>
                            <button class="btn btn-primary btn-sm" onclick="abrirModalJsTurma('editTurma', 'A', 'btnEditTurma', 'editTurma', 'frmEditTurma')">Alterar</button>
                            <button class="btn btn-danger btn-sm" onclick="abrirModalJsTurma('deleteTurma', 'A', 'btnDeleteTurma', 'deleteTurma', 'frmDeleteTurma')">Deletar</button>
                        </td>
                    </tr>
                    <?php
                    ++$cont;
                }
            }else{
                ?>
                <th colspan="5" class="fs-5 text-center">NENHUMA TURMA CADASTRADA!</th>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer text-body-secondary">
        <?php echo DATAATUAL?>
    </div>
</div>


