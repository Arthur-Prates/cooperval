<div class="d-flex justify-content-between align-items-center">
    <p class="fs-3">#Aluno(s)</p>
    <button class="btn btn-sm btn-secondary"
            onclick="abrirModalJsAluno('nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','cadAluno','A','btnCadAluno','addAluno','frmCadAluno')">
        Cadastrar
    </button>
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
    $aluno = listarTabela('*', 'aluno');
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

            ?>
            <tr>
                <th scope="row"><?php echo $cont ?></th>
                <td><?php echo $nome . ' ' . $sobrenome; ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $nascimento ?></td>
                <td><?php echo $celular ?></td>
                <td>
                    <button class="btn btn-success btn-sm">Ver mais</button>
                    <button class="btn btn-primary btn-sm"
                            onclick="abrirModalJsAluno('<?php echo $id?>','idEditAluno','<?php echo $nome?>','editNomeAluno','<?php echo $sobrenome?>','editSobrenomeAluno','<?php echo $turma?>','editTurmaDoAluno','<?php echo $email?>','editEmailAluno','<?php echo $celular?>','editCelularAluno','<?php echo $cpf?>','editCpfAluno','<?php echo $nascimento?>','editNascimentoAluno','editAluno','A','btnEditAluno','editAluno','frmEditAluno')">
                        Alterar
                    </button>
                    <button class="btn btn-danger btn-sm"
                            onclick="abrirModalJsAluno('<?php echo $id?>','idDeleteAluno','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','deleteAluno','A','btnDeleteAluno','deleteAluno','frmDeleteAluno')">
                        Deletar
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

