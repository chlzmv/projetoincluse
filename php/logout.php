<?php

//encerrando a sessão

//inicia
session_start();
unset($_SESSION['idUser']);
header("Location: login.php");
?>