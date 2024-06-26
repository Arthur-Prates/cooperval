
<div class="card text-center">
    <div class="card-header bg-dark text-white">
        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-3" style="text-decoration-line: underline">#Administradores</p>

            <div class="d-flex float-end align-items-center">
                <button class="btn btn-md btnbonitoo botaoAddEvento"
                        onclick="abrirModalJsAdm('nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','cadAdm','A','btnCadAdm','addAdm','frmCadAdm')">
                    Cadastrar Administrador
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="containers text-white">
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
            $adm = listarTabela('*', 'adm');
            if ($adm !== false) {
                foreach ($adm as $admItem) {
                    $id = $admItem->idadm;
                    $nome = $admItem->nome;
                    $sobrenome = $admItem->sobrenome;
                    $email = $admItem->email;
                    $nascimento = $admItem->nascimento;
                    $celular = $admItem->celular;
                    $cpf = $admItem->cpf;

                    ?>
                    <tr>
                        <th scope="row"><?php echo $cont ?></th>
                        <td><?php echo $nome . ' ' . $sobrenome; ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $nascimento ?></td>
                        <td><?php echo $celular ?></td>
                        <td>
                            <button class="btn btn-success btn-md"
                                    onclick="abrirModalJsAdm('<?php echo $id ?>','idVermaisAdm','<?php echo $nome ?>','vermaisNomeAdm','<?php echo $sobrenome ?>','vermaisSobrenomeAdm','<?php echo $email ?>','vermaisEmailAdm','<?php echo $celular ?>','vermaisCelularAdm','<?php echo $cpf ?>','vermaisCpfAdm','<?php echo $nascimento ?>','vermaisNascimentoAdm','vermaisAdm','A','btnVermaisAdm','vermaisAdm','frmVermaisAdm')">
                                Ver mais
                            </button>
                            <button class="btn btn-primary btn-md"
                                    onclick="abrirModalJsAdm('<?php echo $id ?>','idEditAdm','<?php echo $nome ?>','editNomeAdm','<?php echo $sobrenome ?>','editSobrenomeAdm','<?php echo $email ?>','editEmailAdm','<?php echo $celular ?>','editCelularAdm','<?php echo $cpf ?>','editCpfAdm','<?php echo $nascimento ?>','editNascimentoAdm','editAdm','A','btnEditAdm','editAdm','frmEditAdm')">
                                Alterar
                            </button>
                            <button class="btn btn-danger btn-md"
                                    onclick="abrirModalJsAdm('<?php echo $id ?>','idDeleteAdm','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','deleteAdm','A','btnDeleteAdm','deleteAdm','frmDeleteAdm')">
                                <span class="mdi mdi-trash-can"></span>
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
    <div class="card-footer bg-dark text-white">
        <?php echo DATAATUAL ?>
    </div>
</div>