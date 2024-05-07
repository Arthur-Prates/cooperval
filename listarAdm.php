

<div class="card text-center">
    <div class="card-header">
        #Administrador(es)
        <div class="d-flex float-end align-items-center">
            <button class="btn btn-sm btn-secondary"
                    onclick="abrirModalJsAdm('nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','cadAdm','A','btnCadAdm','addAdm','frmCadAdm')">
                Cadastrar
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="table-secondary">
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
            $adm = listarTabela('*', 'adm');
            if ($adm !== false) {
                foreach ($adm as $admItem) {
                    $id = $admItem->idadm;
                    $nome = $admItem->nome;
                    $sobrenome = $admItem->sobrenome;
                    $email = $admItem->email;
                    $nascimento = $admItem->nascimento;
                    $celular = $admItem->celular;

                    ?>
                    <tr class="table-secondary">
                        <th scope="row"><?php echo $cont ?></th>
                        <td><?php echo $nome . ' ' . $sobrenome; ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $nascimento ?></td>
                        <td><?php echo $celular ?></td>
                        <td>
                            <button class="btn btn-success btn-sm">Ver mais</button>
                            <button class="btn btn-primary btn-sm"
                                    onclick="abrirModalJsAdm('nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','editAdm','A','btnEditAdm','editAdm','frmEditAdm')">
                                Alterar
                            </button>
                            <button class="btn btn-danger btn-sm"
                                    onclick="abrirModalJsAdm('nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','deleteAdm','A','btnDeleteAdm','deleteAdm','frmDeleteAdm')">
                                Deletar
                            </button>
                        </td>
                    </tr>
                    <?php
                    ++$cont;
                }
            } else {
                ?>
                <th colspan="5" class="fs-5 text-center">NENHUM ADMINISTRADOR CADASTRADO!</th>
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


