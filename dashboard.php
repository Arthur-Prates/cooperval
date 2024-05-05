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
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg verdeCoop" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
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
            <div class="mt-3 mb-2 pointerCursor" onclick="carregarConteudo('listarCalendario')">Calendário</div>
            <div class="mt-3 mb-2 pointerCursor" onclick="carregarConteudo('listarAluno')">Alunos</div>
            <div class="mt-3 mb-2 pointerCursor" onclick="carregarConteudo('listarCurso')">Cursos</div>
            <div class="mt-3 mb-2 pointerCursor" onclick="carregarConteudo('listarTurma')">Turmas</div>
            <div class="mt-3 mb-2 pointerCursor" onclick="carregarConteudo('listarAdm')">Administradores</div>

        </div>
        <div class="col-lg-10 mt-3">
            <div id="show"></div>
        </div>
    </div>
</div>


<!--Modal de cadastro de alunos-->
<div class="modal fade" id="cadAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmCadAluno" id="frmCadAluno">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="cadNomeAluno" class="label-control">Nome:</label>
                                    <input type="text" name="cadNomeAluno" id="cadNomeAluno" class="form-control"
                                           required="required">
                                </div>
                                <div class="col-6">
                                    <label for="cadSobrenomeAluno" class="label-control">Sobrenome:</label>
                                    <input type="text" name="cadSobrenomeAluno" id="cadSobrenomeAluno"
                                           class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <label for="cadEmailAluno" class="label-control">Email:</label>
                            <input type="text" name="cadEmailAluno" id="cadEmailAluno" class="form-control"
                                   required="required">
                        </div>
                        <div class="col-4">
                            <label for="cadCelularAluno" class="label-control">Celular:</label>
                            <input type="text" name="cadCelularAluno" id="cadCelularAluno" class="form-control"
                                   required="required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="cadCpfAluno" class="label-control">Cpf:</label>
                            <input type="text" name="cadCpfAluno" id="cadCpfAluno" class="form-control"
                                   required="required">
                        </div>
                        <div class="col-6">
                            <label for="cadNascimentoAluno" class="label-control">Data de nascimento:</label>
                            <input type="date" name="cadNascimentoAluno" id="cadNascimentoAluno" class="form-control"
                                   required="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnCadAluno">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de edicao de alunos-->
<div class="modal fade" id="editAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de aluno</h1>
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
                    <div class="row">
                        <div class="col-8">
                            <label for="editEmailAluno" class="label-control">Email:</label>
                            <input type="text" name="editEmailAluno" id="editEmailAluno" class="form-control"
                                   required="required">
                        </div>
                        <div class="col-4">
                            <label for="editCelularAluno" class="label-control">Celular:</label>
                            <input type="text" name="editCelularAluno" id="editCelularAluno" class="form-control"
                                   required="required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="editCpfAluno" class="label-control">Cpf:</label>
                            <input type="text" name="editCpfAluno" id="editCpfAluno" class="form-control"
                                   required="required">
                        </div>
                        <div class="col-6">
                            <label for="editNascimentoAluno" class="label-control">Data de nascimento:</label>
                            <input type="date" name="editNascimentoAluno" id="editNascimentoAluno" class="form-control"
                                   required="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnEditAluno">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de deletar aluno-->
<div class="modal fade" id="deleteAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditAluno" id="frmEditAluno">
                <div class="modal-body">
                    <div>
                        <input type="text" id="idDeleteAluno" name="idDeleteAluno">
                    </div>
                    <div class="">
                        <p>Tem certeza que deseja deletar esse aluno?</p>
                        <p>Realizar essa ação excluirá todos os registros desse aluno, não havendo possiblidade de recuperção!</p>
                    </div>
                    <div>
                        <input type="checkbox" name="confimacaoDelete" id="confimacaoDelete" required="required">
                        <label for="confimacaoDelete">Tenho certeza!</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger" id="btnDeleteAluno">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


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
<script src="./js/controle.js"></script>

</body>

</html>