function confirmarRed() {
    var confirmacao = confirm("É necessario fazer login para acessar essa página, deseja ser redirecionado?");
    if (confirmacao) {
        // Código para redirecionar
         window.location='../php/login.php';
    } 
}
