function copiarTexto(idQuestn) { 
    // Constrói o texto a ser copiado, adicionando o ID do questionário ao URL
    let textoCopiado = 'http://localhost/projetoincluse/php/respquest.php?idQuestn=' + idQuestn;

    // Imprime o ID captado para fins de depuração
    console.log("id captado: " + idQuestn);

    // Utiliza o recurso do navegador para copiar o texto para a área de transferência
    navigator.clipboard.writeText(textoCopiado)
        .then(() => {
            // Exibe um alerta informando que o link foi copiado com sucesso
            alert("O link foi copiado com sucesso: " + textoCopiado);
        })
        .catch((error) => {
            // Exibe um erro caso ocorra algum problema ao copiar o link
            console.error("Erro ao copiar o link:", error);
        });
}