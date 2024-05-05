<div class="d-flex justify-content-between align-items-center">
    <p class="fs-3">#Curso(s)</p>
    <button class="btn btn-sm btn-secondary">Cadastrar</button>
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
                    <button class="btn btn-primary">Alterar</button>
                    <button class="btn btn-danger">Desativar</button>
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

