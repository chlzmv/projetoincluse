function copiarTexto(idQuestn) { 
    let textoCopiado = 'http://localhost:8080/projetoincluse/php/respquest.php?idQuestn=' + idQuestn;
    console.log("id captado: "+idQuestn)
    navigator.clipboard.writeText(textoCopiado)
        .then(() => {
            alert("O link foi copiado com sucesso: " + textoCopiado);
        })
        .catch((error) => {
            console.error("Erro ao copiar o link:", error);
        });
}
