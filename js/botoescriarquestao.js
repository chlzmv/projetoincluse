
  var controleCampo = 1;
  function adicionar(){
      controleCampo++;
      console.log(controleCampo);
      // alert('teste')
      document.getElementById('table').insertAdjacentHTML('beforeend', '<table id="campo' + controleCampo + '" ><tr> <td> <input type="checkbox" id="checkbox"> </td> <td><textarea id="checkText" placeholder="Insira o texto"> </textarea></td>  <td><span id="check" class="material-symbols-outlined">check</span></td> <td><span id="add2" class="material-symbols-outlined" onclick="adicionar()">add</span></td><td><span id="'+ controleCampo +'" class="material-symbols-outlined" onclick="apagar('+ controleCampo +')">delete</span> </td></tr></table>')
  }

  function apagar(idCampo=1) {
      //console.log("campo remover: " + idCampo);
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
