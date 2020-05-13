<?php
   include('../functions/functions.php');
   
    $nome = '';
    $senha = '';


    $nomeOk = true; 
    $senhaOk = true;

    if($_POST){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $confirmacao = $_POST['confirmacao'];
        $email = $_POST['email'];
        

        if(strlen( $_POST['nome']) < 5){
            $nomeOk = false;
        }
        if(strlen($senha) < 5 || $senha != $confirmacao ){
            $senhaOk =  false;
        }
        if ($senhaOk && $nomeOk ){
            
            addUsuario($nome,$email,$senha);

            header('location: list-usuarios.php');

        }
    }
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastre-se!</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<link rel="stylesheet" href="../css/usuario.css">
	<form id="form-usuario" method="post">
		<label>
            Nome:
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?= $nome ?>">
            <?= ($nomeOk?'': '<span class="erro">Preencha com um nome válido</span>');?>
        </label><br>
		<label>
            E-mail:
            <input type="email" name="email" id="email" placeholder="Digite seu email">
        </label><br>
		<label>
            Senha:
            <input type="password" name="senha" id="senha" placeholder="Digite uma senha" value="<?= $senha ?>">
            <?= $senhaOk ? '': '<span class="erro"> Senha inválida </span>'?>
        </label><br>
		<label>
            Confirmação:
            <input type="password" name="confirmacao" id="confirmacao" placeholder="Confirme a senha digitada">
        </label>
        <div class="botoes">
            <button type="reset" class="secondary">Resetar</button>
            <button type="submit" class="primary">Cadastrar-se</button>
        </div>
	</form>
    <script>
        document.getElementById("foto").onchange = (evt) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("foto-carregada").src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };
    </script>
</body>
</html>