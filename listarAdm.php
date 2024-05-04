<table class="table">
    <thead>
    <tr>
        <th scope="col" width="5%">#</th>
        <th scope="col" width="25%">Nome</th>
        <th scope="col" width="25%">Email</th>
        <th scope="col" width="15%">Nascimento</th>
        <th scope="col" width="15%">Celular</th>
        <th scope="col" width="15%">Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cont = 1;
    $adm = listarTabela('*', 'adm');
    if ($adm !== false){
        foreach ($adm as $admItem) {
            $id = $admItem->idadm;
            $nome = $admItem->nome;
            $email = $admItem->email;
            $nascimento = $admItem->nascimento;
            $celular = $admItem->celular;

            ?>
            <tr>
                <th scope="row"><?php echo $cont ?></th>
                <td><?php echo $nome ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $nascimento ?></td>
                <td><?php echo $celular ?></td>
                <td>
                    <button>Ver mais</button>
                    <button>Alterar</button>
                    <button>Excluir</button>
                </td>
            </tr>
            <?php
            ++$cont;
        }
    }else{
    ?>
        <th colspan="5" class="fs-5 text-center">NENHUM ADMINISTRADOR CADASTRADO!</th>
    <?php
    }
    ?>
    </tbody>
</table>

