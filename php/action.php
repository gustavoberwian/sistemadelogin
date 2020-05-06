<?php
    session_start();
    $arquivo = fopen("../arquivo.txt","a+");
    @date_default_timezone_set('America,Sao_Paulo');

    if(isset($_POST['Registrar'])){
        $email = $_POST['login'];
        $pwd = $_POST['senha'];

        $dados = file_get_contents("../arquivo.txt");
        $dadosSeparados = explode("|",$dados);

        foreach($dadosSeparados as $key=>$value){
            if(strpos($value, "@") && $email == $value){
                $_SESSION['repetido'] = true;
                header("Location: ../index.php");
                return;
            }
        }

        fwrite($arquivo, $email."|".$pwd."|".date("d/m/Y | H:i:s")."|");
        $_SESSION['cadastrado'] = true;
        header("Location: ../index.php");
    }

    if(isset($_POST['Entrar'])){
        $email = $_POST['login'];
        $pwd = $_POST['senha'];

        $dados = file_get_contents("../arquivo.txt");
        if(!$dados){
            header("Location: ../index.php");
            return;
        }
        $dadosSeparados = explode("|",$dados);
        $length = count($dadosSeparados);

        for($i=0;$i<$length;$i++){
            if(strpos($dadosSeparados[$i], "@") && $email == $dadosSeparados[$i]){
                if($pwd==$dadosSeparados[$i+1]){
                    $_SESSION['secao'] = $email;
                    header("Location: ../logado.php");
                    return;
                }
                else{
                    $_SESSION['wrongPwd'] = true;
                    header("Location: ../index.php");
                    return;
                }
            }
        }
        $_SESSION['wrongEmail'] = true;
        header("Location: ../index.php");
        return;
    }
?>