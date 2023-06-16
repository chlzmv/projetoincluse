
// var controleCampo = 1;

// function adicionarCampo() {
//   controleCampo++;
//   console.log(controleCampo);
//   var tabela = document.getElementById('table');
//   tabela.insertAdjacentHTML(
//     'beforeend',
//     '<table id="campo' + controleCampo +
//       '"><tr><td><input type="checkbox" id="checkbox"></td><td><textarea id="checkText" placeholder="Insira o texto"></textarea></td><td><span id="check" class="material-symbols-outlined">check</span></td><td><span id="add2" class="material-symbols-outlined" onclick="adicionar()">add</span></td><td><span id="' +
//       controleCampo +
//       '" class="material-symbols-outlined" onclick="removerCampo(' +
//       controleCampo +
//       ')">delete</span></td></tr></table>'
//   );
// }

// function removerCampo(idCampo){
//     //console.log("Campo remover: " + idCampo);
//     document.getElementById('campo' + idCampo).remove();
// }

{/* <div id="table">
            
                
                                                                                                                                <input type="checkbox" id="checkbox1" placeholder="check1">
                                                                                                                                
                                                                                                                            
                                                                                                                                <textarea  id="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea>
                                                                                                                                
                                                                                                                                
                                                                                                                                <span  class="material-symbols-outlined" id="check" >check</span>
                                                                                                                                
                                                                                                                                
                                                                                                                                <span class="material-symbols-outlined" id="add2"  onclick="adicionarCampo()">add</span>
                                                                                                                                
                                                                                                                                
                                                                                                                                <span id="delete" class="material-symbols-outlined" onclick="removerCampo()">delete</span>
            
            
        
    </div> */}

var controleCampo = 1;
function adicionarCampo() {
    controleCampo++;
    //console.log(controleCampo);

    document.getElementById('table').insertAdjacentHTML('beforeend', '<div class="table" id="campo' + controleCampo + '"> <input type="checkbox" id="checkbox1" placeholder="check1"> <textarea  id="checkText" cols="30" rows="1" placeholder="Insira o texto"></textarea> <span  class="material-symbols-outlined" id="check" >check</span> <span class="material-symbols-outlined" id="add2"  onclick="adicionarCampo()">add</span> <span class="material-symbols-outlined" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> delete </span></div>');
}

function removerCampo(idCampo){
    //console.log("Campo remover: " + idCampo);
    document.getElementById('campo' + idCampo).remove();
}


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
