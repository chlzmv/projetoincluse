var x1=  document.getElementById("delete1");
x1.addEventListener("click", deletar1)


var x2=  document.getElementById("delete2");
x2.addEventListener("click", deletar2)


function clickdelete1(){
    document.getElementById("checkbox1").remove();
}


function deletar1(){
    alert('DELETEI 1!');


}

function deletar2(){
    alert('DELETEI 2!');


}