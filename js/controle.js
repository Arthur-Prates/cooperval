function carregarConteudo(controle) {
    fetch('controle.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {

            document.getElementById('show').innerHTML = data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}

$('.cpf').mask('000.000.000-00');

var options = {
    onKeyPress: function (tell, e, field, options) {
        var masks = ['(00) 0 0000-0000', '(00) 0000-0000'];
        var mask = (tell.length < 15) ? masks[1] : masks[0];
        $('.telefoneBR').mask(mask, options);
    }
};
$('.telefoneBR').mask('(00) 0 0000-0000', options);


function redireciona(page) {
    window.location.href = page
}

function fecharModal(page) {
    carregarConteudo(`${page}`)
}


function ativarDesativar(pagina, id, recarregar) {
    fetch(`${pagina}`, {
        body: 'id=' + encodeURIComponent(id), headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, method: 'POST',
    })
        .then(response => response.json())
        .then(data => {
            alertSuccess(data.message, '#65B307')
            carregarConteudo(`${recarregar}`)
            // console.log(data)
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}


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
    delay: function (el, i, l) {
        return i * 100;
    },
    endDelay: function (el, i, l) {
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
    } else {
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
                mostrarProcessando();
                setTimeout(function () {
                    window.location.href = "dashboard.php";
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
            // esconderProcessando();
        })
        .catch((error) => {
            console.error("Erro na requisição", error);
        });
}

// FUNCAO DE LOADING
function mostrarProcessando() {
    var divFundoEscuro = document.createElement('div');
    divFundoEscuro.id = 'fundoEscuro';
    divFundoEscuro.style.position = 'fixed';
    divFundoEscuro.style.top = '0';
    divFundoEscuro.style.left = '0';
    divFundoEscuro.style.width = '100%';
    divFundoEscuro.style.height = '100%';
    divFundoEscuro.style.backgroundColor = 'rgba(0,0,0,0.7)';
    document.body.appendChild(divFundoEscuro);

    var divProcessando = document.createElement("div");
    divProcessando.id = "processandoDiv";
    divProcessando.style.position = "fixed";
    divProcessando.style.top = "50%";
    divProcessando.style.left = "50%";
    divProcessando.style.transform = "translate(-50%, -50%)";
    divProcessando.innerHTML = '<img src="./img/loadin.gif" width="100px" alt="Processando..." title="Processando...">';
    document.body.appendChild(divProcessando);
}

// FUNCAO DE ESCONDER O LOADING
function esconderProcessando() {
    var divProcessando = document.getElementById("processandoDiv");
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}


function abrirModalJsAddEvento(id, idIP, titulo, tituloIP, dataIN, dataINIP, dataEND, dataENDIP, comentario, comentarioIP, turma, turmaIP, curso, cursoIP, cor, corIP, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show()
        let idIp = document.getElementById(`${idIP}`);
        if (id !== 'nao') {
            idIp.value = id
        }
        let ip = document.getElementById(`${tituloIP}`);
        if (titulo !== 'nao') {
            ip.value = titulo
        }
        let ip1 = document.getElementById(`${dataINIP}`)
        if (dataIN !== 'nao') {
            ip1.value = dataIN
        }
        let ip2 = document.getElementById(`${dataENDIP}`)
        if (dataEND !== 'nao') {
            ip2.value = dataEND
        }
        let ip3 = document.getElementById(`${comentarioIP}`)
        if (comentario !== 'nao') {
            ip3.value = comentario
        }
        let ip4 = document.getElementById(`${turmaIP}`)
        if (turma !== 'nao') {
            ip4.value = turma
        }
        let ip5 = document.getElementById(`${cursoIP}`)
        if (curso !== 'nao') {
            ip5.value = curso
        }
        let ip6 = document.getElementById(`${corIP}`)
        if (cor !== 'nao') {
            if (cor === 'blue') {
                cor = 'Azul'
            } else if (cor === 'gray') {
                cor = 'Cinza'
            } else if (cor === 'green') {
                cor = 'Verde'
            } else if (cor === 'red') {
                cor = 'Vermelho'
            } else if (cor === 'purple') {
                cor = 'Roxo'
            } else {
                cor = 'Preto'
            }
            ip6.value = cor
        }
        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        alertSuccess(data.message, 'green')
                        carregarConteudo('listarCalendario')

                        document.getElementById(`${formulario}`).reset()
                    }
                    ModalInstacia.hide();
                })
                .catch(error => {

                    botoes.disabled = false;
                    ModalInstacia.hide();
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        ModalInstacia.hide();
    }

}

function abrirModalJsCurso(idId, inId, idNome, inNome, idLocal, inLocal, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputid = document.getElementById(`${inId}`);
        if (inId !== 'nao') {
            inputid.value = idId;
        }
        const nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            nome.value = idNome;
        }
        const local = document.getElementById(`${inLocal}`);
        if (inLocal !== 'nao') {
            local.value = idLocal;
        }

        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)

                    if (data.success) {
                        carregarConteudo('listarCurso')
                        setTimeout(function myFunction() {
                            if (`${addEditDel}` === 'addCurso' || `${addEditDel}` === 'deleteCurso') {
                                alertSuccess(data.message, '#65B307')
                                botoes.disabled = false;
                                document.getElementById(`${formulario}`).reset()
                            } else if (`${addEditDel}` === 'editCurso') {
                                alertSuccess(data.message, '#2b58de')
                            }
                        }, 1000)

                    } else {
                        alertError(data.message)
                    }
                    ModalInstacia.hide();
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);

    } else {
        ModalInstacia.hide();
    }

}

function abrirModalJsAluno(idId, inId, idNome, inNome, idSobrenome, inSobrenome, idTurma, inTurma, idEmail, inEmail, idCelular, inCelular, idCpf, inCpf, idData, inData, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputid = document.getElementById(`${inId}`);
        if (inId !== 'nao') {
            inputid.value = idId;
        }
        const nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            nome.value = idNome;
        }
        const sobrenome = document.getElementById(`${inSobrenome}`);
        if (inSobrenome !== 'nao') {
            sobrenome.value = idSobrenome;
        }
        const turma = document.getElementById(`${inTurma}`);
        if (inTurma !== 'nao') {
            turma.value = idTurma;
        }
        const email = document.getElementById(`${inEmail}`);
        if (inEmail !== 'nao') {
            email.value = idEmail;
        }
        const celular = document.getElementById(`${inCelular}`);
        if (inCelular !== 'nao') {
            celular.value = idCelular;
        }
        const cpf = document.getElementById(`${inCpf}`);
        if (inCpf !== 'nao') {
            cpf.value = idCpf;
        }
        const data = document.getElementById(`${inData}`);
        if (inData !== 'nao') {
            data.value = idData;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    // console.log(data)
                    if (data.success) {
                        carregarConteudo('listarAluno')
                        if (`${addEditDel}` === 'addAluno' || `${addEditDel}` === 'deleteAluno') {
                            alertSuccess(data.message, '#65B307')
                            botoes.disabled = false;
                            document.getElementById(`${formulario}`).reset()
                        } else if (`${addEditDel}` === 'editAluno') {
                            alertSuccess(data.message, '#2b58de')
                        }

                    } else {
                        alertError(data.message)
                    }
                    ModalInstacia.hide();
                })
                .catch(error => {

                    botoes.disabled = false;
                    ModalInstacia.hide();
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);

    } else {
        ModalInstacia.hide();
    }

}


function abrirModalJsAdm(idId, inId, idNome, inNome, idSobrenome, inSobrenome, idEmail, inEmail, idCelular, inCelular, idCpf, inCpf, idData, inData, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputid = document.getElementById(`${inId}`);
        if (inId !== 'nao') {
            inputid.value = idId;
        }
        const nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            nome.value = idNome;
        }
        const sobrenome = document.getElementById(`${inSobrenome}`);
        if (inSobrenome !== 'nao') {
            sobrenome.value = idSobrenome;
        }
        const email = document.getElementById(`${inEmail}`);
        if (inEmail !== 'nao') {
            email.value = idEmail;
        }
        const celular = document.getElementById(`${inCelular}`);
        if (inCelular !== 'nao') {
            celular.value = idCelular;
        }
        const cpf = document.getElementById(`${inCpf}`);
        if (inCpf !== 'nao') {
            cpf.value = idCpf;
        }
        const data = document.getElementById(`${inData}`);
        if (inData !== 'nao') {
            data.value = idData;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        carregarConteudo('listarAdm')
                        if (`${addEditDel}` === 'addAdm' || `${addEditDel}` === 'deleteAdm') {
                            alertSuccess(data.message, '#65B307')
                            botoes.disabled = false;
                            document.getElementById(`${formulario}`).reset()
                        } else if (`${addEditDel}` === 'editAdm') {
                            alertSuccess(data.message, '#2b58de')
                            botoes.disabled = false;
                            document.getElementById(`${formulario}`).reset()

                        }
                    } else {
                        alertError(data.message)
                    }
                    ModalInstacia.hide();
                })
            // .catch(error => {
            //
            //     botoes.disabled = false;
            //     ModalInstacia.hide();
            //     console.error('Erro na requisição:', error);
            // });


        }
        formDados.addEventListener('submit', submitHandler);

    } else {
        ModalInstacia.hide();
    }

}


function abrirModalJsTurma(idId, inId, idNumero, inNumero, idNome, inNome, idCodigo, inCodigo, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {

    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputid = document.getElementById(`${inId}`);
        if (inId !== 'nao') {
            inputid.value = idId;
        }
        const nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            nome.value = idNome;
        }
        const numero = document.getElementById(`${inNumero}`);
        if (inNumero !== 'nao') {
            numero.value = idNumero;
        }
        const codigo = document.getElementById(`${inCodigo}`);
        if (inCodigo !== 'nao') {
            codigo.value = idCodigo;
        }

        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        carregarConteudo('listarTurma')
                        if (`${addEditDel}` === 'addTurma' || `${addEditDel}` === 'deleteTurma') {
                            alertSuccess(data.message, '#65B307')
                            document.getElementById(`${formulario}`).reset()
                        } else if (`${addEditDel}` === 'editTurma') {
                            alertSuccess(data.message, '#2b58de')
                        }
                        botoes.disabled = false;
                    } else {
                        alertError(data.message)
                    }
                    ModalInstacia.hide();
                })
                .catch(error => {

                    botoes.disabled = false;
                    ModalInstacia.hide();
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);

    } else {
        ModalInstacia.hide();
    }

}

function deleteGeral(addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    const submitHandler = function (event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);

        formData.append('controle', `${addEditDel}`)

        fetch('controle.php', {
            method: 'POST', body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.success) {
                    alertSuccess(data.message, 'green')
                    carregarConteudo('listarCalendario')

                    document.getElementById(`${formulario}`).reset()
                }
            })
            .catch(error => {
                console.error('Erro na requisição:', error);
            });

    }
    formDados.addEventListener('submit', submitHandler);

}

var colors = new Array(
    [0, 0, 0],
    [24, 127, 0],
    [24, 127, 0],
    [0, 0, 0],
    [0, 0, 0],
    [24, 127, 0]);

var step = 0;
//color table indices for:
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0, 1, 2, 3];

//transition speed
var gradientSpeed = 0.003;

function updateGradient() {

    if ($ === undefined) return;

    var c0_0 = colors[colorIndices[0]];
    var c0_1 = colors[colorIndices[1]];
    var c1_0 = colors[colorIndices[2]];
    var c1_1 = colors[colorIndices[3]];

    var istep = 1 - step;
    var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
    var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
    var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
    var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

    var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
    var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
    var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
    var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

    $('#gradient').css({
        background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
    }).css({
        background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
    });

    step += gradientSpeed;
    if (step >= 1) {
        step %= 1;
        colorIndices[0] = colorIndices[1];
        colorIndices[2] = colorIndices[3];

        //pick two new target color indices
        //do not pick the same as the current one
        colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
        colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

    }
}

setInterval(updateGradient, 10);


function addOuEditSucesso(UserAlter, icon, addOuEditOuDelete) {
    let timerInterval;
    Swal.fire({
        title: `${UserAlter} ${addOuEditOuDelete} com sucesso! <br> Atualizando Dados.`,
        html: "Fechando em <b></b> ms.",
        timer: 1500,
        icon: `${icon}`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {

                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("fechando..");
        }
    });
}


function addErro() {
    let timerInterval;
    Swal.fire({
        title: "Erro ao Manipular <br> Tente Novamente.",
        html: "Fechando em <b></b> ms.",
        timer: 1500,
        icon: "error",
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {

                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("fechando..");
        }
    });
};

function alertSuccess(msg, cor) {

    Toastify({
        text: `${msg}`,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: `${cor}`,
            color: 'white',
        },
    }).showToast();

}

function alertError(msg) {
    Toastify({
        text: `${msg}`,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#F40000",
            color: 'white',
        },
    }).showToast();

}
