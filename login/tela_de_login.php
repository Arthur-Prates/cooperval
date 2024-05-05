<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcao.php");

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="./css/script.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          &gt;>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
          rel="stylesheet">
</head>
<body>

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
        <div class="alert erroBonito p-1 text-center text-white" role="alert" id="alertlog" style="display: none;">
        </div>
        <button style="background: transparent; border: transparent;" class="hoverrr" onclick="fazerLogin();" type="button">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="./js/func.js"></script>
</body>
</html>

