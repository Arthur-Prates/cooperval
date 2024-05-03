function carregarConteudo(controle){
    fetch('controle.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {

            document.getElementById('show').innerHTML= data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}

// $('.cpf').mask('000.000.000-00');
//
// var options = {
//     onKeyPress: function (tell, e, field, options) {
//         var masks = ['(00) 0 0000-0000', '(00) 0000-0000'];
//         var mask = (tell.length < 15) ? masks[1] : masks[0];
//         $('.telefoneBR').mask(mask, options);
//     }
// };
// $('.telefoneBR').mask('(00) 0 0000-0000', options);
//
//
