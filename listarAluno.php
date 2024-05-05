<div class="d-flex justify-content-between align-items-center">
    <p class="fs-3">#Aluno(s)</p>
    <button class="btn btn-sm btn-secondary">Cadastrar</button>
</div>

<table class="table">
    <thead>
    <tr>
        <th scope="col" width="5%">#</th>
        <th scope="col" width="25%">Nome</th>
        <th scope="col" width="20%">Email</th>
        <th scope="col" width="15%">Nascimento</th>
        <th scope="col" width="15%">Celular</th>
        <th scope="col" width="20%">Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cont = 1;
    $adm = listarTabela('*', 'aluno');
    if ($adm !== false){
        foreach ($adm as $admItem) {
            $id = $admItem->idaluno;
            $nome = $admItem->nomeAluno;
            $email = $admItem->emailAluno;
            $nascimento = $admItem->nascimentoAluno;
            $celular = $admItem->celularAluno;

            ?>
            <tr>
                <th scope="row"><?php echo $cont ?></th>
                <td><?php echo $nome ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $nascimento ?></td>
                <td><?php echo $celular ?></td>
                <td>
                    <button class="btn btn-success">Ver mais</button>
                    <button class="btn btn-primary">Alterar</button>
                    <button class="btn btn-danger">Desativar</button>
                </td>
            </tr>
            <?php
            ++$cont;
        }
    }else{
        ?>
        <th colspan="5" class="fs-5 text-center">NENHUM ALUNO CADASTRADO!</th>
        <?php
    }
    ?>
    </tbody>
</table>
