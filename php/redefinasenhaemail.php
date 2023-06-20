<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../png/icon.png" type="image/png">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../css/styleredefinirsenha.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../js/botoestela.js"> </script>
</head>
<body >
    
    <header class="divMenu">
        <ul>
            <li href="#" class="aplicafontelogo">Incluse.com</li>
            <li href="#" class="close" onclick="window.location='index.php';"></li>
        </ul>
    </header>
    <!--menu flutuante -->
    <footer class="menuFlut">
        <footer class="botMenuFlut" id="botFlut">    
            <span class="material-symbols-outlined" id="add1">add_circle</span>
            <span class="material-symbols-outlined" id="minus">do_not_disturb_on</span>
            <span class="material-symbols-outlined" id="color">contrast</span>
        </footer>
        <span class="material-symbols-outlined" id="arrow" onclick="clickflut()">expand_circle_down</span>
    </footer>  

    <section class="container">
        <header class="divH1">
            <h1 >Redefina sua senha</h1>
        </header>
        
        <form>
            <input class="input" type="password" id="senha" name="senha" placeholder="Nova senha">
            <input class="input" type="password" id="csenha" name="csenha" placeholder="Confirmar nova senha">
            <input class="button" type="submit" value="Confirmar">
        </form>
    </section>

    
</body>
</html>
