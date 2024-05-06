<div class="d-flex justify-content-between align-items-center">
    <p class="fs-3">#Turma(s)</p>
    <button class="btn btn-sm btn-secondary" onclick="abrirModalJsTurma('cadTurma', abrirModal = 'A', 'btnCadTurma', 'addTurma', 'frmCadTurma')">Cadastrar</button>
</div>

<table class="table">
    <thead>
    <tr>
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
    $adm = listarTabela('*', 'turma');
    if ($adm !== false){
        foreach ($adm as $admItem) {
            $id = $admItem->idturma;
            $nome = $admItem->numeroTurma;
            $email = $admItem->nomeTurma;
            $nascimento = $admItem->codigoTurma;


            ?>
            <tr>
                <th scope="row"><?php echo $cont ?></th>
                <td><?php echo $nome ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $nascimento ?></td>
                <td>
                    <button class="btn btn-success">Ativar</button>
                    <button class="btn btn-primary" onclick="abrirModalJsTurma('editTurma', 'A', 'btnEditTurma', 'editTurma', 'frmEditTurma')">Alterar</button>
                    <button class="btn btn-danger" onclick="abrirModalJsTurma('deleteTurma', 'A', 'btnDeleteTurma', 'deleteTurma', 'frmDeleteTurma')">Deletar</button>
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

