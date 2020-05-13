<?php

function carregarUsuarios(){
    
    $strJson = file_get_contents("functions/usuarios.json");
   
    $usuarios = json_decode($strJson, true);
    
    return $usuarios;
}


function addUsuario($nome,$email,$senha){
        $usuarios = carregarUsuarios();
        
        $u = ['nome'=>$nome, 'email'=>$email, 'senha'=>password_hash($senha, PASSWORD_DEFAULT)];

        $usuarios[] = $u;

        $stringJson = json_encode($usuarios);

        if ($stringJson) {
        
        file_put_contents('../functions/usuarios.json', $stringJson);
        }
    }

    function carregarProduto(){
    
        $strJson = file_get_contents("functions/produtos.json");
       
        $usuarios = json_decode($strJson, true);
        
        return $usuarios;
    }
    
    
    function addProduto($nome,$preco,$imagem,$descricao){
            $produtos = carregarProdutos();
            
            $u = ['nome'=>$nome, 'preco'=>$preco, 'imagem'=>$imagem];
    
            $produtos[] = $u;
    
            $stringJson = json_encode($usuarios);
    
            if ($stringJson) {
            
            file_put_contents('../functions/usuarios.json', $stringJson);
            }
        }
    


?>