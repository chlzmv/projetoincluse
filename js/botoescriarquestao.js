//adicionar e apagar iten de resposta
var optionsControl = 0;

function adicionarCampo(e) {
  optionsControl++;
  const optionId = e.id;
  const questionId = e.parentElement.id;
  const question = document.getElementById(questionId);
  const secaoOpcoes = question.querySelector(`#${optionId}`);

  const html =
    `<div id="option${optionsControl}" class="option"> 
      <span id="check" class="btn-action material-symbols-outlined" onclick="checkOption(this.parentElement)">check</span>
      <input type="hidden" name="check[]" value="false">
      <textarea name="checkText[]" cols="30" rows="1" class="checkText" placeholder="Digite a opção de resposta."></textarea>
      <span class="btn-remove btn-action material-symbols-outlined" onclick="removerCampo(${optionsControl})">delete</span>
    </div>`;

  secaoOpcoes.insertAdjacentHTML("beforeend", html);
}

function removerCampo(idCampo) {
  document.getElementById("option" + idCampo).remove();
}

//adicionar e apagar questao completa
var questionsControl = 0;

function adicionarQuestao() {
  questionsControl++;
  optionsControl++;
  let hiddenBtn = removeControlActive == false ? "hiddenBtn" : "";
  const html =
    `<div id="question${questionsControl}" class="question">
      <div class="div-excluir ${hiddenBtn}">
        <p>Excluir essa Questão?</p>
        <input type="button" class="botaoExcluir" value="Sim" onclick="removerQuestao(question${questionsControl})" />
      </div>
      <section class="divInfoForm">                    
          <input type="text" name="numQuest[]" class="numQuest" placeholder="N° Questão" />
          <input type="text" name="valorQuest[]" class="valorQuest" placeholder="Valor" />
      </section>
      <section class="divCaixaTexto">
          <textarea class="caixaTexto" name="caixaTexto[]" cols="30" rows="10" placeholder="Digite a pergunta."></textarea>
      </section>
      <section id="sectionOptions" class="sectionOptions">
          <div id="option${optionsControl}" class="option">
            <span id="check" class="btn-action material-symbols-outlined" onclick="checkOption(this.parentElement)">check</span>
            <input type="hidden" name="check[]" value="false">
            <textarea id="checkText" name="checkText[]" cols="30" rows="1" class="checkText" placeholder="Digite a opção de resposta."></textarea>
            <span id="add" class="btn-add btn-action material-symbols-outlined" onclick="adicionarCampo(this.parentElement.parentElement)">add</span>
          </div>
      </section>
      <hr>
    </div>`;

  document.getElementById("sectionQuestions").insertAdjacentHTML("beforeend", html);
  window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
}

var removeControlActive = false;

function ativarRemoverQuestao() {
  let btnExcluir = document.querySelectorAll('.div-excluir');
  if (removeControlActive) {
    btnExcluir.forEach(x => x.classList.add("hiddenBtn"));
  } else {
    btnExcluir.forEach(x => x.classList.remove("hiddenBtn"));
  }
  removeControlActive = !removeControlActive;
}

function removerQuestao(idQuestao) {
  document.getElementById(idQuestao.id).remove();
  if (document.getElementById("sectionQuestions").children.length == 0) removeControlActive = false;
}

function checkOption(e) {
  const optionId = e.id;
  const questionId = e.parentElement.parentElement.id;
  const question = document.getElementById(questionId);
  let secaoOpcoes = question.querySelector(`#${optionId}`);
  if (secaoOpcoes.querySelector(`#check`).classList.contains("check")) {
    secaoOpcoes.querySelector(`#check`).classList.remove("check");
    secaoOpcoes.querySelector('input[name="check[]"]').value = false;
  } else {
    secaoOpcoes.querySelector(`#check`).classList.add("check");
    secaoOpcoes.querySelector('input[name="check[]"]').value = true;
  }
}