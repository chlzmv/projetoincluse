document.getElementById("btn-salvar").addEventListener("click", function (e) {
  const titulo = document.getElementById("tituloForm").value;
  const idUser = document.getElementById("idUser").value;
  const valorTotal = document.getElementById("valorTotQuestn").value;
  const questions = Array.from(document.getElementById("sectionQuestions").children);

  if (questions.length <= 0) {
    activeModal("Deve ter ao menos uma questão!");
    stopPost(e);
  } else if (titulo.length <= 3) {
    activeModal("Título é obrigatório e deve ter ao menos 3 caracteres!");
    stopPost(e);
  } else if (valorTotal.length <= 0) {
    activeModal("Valor total é obrigatório!");
    stopPost(e);
  } else {
    let questionsReturn = [];
    questions.forEach(x => {
      const info = Array.from(x.querySelector('#infoForm').children);
      const texto = Array.from(x.querySelector('#caixaTexto').children);
      const numQuest = info[0].value;
      const valorQuest = info[1].value;
      const caixaTexto = texto[0].value;
      const opcoesMount = separarOpcoes(x);
      questionsReturn.push({
        numQuest: numQuest,
        valorQuest: valorQuest,
        caixaTexto: caixaTexto,
        opcoesResposta: opcoesMount
      })
    });

    let questionsFail = [];
    questionsReturn.forEach(x => {
      if (x.opcoesResposta.filter(d => d.check == 'true').length <= 0) {
        questionsFail.push({ option: x });
      }
      if (x.opcoesResposta.filter(d => d.checkText.length <= 1).length >= 1) {
        questionsFail.push({ option: x });
      }
      if (x.caixaTexto.length <= 3 || x.numQuest.length <= 0 || x.valorQuest.length <= 0){
        questionsFail.push({ option: x });
      }
    });

    if (questionsFail.length > 0) {
      //const msg = "Todas as questões devem ter ao menos uma resposta correta.";
      const msg = `A questão número: ${questionsFail[0].option.numQuest} possui parametros incorretos.`;
      activeModal(msg);
      stopPost(e);
    } else {
      const form = {
        idUser: idUser,
        tituloForm: titulo,
        valorTotQuestn: valorTotal,
        questions: questionsReturn
      }
      postData(form)
    }
  };
});

async function postData(form) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../php/acaocriarperguntas.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      alert(xhr.responseText);
    }
  };
  xhr.send(JSON.stringify(form));
}

function separarOpcoes(e) {
  const opcoes = Array.from(e.querySelector('#sectionOptions').children);
  let opcaoReturn = [];
  opcoes.forEach(x => {
    opcaoReturn.push(analisarOpcao(x));
  });
  return opcaoReturn;
}

function analisarOpcao(opcao) {
  const check = opcao.children[1].value;
  const checkText = opcao.children[2].value;
  return { check, checkText };
}

function stopPost(e) {
  e.preventDefault();
  e.stopPropagation();
  e.stopImmediatePropagation();
  return false;
}

function validNumbers(e) {
  return e.charCode === 0 || ((e.charCode >= 48 && e.charCode <= 57) || (e.charCode == 46 && e.currentTarget.value.indexOf('.') < 0));
}

function activeModal(msg) {
  const node = document.createElement("p");
  const textnode = document.createTextNode(msg);
  node.appendChild(textnode);
  document.getElementById("modal-body").appendChild(node);
  modal.style.display = "block";
}

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
      <section id="infoForm" class="divInfoForm">                    
          <input type="text" name="numQuest[]" class="numQuest" placeholder="N° Questão" />
          <input type="text" name="valorQuest[]" class="valorQuest" placeholder="Valor" />
      </section>
      <section id="caixaTexto" class="divCaixaTexto">
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

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}