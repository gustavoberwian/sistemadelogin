<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Sistema de Login</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['secao'])){
            echo("<h1>Login realizado com sucesso!</h1>");
        }
    ?>
    <form action="./php/logout.php" method="POST">
        <div id="btnloged">    
            <input type="submit" name="Logout" value="Logout" id="btnLoged">
        </div>
    </form>
</body>