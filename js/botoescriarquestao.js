//adicionar e apagar iten de resposta
var controleCampo = 1;

function adicionarCampo(e) {
  controleCampo++;
  const questao = e.id;
  const tabela = document.getElementById(questao);

  const html = 
    `<div class="table" id="campo${questao}" data-questao="${questao}"> 
        <input type="radio" id="select${questao}" name="select"> 
        <textarea name="checkText" id="checkText${questao}" cols="30" rows="1" placeholder="Insira o texto"></textarea> 
        <span class="material-symbols-outlined" name="check" id="check${questao}">check</span>
        <span class="material-symbols-outlined" id="add${questao}" onclick="adicionarCampo(this.parentElement.parentElement)">add</span>
        <span class="material-symbols-outlined" id="${controleCampo}" onclick="removerCampo(${controleCampo})">delete</span>
    </div>`;

  tabela.insertAdjacentHTML("beforeend", html);
}

function removerCampo(idCampo) {
  document.getElementById("campo" + idCampo).remove();
  controleCampo = controleCampo - 1;
}

//adicionar e apagar questao completa
var controleQuestao = 1;

function adicionarQuestao() {
  controleQuestao++;
  const html = 
    `<div class="section" id="questao${controleQuestao}">
        <section class="divInfoForm"> 
            <input type="text" name="numQuest" id="numQuest${controleQuestao}" placeholder="${controleQuestao}">
            <input type="text" name="valorQuest" id="valorQuest${controleQuestao}" placeholder="Valor">
        </section>
        <section class="divCaixaTexto">
            <textarea id="caixaTexto${controleQuestao}" name="caixaTexto" cols="30" rows="20" placeholder="Insira o texto"></textarea>
        </section>
        <div id="table${controleQuestao}">
            <input type="radio" name="select" id="select${controleQuestao}">
            <textarea  id="checkText${controleQuestao}" name="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea>
            <span id="check${controleQuestao}" name="check" class="material-symbols-outlined">check</span>
            <span id="add${controleQuestao}" class="material-symbols-outlined" onclick="adicionarCampo(this.parentElement)">add</span>
        </div>
    </div>`;

  document.getElementById("section").insertAdjacentHTML("beforeend", html);
}

function removerQuestao(idQuestao) {
  document.getElementById("questao" + idQuestao).remove();
  controleQuestao = controleQuestao - 1;
}