var design = anime({
    targets: 'svg #XMLID5',
    keyframes: [
        {translateX: -500},
        {rotateY: 180},
        {translateX: 920},
        {rotateY: 0},
        {translateX: -500},
        {rotateY: 180},
        {translateX: -500}
    ],
    easing: 'easeInOutSine',
    duration: 60000
});

function anime(param) {
    
}

anime({
    targets: '#dust-particle path',
    translateY: [10, -150],
    direction: 'alternate',
    loop: true,
    delay: function(el, i, l) {
        return i * 100;
    },
    endDelay: function(el, i, l) {
        return (l - i) * 100;
    }
});


function mostrarsenha() {
    var inputPass = document.getElementById('senha');
    var iconeOlho = document.getElementById('iconeOlho');


    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        iconeOlho.classList.remove('mdi-eye');
        iconeOlho.classList.add('mdi-eye-off');
    }
    else {
        inputPass.setAttribute('type', 'password');
        iconeOlho.classList.remove('mdi-eye-off');
        iconeOlho.classList.add('mdi-eye');

    }
}

function fazerLogin() {
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    var alertlog = document.getElementById("alertlog");

    if (email === "") {
        alertlog.style.display = "block";
        alertlog.innerHTML =
            "Email não digitado.";
        return;
    } else if (senha === "") {
        alertlog.style.display = "block";
        alertlog.innerHTML =
            "Senha não digitada.";
        return;
    } else if (senha.length < 8) {
        alertlog.style.display = "block";
        alertlog.innerHTML = "A senha precisa ter 8 dígitos";
        return;
    } else {
        alertlog.style.display = "none";
    }
    mostrarProcessando();
    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
            "email=" +
            encodeURIComponent(email) +
            "&senha=" +
            encodeURIComponent(senha),

    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                setTimeout(function () {
                    // window.location.href = "adm.php";
                }, 2000);
                // alert(data.message);
                alertlog.classList.remove("erroBonito");
                alertlog.classList.add("acertoBonito");
                alertlog.innerHTML = data.message;
                alertlog.style.display = "block";
            } else {
                alertlog.style.display = "block";
                alertlog.innerHTML = data.message;
            }
            esconderProcessando();
        })
        .catch((error) => {
            console.error("Erro na requisição", error);
        });
}
// FUNCAO DE LOADING
function mostrarProcessando() {
    var divProcessando = document.createElement("div");
    divProcessando.id = "processandoDiv";
    divProcessando.style.position = "fixed";
    divProcessando.style.top = "10%";
    divProcessando.style.left = "50%";
    divProcessando.style.transform = "translate(-50%, -50%)";
    divProcessando.innerHTML =
        '<img src="../img/loadin.gif" width="" alt="Processando..." title="Processando...">';
    document.body.appendChild(divProcessando);
}
// FUNCAO DE ESCONDER O LOADING
function esconderProcessando() {
    var divProcessando = document.getElementById("processandoDiv");
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}



