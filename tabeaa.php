<?php
include_once "./config/constantes.php";
include_once "./config/conexao.php";
include_once "./func/funcoes.php";
?>
<link rel="stylesheet" href="./css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
      &gt;>
<link rel="stylesheet" href="./css/style.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<div class="card text-center">
    <div class="card-header bg-dark text-white">
        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-3" style="text-decoration-line: underline">#Administradores</p>

            <div class="d-flex float-end align-items-center">
                <button class="btn btn-sm btn-secondary"
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
                            <button class="btn btn-success btn-sm"
                                    onclick="abrirModalJsAdm('<?php echo $id ?>','idVermaisAdm','<?php echo $nome ?>','vermaisNomeAdm','<?php echo $sobrenome ?>','vermaisSobrenomeAdm','<?php echo $email ?>','vermaisEmailAdm','<?php echo $celular ?>','vermaisCelularAdm','<?php echo $cpf ?>','vermaisCpfAdm','<?php echo $nascimento ?>','vermaisNascimentoAdm','vermaisAdm','A','btnVermaisAdm','vermaisAdm','frmVermaisAdm')">
                                Ver mais
                            </button>
                            <button class="btn btn-primary btn-sm"
                                    onclick="abrirModalJsAdm('<?php echo $id ?>','idEditAdm','<?php echo $nome ?>','editNomeAdm','<?php echo $sobrenome ?>','editSobrenomeAdm','<?php echo $email ?>','editEmailAdm','<?php echo $celular ?>','editCelularAdm','<?php echo $cpf ?>','editCpfAdm','<?php echo $nascimento ?>','editNascimentoAdm','editAdm','A','btnEditAdm','editAdm','frmEditAdm')">
                                Alterar
                            </button>
                            <button class="btn btn-danger btn-sm"
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
</div>
<div class="card-footer text-body-secondary">
    <?php echo DATAATUAL ?>
</div>
</div>