<?php 
    include("functions/functions.php");
    
    $loginOk = true;

    if($_POST){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuarios = carregarUsuarios();

        foreach($usuarios as $usuario){

            if($usuario['email'] == $email){
               
                if(password_verify($senha,$usuario['senha'])){
                  
                    session_start();

                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['nome'] = $usuario['nome'];
               
                    header('location: ../desafio-php/produto/createProduto.php');

                }
            }
        }

        $loginOk = false;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<link rel="stylesheet" href="css/login.css">
    <form method="post" id="form-login" >
        <label for="email"><input id="email" name="email" type="text" placeholder="E-mail"></label>
        <label for="senha"><input id="senha" name="senha" type="password" placeholder="senha"></label>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>