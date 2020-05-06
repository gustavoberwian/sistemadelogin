<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Sistema de Login</title>
</head>
<body>
    <header>
        <h1>Sistema de Login</h1>
    </header>
    <main>
        <form action="./php/action.php" method="POST">
            <p><strong>Email:</strong></p>
            <input name="login" type="email" required placeholder="Insira seu login aqui...">
            <p><strong>Senha:</strong></p>
            <input name="senha" type="password" required placeholder="Insira sua senha aqui...">
            <div id="btnRegister">
                <input id="btnnR" type="submit" name="Registrar" value="Registrar">
            </div>
            <div id="btn">    
                <input id="btnn" type="submit" name="Entrar" value="Entrar">
            </div>         
        </form>
                <?php
                    session_start();
                    if(isset($_SESSION['repetido'])){
                        echo("<h2 class='alert'>Email já cadastrado!</h2>");
                    }
                    unset($_SESSION['repetido']);
                    if(isset($_SESSION['wrongPwd'])){
                        echo("<h2 class='alert'>Senha incorreta!</h2>");
                    }
                    unset($_SESSION['wrongPwd']);
                    if(isset($_SESSION['wrongEmail'])){
                        echo("<h2 class='alert'>Email inexistente!</h2>");
                    }
                    unset($_SESSION['wrongEmail']);
                    if(isset($_SESSION['cadastrado'])){
                        echo("<h2 class='alertcerto'>Email cadastrado com sucesso!</h2>");
                    }
                    unset($_SESSION['cadastrado']);
                ?>
        <hr/>
    </main>
</body>
</html>