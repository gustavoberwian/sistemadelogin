<?php 
    session_start();
    unset($_SESSION['secao']);
    header("Location: ../index.php");
    return;
?>