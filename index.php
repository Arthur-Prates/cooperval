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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
</head>

<body>

<div class="container mt-5">

    <div id='calendar'></div>
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
            timeZone: 'America/Sao_Paulo',
            headerToolbar: { // aq é o button q q clica pra abrir os tipos de calendário
                left: 'prev,next',
                center: 'title',
                right: 'dayGridDay,dayGridWeek,dayGridMonth,multiMonthYear' //ordem dos botoes
            },
            editable: false, //se está ativado, eu posso mover os eventos de lugar sem precisar clicar pra editar
            selectable: true, //literalmente selecionar os itens
            buttonText: { //tradução das palavras padroes
                today: `Hoje`,
                month: 'Mês',
                week: 'Semana',
                day: 'Dia',
                year: 'Ano',
                list: 'Lista'
            },
            locale: 'pt-br',
            events: [ //aqui fica os eventos q aparece no calendário
                {
                    title: 'Meeting',
                    start: '2024-05-04T14:30:00',
                    extendedProps: {
                        status: 'done'
                    }
                },
                {
                    title: 'Birthday Party',
                    start: '2024-05-03T19:30:00',
                    end:'2024-05-04T19:30:00', //pode ter data final ou não,
                    backgroundColor: 'green',
                    borderColor: 'green'
                }

            ],
            dateClick: function(info) {
                console.log('Clicked on: ' + info.dateStr); //aqui ele te passa a data q vc clicou
                console.log('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY); //coodernadas do mouse
                console.log('Current view: ' + info.view.type); // tipo de calendário
                info.dayEl.style.backgroundColor = 'blue'; // consigo mudar a cor do item só de clicar
            },
        })
        calendar.render()
    })

</script>

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

