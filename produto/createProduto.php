<?php
   include('../functions/functions.php');

   session_start();
   if (!$_SESSION) {
   header('location: login.php');
   }
       
    $produto = '';
    $descricao = '';
    $preco = '';


    $produtoOK = true;
    $precoOK = true;
    $imagemOK = true;
    
   if($_POST or $_FILES){
     $produto = $_POST['produto'];
     $descricao = $_POST['descricao'];
     $preco = $_POST['preco'];
     $imagem = $_FILES['foto'];
       

       if (empty($produto)){
         $produtoOK = false;
       }
       if (empty($preco) or $preco < 0 and is_numeric($preco)){
         $precoOK = false;
       }
         if ($imagem['error']==0){
           $valid=["image/jpeg","image/png","image/jpg"];
           if (array_search($foto['type'], $valid) === false ){exit;}
           } else {
         $imagemOK = false;}

       if ($produtoOK and $precoOK and $imagemOK){
           move_uploaded_file($foto['tmp_name'], 'img/'.$imagem['name']);
         $imagem = 'img/'.$imagem['name'];
           addProduto($produto, $preco, $imagem,$descricao);

           header('location: ../usuario/cadastro-usuario.php');
  }
}
        

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crie seu produto !</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<link rel="stylesheet" href="../css/produto.css">
    
	<form id="form-produto" method="POST" enctype="multipart/form-data">
		<label>
            Nome do produto: 
            <input type="text" name="produto" id="produto" placeholder="Digite seu nome" value="<?= $produto ?>">
            <?= $produtoOk?'': '<span class="erro">Preencha com um nome válido</span>';?>
        </label>
		<label>
            Descrição do produto:
            <input type="text" name="descricao" id="descricao" >
        </label>
		<label>
            Preço:
            <input type="number" name="preco" id="preco"  >
            <?= $precoOK?'': '<span class="erro">Insira um valor válido</span>';?>
        </label>
		<label>
            
            <div>Selecionar foto</div>
            <input type="file" name="foto" id="foto" accept="">
            
        </label>
        <div class="botao">
            <button type="submit" class="primary">Cadastrar produto</button>
        </div>
    </form>

</body>
</html>