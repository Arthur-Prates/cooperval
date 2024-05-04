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
                    <button>Ativar</button>
                    <button>Alterar</button>
                    <button>Excluir</button>
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

