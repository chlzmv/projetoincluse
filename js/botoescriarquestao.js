// // nome classe / entidade 
// class Questao{
//     constructor(){
//         this.arrayQuestao = [];
//     }
//     // nome do metodo
//     apagar(){
//         alert('Está apagando um questionário')
//     }

//     adicionar(questao){
//         this.arrayQuestao.push(questao);
       
       
//         console.log(this.arrayQuestao);
//         this.listaTabela(); 

//     }

//     listaTabela(){
//         let table = document.getElementById('table');

//         for (let i = 0; i < this.arrayQuestao.length; i++){
//             let tr = table.insertRow();

//             let td_selecionar = tr.insertCell();
//             let td_texto = tr.insertCell();
//             let td_apagar = tr.insertCell();
//             let td_indCerto = tr.insertCell();
//             let td_adicionar = tr.insertCell();
            
//             let imgDelete = document.createElement('img');
//             imgDelete.src = 'png/trash.png';
//             td_apagar.appendchild(imgDelete);
//             imgDelete.setAttribute("onclick", "questao.apagar()");

//             let imgCheck = document.createElement('img');
//             imgCheck.src = 'png/tick.png';
//             td_indCerto.appendchild(imgCheck);
            
//             let imgAdd = document.createElement('img');
//             imgCheck.src = 'png/add.png';
//             td_adicionar.appendchild(imgAdd);



//         }
        
//     }
// }
// var questao = new Questao()

//test tes test 
