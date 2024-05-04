<div class="container mt-5">
    <div class="d-flex justify-content-end">

        <button class="btn botaoAddEvento" data-bs-toggle="modal"
                onclick="abrirModalJsAddEvento('cadastrarEvento','A','btnAddEvento', 'addEvento', 'frmAddEvento')">
            Cadastrar
            Evento
        </button>
    </div>
    <div id='calendar'></div>
</div>

<!-- Modal Add Evento-->
<div class="modal fade" id="cadastrarEvento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1E2B37;color: white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Evento</h1>
                <button type="button" class="btn-close text-light" onclick="window.location.reload()" aria-label="Close"
                        style="color: white !important; background-color: #2c3e50"></button>
            </div>
            <form method="post" name="frmAddEvento" id="frmAddEvento">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="titulo">Título</span>
                        <input type="text" class="form-control" placeholder="Título" aria-label="Título" id="titulo"
                               name="titulo">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="dataIn">Data e Hora Inicial</span>
                        <input type="datetime-local" class="form-control" placeholder="dataIn" aria-label="dataIn"
                               id="dataIn" name="dataIn" value="<?php echo DATATIMEATUAL ?>" required="required">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="dataEnd">Data e Hora Final</span>
                        <input type="datetime-local" class="form-control" placeholder="dataEnd" aria-label="dataEnd"
                               id="dataEnd" name="dataEnd" value="<?php echo DATATIMEATUAL ?>">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnAddEvento">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Add Evento-->
<div class="modal fade" id="editarEvento17" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1E2B37;color: white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Evento</h1>
                <button type="button" class="btn-close text-light" onclick="window.location.reload()" aria-label="Close"
                        style="color: white !important; background-color: #2c3e50"></button>
            </div>
            <form method="post" name="frmEditEvento" id="frmAddEvento">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="titulo">Editar</span>
                        <input type="text" class="form-control" placeholder="Título" aria-label="Título" id="titulo"
                               name="titulo">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="dataIn">Data e Hora Inicial</span>
                        <input type="datetime-local" class="form-control" placeholder="dataIn" aria-label="dataIn"
                               id="dataIn" name="dataIn" value="" required="required">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="dataEnd">Data e Hora Final</span>
                        <input type="datetime-local" class="form-control" placeholder="dataEnd" aria-label="dataEnd"
                               id="dataEnd" name="dataEnd" value="">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditEvento">Salvar</button>
                </div>
            </form>
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
                left: 'prev,next',
                center: 'title',
                right: 'timeGridDay,dayGridWeek,dayGridMonth,multiMonthYear' //ordem dos botoes
            },
            editable: false, //se está ativado, eu posso mover os eventos de lugar sem precisar clicar pra editar
            selectable: true, //literalmente selecionar os itens
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
                  url:'index.php?editarItem=$id' 
                },";
                }

                ?>


            ],
            dateClick: function (info) {
                console.log('Clicked on: ' + info.dateStr); //aqui ele te passa a data q vc clicou
                console.log('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY); //coodernadas do mouse
                console.log('Current view: ' + info.view.type); // tipo de calendário
                info.dayEl.style.backgroundColor = 'blue'; // consigo mudar a cor do item só de clicar
            },
        })
        calendar.render()
    })

</script>

<script src="./js/controle.js"></script>