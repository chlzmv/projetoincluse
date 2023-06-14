<?php

//encerrando a sessão

//inicia
session_start();
//limpa
session_unset();
//destroi
session_destroy();
//enviar para página de login
header('Location: 17loginB.php');
?>