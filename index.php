<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

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

<body class="bodyLogin">

<div class="login-box">
    <h2 class="fontee">LOGIN <span class="mdi mdi-login"></span></h2>
    <form method="post" name="frmLogin" id="frmLogin">
        <div class="user-box">
            <input type="email" name="email" id="email" autocomplete="off" required="required">
            <label>Email <span class="mdi mdi-email"></span></label>
        </div>
        <br>
        <div class="row">
            <div class="col-11">
                <div class="user-box">
                    <input type="password" name="senha" id="senha" autocomplete="off" required="required">
                    <label>Senha <span class="mdi mdi-key"></span></label>
                </div>
            </div>
            <div class="col-1">
                <button id="iconeOlho" type="button"
                        style="background: transparent; border: transparent; box-shadow: transparent"
                        class="mdi mdi-eye sem_hover" onclick="mostrarsenha();"></button>
            </div>
        </div>
        <div class="erroBonito p-1 text-center" role="alert" id="alertlog" style="display: none;">
        </div>
        <button style="background: transparent; border: transparent;" class="hoverrr" onclick="fazerLogin();"
                type="button">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            LOGIN
        </button>
    </form>
    <br>
    <div class="text-center text-white">
        <?php
        date_default_timezone_set('America/Sao_Paulo');
        echo date('H:i:s');
        ?>
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

