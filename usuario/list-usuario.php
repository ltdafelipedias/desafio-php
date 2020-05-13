<?php
    //include
    include('../functions/functions.php');

    //carregando usuarios
    $usuarios = carregarUsuarios();

    //mostrar usuarios
    echo"<pre>";
    print_r($usuarios);
    echo"</pre>";


?>