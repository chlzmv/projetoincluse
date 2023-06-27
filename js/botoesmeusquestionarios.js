 async function apagarQuestionario(idQuestn){
    console.log("acessou a função: " + idQuestn );

    const dados = await fetch('apagarquestionario.php?idQuestn'+ idQuestn)
 }

 async function visQuestoes(idQuestn){
   console.log("acessou: " + idQuestn);
   const dados = await fetch('questoesprontas.php?id='+ idQuestn);
 }