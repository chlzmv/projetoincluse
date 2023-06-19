
//adicionar e apagar iten de resposta

var controleCampo = 1;
function adicionarCampo() {
    controleCampo++;   
    console.log(controleCampo);
    document.getElementById('table').insertAdjacentHTML('beforeend', '<div class="table" id="campo' + controleCampo + '"> <input type="checkbox" id="checkbox1" placeholder="check1"> <textarea  id="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea> <span  class="material-symbols-outlined" id="check" >check</span> <span class="material-symbols-outlined" id="add2"  onclick="adicionarCampo()">add</span> <span class="material-symbols-outlined" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> delete </span></div>');
}

function removerCampo(idCampo){   
    console.log(idCampo);
    document.getElementById('campo' + idCampo).remove();
    controleCampo = controleCampo - 1;
}

//adicionar e apagar questao completa

var controleQuestao = 1;
function adicionarQuestao() {
    controleQuestao++;
    console.log(controleQuestao);
    document.getElementById('section').insertAdjacentHTML('afterend', '<div class="section" id="questao' + controleQuestao + '"> <input type="text" id="numQuest" placeholder="N° Questão" ><div class="inputSV"><select id="formSelect"><option selected disabled>Tipo da Questão:</option><option value="1">Resposta Única</option><option value="2">Múltipla Escolha</option></select><input type="text" id="valorQuest" placeholder="Valor"></div></section><section class="divCaixaTexto"><textarea id="caixaTexto" cols="30" rows="20" placeholder="Insira o texto"></textarea></section><div id="table"><input type="checkbox" id="checkbox1" placeholder="check1"> <textarea  id="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea><span id="check" class="material-symbols-outlined">check</span><span id="add2" class="material-symbols-outlined" onclick="adicionarCampo()">add</span></div> </section>');
}

function removerQuestao(idQuestao){   
    console.log(idQuestao);
    document.getElementById('questao' + idQuestao).remove();
    controleCampo = controleQuestao - 1;
}



// if(controleQuestao<2){
//     funcçao dditemderesposta
//     controcamo ++

// }
// elif(controleQuestao>1){

// }

// <!DOCTYPE html>
// <html>
// <body>

// <h1>The Document Object</h1>
// <h2>The getElementsByClassName() Method</h2>

// <p>Change the text of the first element with class="example":</p>

// <div class="example">Element1</div>
// <div class="example">Element2</div>
// <div class="example">Element3</div>

// <script>
// const collection = document.getElementsByClassName("example").length;
// console.log(collection);

// if(collection > 6){
// 	console.log('Nao pode inserir mais item')
// }else{
//  //pode criar novo item
// }

// </script>

// </body>
// </html>
