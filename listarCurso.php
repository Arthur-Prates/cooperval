<div class="d-flex justify-content-between align-items-center">
    <p class="fs-3">#Curso(s)</p>
    <button class="btn btn-sm btn-secondary" onclick="abrirModalJsCurso('cadCurso','A','btnCadCurso','addCurso','frmCadCurso')">Cadastrar</button>
</div>

<table class="table">
    <thead>
    <tr>
        <th scope="col" width="5%">#</th>
        <th scope="col" width="35%">Nome</th>
        <th scope="col" width="40%">Local do curso</th>
        <th scope="col" width="20%">Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cont = 1;
    $adm = listarTabela('*', 'curso');
    if ($adm !== false){
        foreach ($adm as $admItem) {
            $id = $admItem->idcurso;
            $nome = $admItem->nomeCurso;
            $local = $admItem->localCurso;

            ?>
            <tr>
                <th scope="row"><?php echo $cont ?></th>
                <td><?php echo $nome ?></td>
                <td><?php echo $local ?></td>
                <td>
                    <button class="btn btn-success">Ativar</button>
                    <button class="btn btn-primary" onclick="abrirModalJsCurso('editCurso','A','btnEditCurso','editCurso','frmEditCurso')">Alterar</button>
                    <button class="btn btn-danger" onclick="abrirModalJsCurso('deleteCurso','A','btnDeleteCurso','deleteCurso','frmDeleteCurso')">Deletar</button>
                </td>
            </tr>
            <?php
            ++$cont;
        }
    }else{
        ?>
        <th colspan="5" class="fs-5 text-center">NENHUM CURSO CADASTRADO!</th>
        <?php
    }
    ?>
    </tbody>
</table>

