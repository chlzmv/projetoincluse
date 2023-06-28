//adicionar e apagar iten de resposta

var controleCampo = 1;

function somarCampo(){

}
function adicionarCampo(e) {
    controleCampo++;   
    questao = e.id;
    var target = e.target || e.srcElement;
    var id = e.id
    const tabela = document.getElementById(id);  
    html = '<div class="table" id="campo' + questao + '" data-questao="' + questao + '"> <input type="radio" id="select" name="select"> <textarea name="checkText" id="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea> <span class="material-symbols-outlined" name="check" id="check">check</span> <span class="material-symbols-outlined" id="add' + questao + '" onclick="adicionarCampo(this.parentElement.parentElement)">add</span> <span class="material-symbols-outlined" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')">delete</span></div>'
    // html= '<div class="table" id="campo"' + questao + 'data-questao="' + questao + '"> <input type="radio" id="select" name="select" > <textarea  name="checkText" id="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea> <span  class="material-symbols-outlined" name="check" id="check" >check</span> <span class="material-symbols-outlined" id="add' + questao + '"  onclick="adicionarCampo(this.parentElement.parentElement)">add</span> <span class="material-symbols-outlined" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> delete </span></div>'
    tabela.insertAdjacentHTML('beforeend', html);
}

function removerCampo(idCampo){   
    console.log('campo' + idCampo);
    document.getElementById('campo' + idCampo).remove();
    controleCampo = controleCampo - 1;
}

//adicionar e apagar questao completa

var controleQuestao = 1;
function adicionarQuestao() {
    controleQuestao++;
    console.log(controleQuestao);
    document.getElementById('section').insertAdjacentHTML('beforeend', '<div class="section" id="questao' + controleQuestao + '">  <section class="divInfoForm"> <input type="text" name="numQuest" id="numQuest" placeholder="'+ controleQuestao +'" ><input type="text" name="valorQuest" id="valorQuest" placeholder="Valor"></section><section class="divCaixaTexto"><textarea id="caixaTexto" name="caixaTexto" cols="30" rows="20" placeholder="Insira o texto"></textarea></section><div id="table' + controleQuestao + '"><input type="radio" name="select" id="select"> <textarea  id="checkText" name="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea><span id="check" name="check" class="material-symbols-outlined">check</span><span id="add' + controleQuestao + '" class="material-symbols-outlined" onclick="adicionarCampo(this.parentElement)">add</span></div> </section>');
}

function removerQuestao(idQuestao){   
    console.log('questao'+ idQuestao);
    document.getElementById('questao' + idQuestao).remove();
    controleQuestao = controleQuestao - 1;
}

