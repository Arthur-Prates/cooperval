<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

if ($_SESSION['idadm']) {
    $idUsuario = $_SESSION['idadm'];
    //echo '<p class="text-white">'.$idUsuario.'</p>';

} else {
    session_destroy();
    header('location: index.php?error=404');
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Title</title>
    <meta charset="utf-8"/>
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
</head>

<body>

<nav class="navbar navbar-expand-lg verdeCoop" data-bs-theme="dark" onclick="abrirModalJsAddEvento()">
    <div class="container-fluid">
        <a class="navbar-brand" data-bs-toggle="modal" data-bs-target="#ModalCooperval"
           onclick="abrirModalJsAdm('nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','nao','ModalCooperval','A','btnFechar','nao','nao')"><img
                    src="./img/coopevalLogo.jpg" alt="" width="50" style="border-radius: 50%"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                $idUsuario = $_SESSION['idadm'];
                $buscaAdm = listarItemExpecifico('idadm,nome,sobrenome', 'adm', 'idadm', $idUsuario);
                foreach ($buscaAdm as $item) {
                    $nomeADM = $item->nome;
                    $sobrenomeADM = $item->sobrenome;
                    echo "$nomeADM $sobrenomeADM";

                }
                ?>
            </ul>
            <button type="button" name="logout" id="logout" class="btn btn-danger" onclick="redireciona('logout.php')">
                Sair
            </button>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 verdeCoop tamanhoBarraLateral fs-4">
            <div class="inputii" style="background-color: #048149">
                <div class="mt-3 mb-2 value" onclick="carregarConteudo('listarCalendario')"><i
                            class="fas fa-calendar-alt"></i> Calendário
                </div>
                <div class="mt-3 mb-2 value" onclick="carregarConteudo('listarAluno')"><i
                            class='fas fa-user-graduate'></i> Alunos
                </div>
                <div class="mt-3 mb-2 value" onclick="carregarConteudo('listarCurso')"><i class="fas fa-chalkboard"></i>
                    Cursos
                </div>
                <div class="mt-3 mb-2 value" onclick="carregarConteudo('listarTurma')"><i
                            class="fas fa-chalkboard-teacher"></i> Turmas
                </div>
                <div class="mt-3 mb-2 value" onclick="carregarConteudo('listarAdm')"><i class="fas fa-address-card"></i>
                    Administradores
                </div>
            </div>
        </div>
        <div class="col-lg-10 mt-3">
            <div id="show">

                <div id='calendar'></div>
            </div>

            <!-- Modal Add Evento-->
            <div class="modal fade" id="cadastrarEvento" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #1E2B37;color: white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Evento</h1>
                            <button type="button" class="btn-close text-light" onclick="window.location.reload()"
                                    aria-label="Close"
                                    style="color: white !important; background-color: #2c3e50"></button>
                        </div>
                        <form method="post" name="frmAddEvento" id="frmAddEvento">
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Título</span>
                                    <input type="text" class="form-control" placeholder="Título" aria-label="Título"
                                           id="titulo" name="titulo">
                                </div>
                                <div class="input-group mb-3">

                                    <span class="input-group-text">Turma</span>
                                    <select class="form-select" aria-label="Default select example" id="turma"
                                            name="turma">
                                        <?php
                                        $turmas = listarTabela('*', 'turma');
                                        foreach ($turmas as $turma) {
                                            $idturma = $turma->idturma;
                                            $nome = $turma->nomeTurma;
                                            ?>
                                            <option value="<?php echo $idturma ?>"><?php echo $nome ?></option>

                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="input-group mb-3">

                                    <span class="input-group-text">Curso</span>
                                    <select class="form-select" aria-label="Default select example" id="curso"
                                            name="curso">
                                        <?php
                                        $cursos = listarTabela('*', 'curso');
                                        foreach ($cursos as $item) {
                                            $idturma = $item->idcurso;
                                            $nome = $item->nomeCurso;
                                            ?>
                                            <option value="<?php echo $idturma ?>"><?php echo $nome ?></option>

                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="dataIn">Data e Hora Inicial</span>
                                    <input type="datetime-local" class="form-control" placeholder="dataIn"
                                           aria-label="dataIn" id="dataIn" name="dataIn"
                                           value="<?php echo DATATIMEATUAL ?>" required="required">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="dataEnd">Data e Hora Final</span>
                                    <input type="datetime-local" class="form-control" placeholder="dataEnd"
                                           aria-label="dataEnd" id="dataEnd" name="dataEnd"
                                           value="<?php echo DATATIMEATUAL ?>">
                                </div>
                                <div class="input-group mb-3">

                                    <span class="input-group-text" id="cor">Cores</span>
                                    <select class="form-select" aria-label="Default select example" id="cor" name="cor">
                                        <option value="blue" style="color:blue" selected>Azul</option>
                                        <option value="gray" style="color:gray">Cinza</option>
                                        <option value="green" style="color:green">Verde</option>
                                        <option value="red" style="color:red">Vermelho</option>
                                        <option value="black" style="color:black">Preto</option>
                                        <option value="purple" style="color:purple">Roxo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group">
                                <label class="input-group-text" for="comentário">Comentários</label>
                                <textarea class="form-control" placeholder="Escreva um comentário" maxlength="255"
                                          id="comentario" name="comentario"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
                                </button>
                                <button type="submit" class="btn btn-primary" id="btnAddEvento">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Edit Evento-->
            <div class="modal fade" id="editEvento" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #1E2B37;color: white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Evento</h1>
                            <button type="button" class="btn-close text-light" onclick="window.location.reload()"
                                    aria-label="Close"
                                    style="color: white !important; background-color: #2c3e50"></button>
                        </div>
                        <form method="post" name="frmEditEvento" id="frmEditEvento">
                            <div class="modal-body">
                                <input type="text" id="idEdit" name="idEdit" hidden='hidden'>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Título</span>
                                    <input type="text" class="form-control" placeholder="Título" aria-label="Título"
                                           id="tituloEdit" name="tituloEdit">
                                </div>
                                <div class="input-group mb-3">

                                    <span class="input-group-text">Turma</span>
                                    <select class="form-select" aria-label="Default select example" id="turmaEdit"
                                            name="turmaEdit">
                                        <?php
                                        $turmas = listarTabela('*', 'turma');
                                        foreach ($turmas as $turma) {
                                            $idturma = $turma->idturma;
                                            $nome = $turma->nomeTurma;
                                            ?>
                                            <option value="<?php echo $idturma ?>"><?php echo $nome ?></option>

                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="input-group mb-3">

                                    <span class="input-group-text">Curso</span>
                                    <select class="form-select" aria-label="Default select example" id="cursoEdit"
                                            name="cursoEdit">
                                        <?php
                                        $cursos = listarTabela('*', 'curso');
                                        foreach ($cursos as $item) {
                                            $idturma = $item->idcurso;
                                            $nome = $item->nomeCurso;
                                            ?>
                                            <option value="<?php echo $idturma ?>"><?php echo $nome ?></option>

                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="dataIn">Data e Hora Inicial</span>
                                    <input type="datetime-local" class="form-control" placeholder="dataIn"
                                           aria-label="dataIn" id="dataInEdit" name="dataInEdit" value="">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="dataEnd">Data e Hora Final</span>
                                    <input type="datetime-local" class="form-control" placeholder="dataEnd"
                                           aria-label="dataEnd" id="dataEndEdit" name="dataEndEdit" value="">
                                </div>
                                <div class="input-group mb-3">

                                    <span class="input-group-text" id="cor">Cores</span>
                                    <select class="form-select" aria-label="Default select example" id="corEdit"
                                            name="corEdit">
                                        <option value="blue" style="color:blue" selected>Azul</option>
                                        <option value="gray" style="color:gray">Cinza</option>
                                        <option value="green" style="color:green">Verde</option>
                                        <option value="red" style="color:red">Vermelho</option>
                                        <option value="black" style="color:black">Preto</option>
                                        <option value="purple" style="color:purple">Roxo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group">
                                <label class="input-group-text" for="comentário">Comentários</label>
                                <textarea class="form-control" placeholder="Escreva um comentário" maxlength="255"
                                          id="comentarioEdit" name="comentarioEdit"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
                                </button>
                                <button type="submit" class="btn btn-primary" id="btnEditEvento">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Ver Mais Evento-->
            <div class="modal fade" id="verMaisEvento" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #1E2B37;color: white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ver Mais</h1>
                            <button type="button" class="btn-close text-light" onclick="window.location.reload()"
                                    aria-label="Close"
                                    style="color: white !important; background-color: #2c3e50"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" id="idVerMais" name="idVerMais" hidden='hidden'>
                                    <h3 class='text-center'>Título</h3>
                                    <input disabled type="text" style='background:transparent; border:none;'
                                           class=" text-center form-control" placeholder="Título" aria-label="Título"
                                           id="tituloVerMais" name="tituloVerMais">

                                </div>
                                <div class="col-6">
                                    <h3 class='text-center'>Cor</h3>
                                    <input disabled type="text" id='corVerMais' name='c'
                                           style='background:transparent; border:none;'
                                           class="text-center form-control">
                                </div>
                                <div class="col-6">
                                    <h3 class='text-center'>Turma</h3>

                                    <input disabled type="text" id='turmaVerMais' name='turmaVerMais'
                                           style='background:transparent; border:none;'
                                           class="text-center form-control">
                                </div>
                                <div class="col-6">

                                    <h3 class='text-center'>Curso</h3>

                                    <input disabled type="text" id='cursoVerMais' name='cursoVerMais'
                                           style='background:transparent; border:none;'
                                           class="text-center form-control">
                                </div>
                                <div class="col-6">
                                    <h3 class='text-center' id="dataIn">Data e Hora Inicial</h3>

                                    <input disabled type="datetime-local" style='background:transparent; border:none;'
                                           class="text-center form-control" placeholder="dataIn" aria-label="dataIn"
                                           id="dataInVerMais" name="dataInVerMais" value="">
                                </div>
                                <div class="col-6">
                                    <h3 class='text-center' id="dataEnd">Data e Hora Final</h3>

                                    <input disabled type="datetime-local" style='background:transparent; border:none;'
                                           class="text-center form-control" placeholder="dataEnd" aria-label="dataEnd"
                                           id="dataEndVerMais" name="dataEndVerMais" value="">
                                </div>
                                <div class="col-12">

                                    <h3 class='text-center' for="comentário">Comentários</h3>
                                    <textarea disabled style='background:transparent; border:none;'
                                              class="text-center form-control" placeholder="Escreva um comentário"
                                              maxlength="255" id="comentarioVerMais"
                                              name="comentarioVerMais"></textarea>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const calendarEl = document.getElementById('calendar')
                    const calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth', //tipo de calendário inicial quando abre o site

                        dayMaxEventRows: true,
                        views: {
                            timeGrid: {
                                dayMaxEventRows: 6 // aqui vc fala quantos eventos pode aparecer no dia do Mês
                            }
                        },
                        allDaySlot: false,
                        slotDuration: '00:10',
                        slotLabelInterval: '00:30',
                        timeZone: 'America/Sao_Paulo',
                        headerToolbar: { // aq é o button q q clica pra abrir os tipos de calendário
                            left: 'prev,today,next',
                            center: 'title',
                            right: 'timeGridDay,dayGridWeek,dayGridMonth,multiMonthYear' //ordem dos botoes
                        },
                        editable: false, //se está ativado, eu posso mover os eventos de lugar sem precisar clicar pra editar
                        selectable: false, //literalmente selecionar os itens
                        buttonText: { //tradução das palavras padroes
                            today: `Hoje`,
                            month: 'Mês',
                            week: 'Semana',
                            day: 'Dia',
                            year: 'Ano',
                            list: 'Lista',

                        },
                        locale: 'pt-br',
                        events: [ //aqui fica os eventos q aparece no calendário
                            <?php
                            $vari = listarTabela('*', 'calendario');
                            foreach ($vari as $item) {

                                $id = $item->idcalendario;
                                $titulo = $item->titulo;
                                $dataInicio = $item->dataIn;
                                $dataFinal = $item->dataEnd;
                                $cor = $item->cor;
                                echo "
                {
                    title: '$titulo',
                    start: '$dataInicio',
                    end: '$dataFinal',
                    backgroundColor: '$cor',
                    borderColor: '$cor',
                    
                    
                },";
                            }

                            ?>


                        ],
                        //
                        //dateClick: function (info) {
                        //    abrirModalJsAddEvento('editarEvento17', 'A', 'btnEditEvento', 'editEvento', 'frmEditEvento')
                        //    console.log('Clicked on: ' + info.dateStr); //aqui ele te passa a data q vc clicou
                        //    console.log('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY); //coodernadas do mouse
                        //    console.log('Current view: ' + info.view.type); // tipo de calendário
                        //    info.dayEl.style.backgroundColor = 'blue'; // consigo mudar a cor do item só de clicar
                        //},
                        //
                    })
                    calendar.render()
                })
            </script>

            <!--<script src="./js/controle.js"></script>-->

        </div>
    </div>
</div>
</div>


<!--Modal de cadastro de alunos-->
<div class="modal fade" id="cadAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmCadAluno" id="frmCadAluno">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="cadNomeAluno" class="label-control">Nome:</label>
                                    <input type="text" name="cadNomeAluno" id="cadNomeAluno"
                                           placeholder="Digite Seu Nome" class="form-control"
                                           required="required">
                                </div>
                                <div class="col-6">
                                    <label for="cadSobrenomeAluno" class="label-control">Sobrenome:</label>
                                    <input type="text" name="cadSobrenomeAluno" placeholder="Digite Seu Sobrenome"
                                           id="cadSobrenomeAluno"
                                           class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="turmaDoAluno" class="label-control">Turma:</label>
                            <select name="turmaDoAluno" id="turmaDoAluno" class="form-control">
                                <?php
                                $curso = listarTabela('*', 'turma');
                                foreach ($curso as $item) {
                                    $idCurso = $item->idturma;
                                    $nome = $item->nomeTurma;

                                    ?>
                                    <option value="<?php echo $idCurso ?>"><?php echo $nome ?></option>
                                    <?php

                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-8">
                            <label for="cadEmailAluno" class="label-control">Email:</label>
                            <input type="email" name="cadEmailAluno" placeholder="Digite Seu Email" id="cadEmailAluno"
                                   class="form-control"
                                   required="required">
                        </div>
                        <div class="col-4">
                            <label for="cadCelularAluno" class="label-control">Celular:</label>
                            <input type="text" name="cadCelularAluno" placeholder="Digite Seu N°" id="cadCelularAluno"
                                   class="form-control telefoneBR" required="required">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="cadCpfAluno" class="label-control">CPF:</label>
                            <input type="text" name="cadCpfAluno" placeholder="000.000.000-00" id="cadCpfAluno"
                                   class="form-control cpf"
                                   required="required">
                        </div>
                        <div class="col-6">
                            <label for="cadNascimentoAluno" class="label-control">Data de Nascimento:</label>
                            <input type="date" name="cadNascimentoAluno" id="cadNascimentoAluno" class="form-control"
                                   required="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnCadAluno">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de edicao de alunos-->
<div class="modal fade" id="editAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de Aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditAluno" id="frmEditAluno">
                <div class="modal-body">
                    <div>
                        <input type="text" id="idEditAluno" name="idEditAluno">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="editNomeAluno" class="label-control">Nome:</label>
                                    <input type="text" name="editNomeAluno" id="editNomeAluno" class="form-control"
                                           required="required">
                                </div>
                                <div class="col-6">
                                    <label for="editSobrenomeAluno" class="label-control">Sobrenome:</label>
                                    <input type="text" name="editSobrenomeAluno" id="editSobrenomeAluno"
                                           class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="editTurmaDoAluno" class="label-control">Turma:</label>
                            <select name="editTurmaDoAluno" id="editTurmaDoAluno" class="form-control">
                                <?php
                                $curso = listarTabela('*', 'turma');
                                foreach ($curso as $item) {
                                    $idCurso = $item->idturma;
                                    $nome = $item->nomeTurma;

                                    ?>
                                    <option value="<?php echo $idCurso ?>"><?php echo $nome ?></option>
                                    <?php

                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-8">
                            <label for="editEmailAluno" class="label-control">Email:</label>
                            <input type="email" name="editEmailAluno" id="editEmailAluno" class="form-control"
                                   required="required">
                        </div>
                        <div class="col-4">
                            <label for="editCelularAluno" class="label-control">Celular:</label>
                            <input type="text" name="editCelularAluno" id="editCelularAluno"
                                   class="form-control telefoneBR" required="required">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="editCpfAluno" class="label-control">CPF:</label>
                            <input type="text" name="editCpfAluno" id="editCpfAluno" class="form-control cpf"
                                   required="required">
                        </div>
                        <div class="col-6">
                            <label for="editNascimentoAluno" class="label-control">Data de Nascimento:</label>
                            <input type="date" name="editNascimentoAluno" id="editNascimentoAluno" class="form-control"
                                   required="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditAluno">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de deletar aluno-->
<div class="modal fade" id="deleteAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteAluno" id="frmDeleteAluno">
                <div class="modal-body">
                    <div>
                        <input type="text" id="idDeleteAluno" name="idDeleteAluno">
                    </div>
                    <div class="">
                        <p class="fs-3"> Tem certeza que deseja deletar esse aluno?</p>
                        <p><b>Realizar essa ação excluirá todos os registros desse aluno, não havendo possibilidade de
                                recuperação!</b></p>
                    </div>
                    <div>
                        <input type="checkbox" name="confimacaoDeleteAluno" id="confimacaoDeleteAluno"
                               required="required">
                        <label for="confimacaoDeleteAluno">Tenho Certeza!</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteAluno">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Modal de cadastro de administrador-->
<div class="modal fade" id="cadAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Aministrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmCadAdm" id="frmCadAdm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="cadNomeAdm" class="label-control">Nome:</label>
                                    <input type="text" name="cadNomeAdm" placeholder="Digite Seu Nome" id="cadNomeAdm"
                                           class="form-control"
                                           required="required">
                                </div>
                                <div class="col-6">
                                    <label for="cadSobrenomeAdm" class="label-control">Sobrenome:</label>
                                    <input type="text" name="cadSobrenomeAdm" placeholder="Digite Seu Sobrenome"
                                           id="cadSobrenomeAdm" class="form-control"
                                           required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-8">
                            <label for="cadEmailAdm" class="label-control">Email:</label>
                            <input type="email" name="cadEmailAdm" placeholder="Digite Seu Email" id="cadEmailAdm"
                                   class="form-control"
                                   required="required">
                        </div>
                        <div class="col-4">
                            <label for="cadSenhaAdm" class="label-control">Senha:</label>
                            <input type="text" name="cadSenhaAdm" placeholder="**********" id="cadSenhaAdm"
                                   class="form-control"
                                   required="required">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="cadCelularAdm" class="label-control">Celular:</label>
                            <input type="text" name="cadCelularAdm" placeholder="Digite Seu N°" id="cadCelularAdm"
                                   class="form-control telefoneBR"
                                   required="required">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="cadCpfAdm" class="label-control">CPF:</label>
                            <input type="text" name="cadCpfAdm" placeholder="000.000.000-00" id="cadCpfAdm"
                                   class="form-control cpf"
                                   required="required">
                        </div>
                        <div class="col-6">
                            <label for="cadNascimentoAdm" class="label-control">Data de Nascimento:</label>
                            <input type="date" name="cadNascimentoAdm" id="cadNascimentoAdm" class="form-control"
                                   required="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnCadAdm">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de edicao de administrador-->
<div class="modal fade" id="editAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de Administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditAdm" id="frmEditAdm">
                <div class="modal-body">
                    <div>
                        <input type="text" id="idEditAdm" name="idEditAdm">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="editNomeAdm" class="label-control">Nome:</label>
                                    <input type="text" name="editNomeAdm" id="editNomeAdm" class="form-control"
                                           required="required">
                                </div>
                                <div class="col-6">
                                    <label for="editSobrenomeAdm" class="label-control">Sobrenome:</label>
                                    <input type="text" name="editSobrenomeAdm" id="editSobrenomeAdm"
                                           class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-8">
                            <label for="editEmailAdm" class="label-control">Email:</label>
                            <input type="email" name="editEmailAdm" id="editEmailAdm" class="form-control"
                                   required="required">
                        </div>
                        <div class="col-4">
                            <label for="editSenhaAdm" class="label-control">Senha:</label>
                            <input type="text" name="editSenhaAdm" id="editSenhaAdm" class="form-control"
                                   required="required">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="editCelularAdm" class="label-control">Celular:</label>
                            <input type="text" name="editCelularAdm" id="editCelularAdm" class="form-control telefoneBR"
                                   required="required">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="editCpfAdm" class="label-control">Cpf:</label>
                            <input type="text" name="editCpfAdm" id="editCpfAdm" class="form-control cpf"
                                   required="required">
                        </div>
                        <div class="col-6">
                            <label for="editNascimentoAdm" class="label-control">Data de nascimento:</label>
                            <input type="date" name="editNascimentoAdm" id="editNascimentoAdm" class="form-control"
                                   required="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditAdm">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de deletar administrador-->
<div class="modal fade" id="deleteAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteAdm" id="frmDeleteAdm">
                <div class="modal-body">
                    <div>
                        <input type="text" id="idDeleteAdm" name="idDeleteAdm">
                    </div>
                    <div class="">
                        <p class="fs-3">Tem certeza que deseja deletar esse administrador?</p>
                        <p><b>Realizar essa ação excluirá todos os registros desse administrador, não havendo
                                possibilidade
                                de recuperação!</b></p>
                    </div>
                    <div>
                        <input type="checkbox" name="confimacaoDeleteAdm" id="confimacaoDeleteAdm" required="required">
                        <label for="confimacaoDeleteAdm">Tenho Certeza!</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteAdm">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de cadastro de curso-->
<div class="modal fade" id="cadCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Curso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmCadCurso" id="frmCadCurso">
                <div class="modal-body">
                    <div class="">
                        <label for="cadNomeCurso" class="label-control">Nome do Curso:</label>
                        <input type="text" name="cadNomeCurso" placeholder="Digite Seu Curso" id="cadNomeCurso"
                               required="required"
                               class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="cadLocalCurso" class="label-control">Local do Curso:</label>
                        <input type="text" name="cadLocalCurso" placeholder="Digite o Local do Seu Curso"
                               id="cadLocalCurso" required="required"
                               class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnCadCurso">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de edicao de curso-->
<div class="modal fade" id="editCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de Curso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditCurso" id="frmEditCurso">
                <div class="modal-body">
                    <input type="text" name="idEditCurso" id="idEditCurso">
                    <div class="">
                        <label for="editNomeCurso" class="label-control">Nome do Curso:</label>
                        <input type="text" name="editNomeCurso" placeholder="Digite Seu Curso" id="editNomeCurso"
                               required="required"
                               class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="editLocalCurso" class="label-control">Local do Curso:</label>
                        <input type="text" name="editLocalCurso" placeholder="Digite o Local do Seu Curso"
                               id="editLocalCurso" required="required"
                               class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditCurso">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de deletar curso-->
<div class="modal fade" id="deleteCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Curso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteCurso" id="frmDeleteCurso">
                <div class="modal-body">
                    <div>
                        <input type="text" id="idDeleteCurso" name="idDeleteCurso">
                    </div>
                    <div class="">
                        <p class="fs-3">Tem certeza que deseja deletar esse curso?</p>
                        <p><b>Realizar essa ação excluirá todos os registros desse curso, não havendo possibilidade de
                                recuperação!</b></p>
                    </div>
                    <div>
                        <input type="checkbox" name="confimacaoDeleteCurso" id="confimacaoDeleteCurso"
                               required="required">
                        <label for="confimacaoDeleteCurso">Tenho Certeza!</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteCurso">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Modal de cadastro de turma-->
<div class="modal fade" id="cadTurma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Turma</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmCadTurma" id="frmCadTurma">
                <div class="modal-body">
                    <div>
                        <label for="cadNumeroTurma" class="label-control">Número da Turma:</label>
                        <input type="text" name="cadNumeroTurma" placeholder="Digite o Número da Sua Turma"
                               id="cadNumeroTurma" required="required"
                               class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="cadNomeTurma" class="label-control">Nome da Turma:</label>
                        <input type="text" name="cadNomeTurma" placeholder="Digite Sua Turma" id="cadNomeTurma"
                               required="required"
                               class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="cadCodigoTurma" class="label-control">Código da Turma:</label>
                        <input type="text" name="cadCodigoTurma" placeholder="Digite o Código da Turma"
                               id="cadCodigoTurma" required="required"
                               class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnCadTurma">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de edicao de turma-->
<div class="modal fade" id="editTurma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de Turma</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditTurma" id="frmEditTurma">
                <div class="modal-body">
                    <input type="text" id="idEditTurma" name="idEditTurma">
                    <div class="">
                        <label for="editNumeroTurma" class="label-control">Número da Turma:</label>
                        <input type="text" name="editNumeroTurma" placeholder="Digite o Número da Sua Turma"
                               id="editNumeroTurma" required="required"
                               class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="editNomeTurma" class="label-control">Nome da Turma:</label>
                        <input type="text" name="editNomeTurma" placeholder="Digite Sua Turma" id="editNomeTurma"
                               required="required"
                               class="form-control">
                    </div>
                    <div class="mt-2">
                        <label for="editCodigoTurma" class="label-control">Código da Turma:</label>
                        <input type="text" name="editCodigoTurma" placeholder="Digite o Código da Turma"
                               id="editCodigoTurma" required="required"
                               class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditTurma">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de deletar Turma-->
<div class="modal fade" id="deleteTurma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Turma</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteTurma" id="frmDeleteTurma">
                <div class="modal-body">
                    <div>
                        <input type="text" id="idDeleteTurma" name="idDeleteTurma">
                    </div>
                    <div class="">
                        <p class="fs-3">Tem certeza que deseja deletar essa turma?</p>
                        <p><b>Realizar essa ação excluirá todos os registros dessa turma, não havendo possibilidade de
                                recuperação!</b></p>
                    </div>
                    <div>
                        <input type="checkbox" name="confimacaoDeleteCurso" id="confimacaoDeleteCurso"
                               required="required">
                        <label for="confimacaoDeleteCurso">Tenho Certeza!</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                            onclick="fecharModal('listarTurma')">Fechar
                    </button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteAdm">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL DE INVENTAÇÃO DE MODA -->

<div class="modal fade" id="ModalCooperval" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sobre a COOPERVAL</h1>
            </div>
            <div class="modal-body">
                <b >
                    A Cooperval, Cooperativa Agroindustrial Vale do Ivaí Ltda., com sede no município de Jandaia do Sul,
                    Estado do Paraná, foi constituída no dia 05 de julho de 1980, por iniciativa de um grupo de
                    agricultores, considerando-se as expectativas positivas do Proálcool “Programa Nacional de Álcool”. No
                    dia 04 de abril de 1981, houve o lançamento da pedra fundamental da Destilaria de Álcool, iniciando-se
                    então a construção dessa indústria. Ainda em 1981, iniciou-se o projeto de plantio de cana de açúcar,
                    com mais de 1.400 hectares, estabelecendo-se um plano gradativo de aumento da área plantada,
                    atingindo-se em 1997 a marca de mais de 10.000 hectares efetivamente plantados.
                </b>
            </div>
            <div class="modal-footer">
                <a href="dashboard.php">
                    <button type="button" class="btn btn-secondary" id="btnFechar" data-bs-dismiss="modal">Fechar
                    </button>
                </a>
                <button class="btn btn-primary" data-bs-target="#ModalImagem" data-bs-toggle="modal">Imagem</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL DE INVENTAÇÃO DE MODA -->

<!-- MODAL COM IMAGEM -->
<div class="modal fade" id="ModalImagem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Imagem</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="./coopervall.jpg" alt="Imagem da Fábrica...">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalCooperval" data-bs-dismiss="modal">Voltar Para a História</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL COM IMAGEM -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="./js/controle.js"></script>

</body>

</html>