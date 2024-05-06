<div class="d-flex justify-content-between align-items-center">
    <p class="fs-3">#Agenda</p>

    <div class="d-flex justify-content-end">
        <button class="btn botaoAddEvento" data-bs-toggle="modal"
                onclick="abrirModalJsAddEvento('nao','nao', 'nao', 'nao','nao', 'nao', 'nao','nao', 'nao', 'nao','cadastrarEvento','A','btnAddEvento', 'addEvento', 'frmAddEvento')">
            Cadastrar
            Evento
        </button>
    </div>
</div>

<table class="table text-center table-striped  "
<thead>
<tr>
    <th scope="col" width="5%">#</th>
    <th scope="col" width="25%">Título</th>
    <th scope="col" width="20%">Data de Início</th>
    <th scope="col" width="15%">Data Final</th>
    <th scope="col" width="15%">Comentários</th>
    <th scope="col" width="20%">Ações</th>
</tr>
</thead>
<tbody>
<?php
$cont = 1;
$adm = listarTabela('*', 'calendario');
if ($adm !== false) {
    foreach ($adm as $admItem) {
        $id = $admItem->idcalendario;
        $titulo = $admItem->titulo;
        $dataIn = $admItem->dataIn;
        $dataEnd = $admItem->dataEnd;
        $cadastro = $admItem->cadastro;
        $comentario = $admItem->comentario;


        ?>
        <tr>
            <th scope="row"><?php echo $cont ?></th>
            <td><?php echo $titulo ?></td>
            <td><?php dataHoraGlobal($dataIn, 'N'); ?></td>
            <td><?php dataHoraGlobal($dataEnd, 'N'); ?></td>
            <td><input type="text" value="<?php echo $comentario ?>" class="overflow-hidden"
                       style="border: none;background: transparent; " disabled></td>
            <td>
                <button class="btn btn-success btn-sm"
                        onclick="abrirModalJsAddEvento('<?php echo $id ?>','idVerMais','<?php echo $titulo ?>', 'tituloVerMais','<?php echo $dataIn ?>','dataInVerMais', '<?php echo $dataEnd ?>','dataEndVerMais','<?php echo $comentario ?>','comentarioVerMais','editEvento','A','btnVerMaisEvento', 'editEvento', 'frmeditEvento')">
                    Ver Mais
                </button>
                <button class="btn btn-primary btn-sm"
                        onclick="abrirModalJsAddEvento('<?php echo $id ?>','idEdit','<?php echo $titulo ?>', 'tituloEdit','<?php echo $dataIn ?>','dataInEdit', '<?php echo $dataEnd ?>','dataEndEdit','<?php echo $comentario ?>','comentarioEdit','editEvento','A','btnEditEvento', 'editEvento', 'frmEditEvento')">
                    Alterar
                </button>
                <form method="post" name="frmDeleteEvento<?php echo $id ?>" id="frmDeleteEvento<?php echo $id ?>">
                    <input type="text" value="<?php echo $id ?>" name="idDeleteEvento" id="idDeleteEvento" hidden="hidden">
                    <button class="btn btn-danger btn-sm" type="submit"
                            onclick="deleteGeral('deleteEvento','frmDeleteEvento<?php echo $id ?>')">
                        <span class="mdi mdi-trash-can"></span>
                    </button>
                </form>
            </td>
        </tr>
        <?php
        ++$cont;
    }
} else {
    ?>
    <th colspan="5" class="fs-5 text-center">NENHUM EVENTO CADASTRADO!</th>
    <?php
}
?>
</tbody>
</table>

