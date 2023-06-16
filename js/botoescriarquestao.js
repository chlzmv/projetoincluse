//    //nome classe / entidade 
//   class Questao{
//       constructor(){
//         this.id =[];
//           this.arrayQuestao = [];
//       }
//        //nome do metodo
//       apagar(){
//           alert('Está apagando um questionário')
//       }

//       adicionar(questao){
//           this.arrayQuestao.push(questao);
       
       
//           console.log(this.arrayQuestao);
//           this.listaTabela(); 

//       }

//       listaTabela(){
//           let table = document.getElementById('table');

//           for (let i = 0; i < this.arrayQuestao.length; i++){
//               let tr = table.insertRow();

//               let td_selecionar = tr.insertCell();
//               let td_texto = tr.insertCell();
//               let td_apagar = tr.insertCell();
//               let td_indCerto = tr.insertCell();
//               let td_adicionar = tr.insertCell();
//                 imgCheck.src = 'png/add.png';
//               td_adicionar.appendchild(imgAdd);
              
//               let imgDelete = document.createElement('img');
//               imgDelete.src = 'png/trash.png';
//               td_apagar.appendchild(imgDelete);
              
              
//               imgDelete.setAttribute("onclick", "questao.apagar()");

//               let imgCheck = document.createElement('img');
//               imgCheck.src = 'png/tick.png';
//               td_indCerto.appendchild(imgCheck);
            
//               let imgAdd = document.createElement('img');



//           }
        
//       }
//   }
//   var questao = new Questao()

//  //test tes test     

var controleCampo = 1;
function adicionar(){
    controleCampo++;
    console.log(controleCampo);
    // alert('teste')
    document.getElementById('table').insertAdjacentHTML('beforeend', '<table id="campo ' + controleCampo + '" ><tr> <td> <input type="checkbox" id="checkbox"> </td> <td><textarea id="checkText" placeholder="Insira o texto"> </textarea></td> <td><span id="delete" class="material-symbols-outlined" onclick="apagar()">delete</span> </td> <td><span id="check" class="material-symbols-outlined">check</span></td> <td><span id="add2" class="material-symbols-outlined" onclick="adicionar()">add</span></td></tr></table>')
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
