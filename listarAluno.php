<div class="card text-center">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-3">#Aluno(s)</p>

            <div class="d-flex float-end align-items-center">
                <button class="btn btn-sm btn-secondary"
                        onclick="abrirModalJsAluno('nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','cadAluno','A','btnCadAluno','addAluno','frmCadAluno')">
                    Cadastrar
                </button>
            </div>
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
            $aluno = listarTabelaInnerJoinOrdenada('*', 'aluno', 'turma', 'idturma', 'idturma', 'idaluno', 'ASC');
            if ($aluno !== false) {
                foreach ($aluno as $alunoItem) {
                    $id = $alunoItem->idaluno;
                    $nome = $alunoItem->nomeAluno;
                    $sobrenome = $alunoItem->sobrenomeAluno;
                    $email = $alunoItem->emailAluno;
                    $nascimento = $alunoItem->nascimentoAluno;
                    $celular = $alunoItem->celularAluno;
                    $turma = $alunoItem->idturma;
                    $cpf = $alunoItem->cpfAluno;
                    $nomeTurma = $alunoItem->nomeTurma;

                    ?>
                    <tr class="table-secondary">
                        <th scope="row"><?php echo $cont ?></th>
                        <td><?php echo $nome . ' ' . $sobrenome; ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $nascimento ?></td>
                        <td><?php echo $celular ?></td>
                        <td>
                            <button class="btn btn-success btn-sm"
                                    onclick="abrirModalJsAluno('<?php echo $id ?>','idVermaisAluno','<?php echo $nome ?>','vermaisNomeAluno','<?php echo $sobrenome ?>','vermaisSobrenomeAluno','<?php echo $nomeTurma ?>','vermaisTurmaDoAluno','<?php echo $email ?>','vermaisEmailAluno','<?php echo $celular ?>','vermaisCelularAluno','<?php echo $cpf ?>','vermaisCpfAluno','<?php echo $nascimento ?>','vermaisNascimentoAluno','vermaisAluno','A','btnVermaisAluno','vermaisAluno','frmVermaisAluno')">
                                Ver mais
                            </button>
                            <button class="btn btn-primary btn-sm"
                                    onclick="abrirModalJsAluno('<?php echo $id ?>','idEditAluno','<?php echo $nome ?>','editNomeAluno','<?php echo $sobrenome ?>','editSobrenomeAluno','<?php echo $turma ?>','editTurmaDoAluno','<?php echo $email ?>','editEmailAluno','<?php echo $celular ?>','editCelularAluno','<?php echo $cpf ?>','editCpfAluno','<?php echo $nascimento ?>','editNascimentoAluno','editAluno','A','btnEditAluno','editAluno','frmEditAluno')">
                                Alterar
                            </button>
                            <button class="btn btn-danger btn-sm"
                                    onclick="abrirModalJsAluno('<?php echo $id ?>','idDeleteAluno','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','deleteAluno','A','btnDeleteAluno','deleteAluno','frmDeleteAluno')">
                                <span class="mdi mdi-trash-can"></span>
                            </button>
                        </td>
                    </tr>
                    <?php
                    ++$cont;
                }
            } else {
                ?>
                <th colspan="5" class="fs-5 text-center">NENHUM ALUNO CADASTRADO!</th>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer text-body-secondary">
        <?php echo DATAATUAL ?>
    </div>
</div>
