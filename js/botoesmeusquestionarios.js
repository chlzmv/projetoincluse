 async function apagarQuestionario(idQuestn){
    console.log("acessou a função: " + idQuestn );

    const dados = await fetch('apagarquestionario.php?idQuestn'+ idQuestn)
 }