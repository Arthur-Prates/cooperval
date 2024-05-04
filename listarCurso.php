<table class="table">
    <thead>
    <tr>
        <th scope="col" width="5%">#</th>
        <th scope="col" width="35%">Nome</th>
        <th scope="col" width="45%">Local do curso</th>
        <th scope="col" width="15%">Ações</th>
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
        <th colspan="5" class="fs-5 text-center">NENHUM CURSO CADASTRADO!</th>
        <?php
    }
    ?>
    </tbody>
</table>

