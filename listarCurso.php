

<div class="card text-center">
    <div class="card-header">
        #Curso(s)
        <div class="d-flex float-end align-items-center">
            <button class="btn btn-sm btn-secondary" onclick="abrirModalJsCurso('cadCurso','A','btnCadCurso','addCurso','frmCadCurso')">Cadastrar</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="table-secondary">
                <th scope="col" width="5%">#</th>
                <th scope="col" width="35%">Nome</th>
                <th scope="col" width="40%">Local do curso</th>
                <th scope="col" width="20%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cont = 1;
            $curso = listarTabela('*', 'curso');
            if ($curso !== false){
                foreach ($curso as $cursoItem) {
                    $id = $cursoItem->idcurso;
                    $nome = $cursoItem->nomeCurso;
                    $local = $cursoItem->localCurso;

                    ?>
                    <tr class="table-secondary">
                        <th scope="row"><?php echo $cont ?></th>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $local ?></td>
                        <td>
                            <button class="btn btn-success btn-sm">Ativar</button>
                            <button class="btn btn-primary btn-sm" onclick="abrirModalJsCurso('editCurso','A','btnEditCurso','editCurso','frmEditCurso')">Alterar</button>
                            <button class="btn btn-danger btn-sm" onclick="abrirModalJsCurso('deleteCurso','A','btnDeleteCurso','deleteCurso','frmDeleteCurso')">Deletar</button>
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
    </div>
    <div class="card-footer text-body-secondary">
        <?php echo DATAATUAL?>
    </div>
</div>


